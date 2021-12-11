function dropClassHandler() {
  const question = 'Are you sure you want to drop the class from your courses?';
  ConfirmDialog('Warning', question).then(function (response) {
    if (response) {
      alert('this is obviously ' + response); //TRUE
    } else {
      alert('and then there is ' + response); //FALSE
    }
  });
}

$(document).ready(function () {
  $('.dropClassBtn').on('click', function () {
    dropClassHandler();
  });
});
