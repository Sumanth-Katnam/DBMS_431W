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
              .attr('hdnOfferingId', entry.offering_id)
              .text('Remove ')
              .append($('<i>').attr('class', 'fas fa-trash'))
          )
        )
    );
  };
  $.each(entries, function (i, entry) {
    _addCartRow(i + 1, entry);
  });
};

function removeClassHandler() {
  const question =
    'Are you sure you want to remove this course from your cart?';
  ConfirmDialog('Warning', question).then(function (response) {
    if (response) {
      alert('this is obviously ' + response); //TRUE
    } else {
      alert('and then there is ' + response); //FALSE
    }
  });
}

$(document).ready(function () {
  loadCartEntries();
  $('.removeCartBtn').on('click', function () {
    removeClassHandler();
  });

  $('#finishEnrollBtn').on('click', function () {
    // check the status... only when all are Good then go ahead else error
    const question =
      'Are you sure you want to remove this course from your cart?';
    alertDialog('Warning', question).then(function (response) {
      if (response) {
        alert('this is obviously ' + response); //TRUE
      } else {
        alert('and then there is ' + response); //FALSE
      }
    });
  });
});
