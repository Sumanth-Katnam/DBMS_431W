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
  $('.removeClassBtn').on('click', function () {
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
