// function formatPhoneNumber(phoneNumberString) {
//   let cleaned = ('' + phoneNumberString).replace(/\D/g, '');
//   if (cleaned.length == 10) {
//     let match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);
//     if (match) {
//       return '(' + match[1] + ') ' + match[2] + '-' + match[3];
//     }
//   }
//   return cleaned;
// }

const addOption = ($dropdown, value, text) => {
  $dropdown.append($('<option>').val(value).text(text));
};

function formatPhoneNumber(value) {
  // if input value is falsy eg if the user deletes the input, then just return
  if (!value) return value;

  // clean the input for any non-digit values.
  const phoneNumber = value.replace(/[^\d]/g, '');

  // phoneNumberLength is used to know when to apply our formatting for the phone number
  const phoneNumberLength = phoneNumber.length;

  // we need to return the value with no formatting if its less then four digits
  // this is to avoid weird behavior that occurs if you  format the area code to early
  if (phoneNumberLength < 4) return phoneNumber;

  // if phoneNumberLength is greater than 4 and less the 7 we start to return
  // the formatted number
  if (phoneNumberLength < 7) {
    return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3)}`;
  }

  // finally, if the phoneNumberLength is greater then seven, we add the last
  // bit of formatting and return it.
  return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(
    3,
    6
  )}-${phoneNumber.slice(6, 10)}`;
}

const ConfirmDialog = (title, message) => {
  let defer = $.Deferred();
  $('<div></div>')
    .appendTo('body')
    .html('<div><h6>' + message + '?</h6></div>')
    .dialog({
      modal: true,
      title: title,
      zIndex: 10000,
      autoOpen: true,
      width: 'auto',
      resizable: false,
      buttons: {
        Yes: function () {
          defer.resolve(true);

          $(this).dialog('close');
        },
        No: function () {
          defer.resolve(false);

          $(this).dialog('close');
        },
      },
      close: function (event, ui) {
        $(this).remove();
      },
    });
  return defer.promise();
};

const alertDialog = (title, message) => {
  let defer = $.Deferred();
  $('<div></div>')
    .appendTo('body')
    .html('<div><h6>' + message + '?</h6></div>')
    .dialog({
      modal: true,
      title: title,
      zIndex: 10000,
      autoOpen: true,
      width: 'auto',
      resizable: false,
      buttons: {
        Ok: function () {
          defer.resolve(true);

          $(this).dialog('close');
        },
      },
      close: function (event, ui) {
        $(this).remove();
      },
    });
  return defer.promise();
};
