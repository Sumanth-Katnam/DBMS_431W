const loadCartEntries = () => {
  request = $.ajax({
    url: '../php/student/p_myCourses.php',
    type: 'POST',
    datatype: 'json',
    data: { func: 'retrieveMyCourses' },
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
        .append($('<td>').text(entry.status))
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
  };

  request = $.ajax({
    url: '../php/student/p_cart.php',
    type: 'POST',
    datatype: 'json',
    data: { func: 'dropCartCourse', entry_id: entryId },
    success: function (isSuccess) {
      if (isSuccess) _removeRow(entryId);
      displayMessage(isSuccess);
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log('Status: ' + textStatus);
      console.log('Error: ' + errorThrown);
    },
  });
};

const displayMessage = (isSuccess) => {
  const $row = $('#messageRow');
  const alertClass = isSuccess ? 'alert-info' : 'alert-danger';
  const messageType = isSuccess ? 'Success' : 'Failure';
  const messageText = isSuccess
    ? 'Course has been successfully removed from cart.'
    : 'Some error occurred. Please try later.';

  $row.find('strong#message').text(messageType + ': ' + messageText);
  $row.find('#alertBox').addClass(alertClass);
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

$(document).ready(function () {
  loadCartEntries();
  $('#cartEntriesTable')
    .find('tbody')
    .on('click', '.removeCartBtn', function () {
      removeEntryHandler($(this).attr('hdnEntryId'));
    });

  $('#finishEnrollBtn').on('click', function () {
    // check the status... only when all are Good then go ahead else error
    const question = 'Are you sure you enroll into these courses?';
    alertDialog('Warning', question).then(function (response) {
      if (response) {
        alert('this is obviously ' + response); //TRUE
      } else {
        alert('and then there is ' + response); //FALSE
        // $('span#radioError').toggle(offeringId === undefined);
      }
    });
  });
});
