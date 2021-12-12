const loadCartEntries = () => {
  request = $.ajax({
    url: '../php/student/p_cart.php',
    type: 'POST',
    datatype: 'json',
    data: { func: 'retrieveCartEntries' },
    success: function (cartEntries) {
      populateCartEntries(JSON.parse(cartEntries));
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log('Status: ' + textStatus);
      console.log('Error: ' + errorThrown);
    },
  });
};

const populateCartEntries = (entries) => {
  $tableBody = $('#cartEntriesTable').find('tbody');
  $tableBody.empty();
  const _addCartRow = (rowIndex, entry) => {
    $tableBody.append(
      $('<tr>')
        .attr('id', 'entry_' + entry.cart_entry_id)
        .append($('<td>').text(rowIndex))
        .append($('<td>').text(entry.course_name))
        .append($('<td>').text(entry.instructor_name))
        .append($('<td>').text(entry.occurrence))
        .append($('<td>').text(entry.schedule_time))
        .append($('<td>').text(entry.room_name))
        .append($('<td>').attr('class', 'statusCol').text(entry.status))
        .append(
          $('<td>').append(
            $('<button>')
              .attr('class', 'btn btn-warning removeCartBtn')
              .attr('id', 'removeCartBtn_' + rowIndex)
              .attr('hdnEntryId', entry.cart_entry_id)
              .text('Remove ')
              .append($('<i>').attr('class', 'fas fa-trash'))
          )
        )
    );
  };
  $.each(entries, function (i, entry) {
    _addCartRow(i + 1, entry);
  });
  checkEmpty();
};

const checkEmpty = () => {
  $tableBody = $('#cartEntriesTable').find('tbody');
  rowsCount = $tableBody.find('tr').length;
  if (rowsCount == 0) {
    $tableBody.append(
      $('<tr>').append(
        $('<td>')
          .attr('colspan', 8)
          .attr('class', 'emptyRow')
          .text('No Courses Yet.')
      )
    );
  }
};

const dropCartCourse = (entryId) => {
  const _removeRow = (entryId) => {
    $tableBody = $('#cartEntriesTable').find('tbody');
    $tableBody.find('tr#entry_' + entryId).remove();
    checkEmpty();
  };

  request = $.ajax({
    url: '../php/student/p_cart.php',
    type: 'POST',
    datatype: 'json',
    data: { func: 'dropCartCourse', entry_id: entryId },
    success: function (isSuccess) {
      location.reload();
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log('Status: ' + textStatus);
      console.log('Error: ' + errorThrown);
    },
  });
};

const displayMessage = (action, isSuccess) => {
  isSuccess = isSuccess ? 'success' : 'error';
  const _messages = {
    dropCart: {
      success: {
        alertClass: 'alert-info',
        messageType: 'Success',
        messageText: 'Course has been successfully removed from cart.',
      },
      error: {
        alertClass: 'alert-danger',
        messageType: 'Error',
        messageText: 'Some error occurred. Please try later.',
      },
    },
    enrollment: {
      success: {
        alertClass: 'alert-info',
        messageType: 'Success',
        messageText: 'Your Enrollment is successful.',
      },
      error: {
        alertClass: 'alert-danger',
        messageType: 'Error',
        messageText: 'Some error occurred. Please try later.',
      },
    },
  };
  const $row = $('#messageRow');

  const _messageObj = _messages[action][isSuccess];
  $row
    .find('strong#message')
    .text(_messageObj['messageType'] + ': ' + _messageObj['messageText']);
  $row.find('#alertBox').addClass(_messageObj['alertClass']);
  $row.toggle(true);
};

const removeEntryHandler = (entryId) => {
  const question =
    'Are you sure you want to remove this course from your cart?';
  ConfirmDialog('Warning', question).then(function (response) {
    if (response) {
      dropCartCourse(entryId);
    }
  });
};

const finishEnrollment = () => {
  request = $.ajax({
    url: '../php/student/p_cart.php',
    type: 'POST',
    datatype: 'json',
    data: { func: 'finishEnrollment' },
    success: function (cartEntries) {
      populateCartEntries(JSON.parse(cartEntries));
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log('Status: ' + textStatus);
      console.log('Error: ' + errorThrown);
    },
  });
};

const finishEnrollHandler = () => {
  const question = 'Are you sure you enroll into these courses?';
  ConfirmDialog('Warning', question).then(function (response) {
    if (response) {
      // finishEnrollment();
      console.log('good');
    }
  });
};

$(document).ready(function () {
  loadCartEntries();
  $('#cartEntriesTable')
    .find('tbody')
    .on('click', '.removeCartBtn', function () {
      removeEntryHandler($(this).attr('hdnEntryId'));
    });

  $('#finishEnrollBtn').on('click', function () {
    $('span#enrollError').toggle(false);
    goodStatusCount = $('#cartEntriesTable')
      .find('tbody')
      .find('.statusCol')
      .filter(function () {
        return $(this).text().indexOf('Seats') > 0;
      }).length;

    totalRowCount = $tableBody = $('#cartEntriesTable')
      .find('tbody')
      .find('tr').length;
    if (goodStatusCount == totalRowCount) {
      finishEnrollHandler();
    } else {
      $('span#enrollError').toggle(true);
    }
  });
});
