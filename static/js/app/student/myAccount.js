// $(document).ready(function () {
//   $('#phoneNumber').on('input', function (e) {
//     $('#hdnPhoneNo').val($(this).val().replace(/[^\d]/g, ''));
//     const _fmtNo = formatPhoneNumber($(this).val());
//     $(this).val(_fmtNo);
//   });

//   const _fmtNo = formatPhoneNumber($('#phoneNumber').val());
//   $('#phoneNumber').val(_fmtNo);
// });

const displayMessage = (isSuccess) => {
  const $row = $('#messageRow');
  const alertClass = isSuccess ? 'alert-info' : 'alert-danger';
  const messageType = isSuccess ? 'Success' : 'Failure';
  const messageText = isSuccess
    ? 'User details are updated successfully'
    : 'Some error occurred. Please try later.';

  $row.find('strong#message').text(messageType + ': ' + messageText);
  $row.find('#alertBox').addClass(alertClass);
  $row.toggle(true);
};
