let request;

const $streamDrpdwn = $('#streamDrpdwnDiv').find('select#streamDrpdwn');
const $coursesDrpdwn = $('#courseDrpdwnDiv').find('select#courseNameDrpdwn');

const loadDepartments = () => {
  if (request) {
    request.abort();
  }

  const $input = $streamDrpdwn;
  $input.prop('disabled', true);

  request = $.ajax({
    url: '../php/student/p_selectCourses.php',
    type: 'POST',
    datatype: 'json',
    data: { func: 'retrieveDepartments' },
    success: function (depts) {
      populateDepartments(JSON.parse(depts));
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log('Status: ' + textStatus);
      console.log('Error: ' + errorThrown);
    },
  });

  request.always(function () {
    $input.prop('disabled', false);
  });
};

const populateDepartments = (departments) => {
  $streamDrpdwn.empty();
  addOption($streamDrpdwn, '', '-- Please select a Department --');
  $.each(departments, function (i, dept) {
    addOption($streamDrpdwn, dept.dept_id, dept.dept_name);
  });
};

const streamHandler = (deptId) => {
  if (request) {
    request.abort();
  }

  const $input = $streamDrpdwn;
  $input.prop('disabled', true);

  request = $.ajax({
    url: '../php/student/p_selectCourses.php',
    type: 'POST',
    datatype: 'json',
    data: { func: 'retrieveCourses', deptId: deptId },
    success: function (courses) {
      populateCourses(JSON.parse(courses));
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log('Status: ' + textStatus);
      console.log('Error: ' + errorThrown);
    },
  });

  request.always(function () {
    $input.prop('disabled', false);
  });
};

const populateCourses = (coursesList) => {
  $coursesDrpdwn.empty();
  addOption($coursesDrpdwn, '', '-- Please select a Course --');
  $.each(coursesList, function (i, course) {
    addOption($coursesDrpdwn, course.course_id, course.course_name);
  });
};

const coursesHandler = (course_id) => {
  if (request) {
    request.abort();
  }

  const $input = $coursesDrpdwn;
  $input.prop('disabled', true);

  request = $.ajax({
    url: '../php/student/p_selectCourses.php',
    type: 'POST',
    datatype: 'json',
    data: { func: 'retrieveOfferings', course_id: course_id },
    success: function (offerings) {
      populateOfferings(JSON.parse(offerings));
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log('Status: ' + textStatus);
      console.log('Error: ' + errorThrown);
    },
  });

  request.always(function () {
    $input.prop('disabled', false);
  });
};

const populateOfferings = (offeringsList) => {
  $tableBody = $('#coursesOfferingTable').find('tbody');
  $tableBody.empty();

  const _appendOfferingRow = (rowIndex, offering) => {
    $tableBody.append(
      $('<tr>')
        .append(
          $('<td>').append(
            $('<input>')
              .attr('type', 'radio')
              .attr('name', 'offeringRadio')
              .attr('required', true)
              .attr('id', 'offering_' + rowIndex)
              .attr('value', offering.offering_id)
          )
        )
        .append($('<td>').text(offering.instructor_name))
        .append($('<td>').text(offering.occurrence))
        .append($('<td>').text(offering.start_time))
        .append($('<td>').text(offering.end_time))
        .append($('<td>').text(offering.availability))
    );
  };

  $.each(offeringsList, function (i, offering) {
    _appendOfferingRow(i + 1, offering);
  });

  rowsCount = $tableBody.find('tr').length;
  if (rowsCount == 0) {
    $tableBody.append(
      $('<tr>').append(
        $('<td>')
          .attr('colspan', 8)
          .attr('class', 'emptyRow')
          .text('No Offerings.')
      )
    );
  }
};

const addToCart = (offeringId) => {
  if (request) {
    request.abort();
  }

  request = $.ajax({
    url: '../php/student/p_selectCourses.php',
    type: 'POST',
    datatype: 'json',
    data: { func: 'addToCart', offering_id: offeringId },
    success: function () {
      location.reload();
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log('Status: ' + textStatus);
      console.log('Error: ' + errorThrown);
    },
  });

  request.always(function () {
    $input.prop('disabled', false);
  });
};

const displayMessage = (status) => {
  const _messages = {
    success: {
      alertClass: 'alert-info',
      messageType: 'Success',
      messageText: 'The course has been successfully added to cart.',
    },
    duplicatecart: {
      alertClass: 'alert-warning',
      messageType: 'Info',
      messageText: 'The selected course already exists in your cart.',
    },
    duplicatetaken: {
      alertClass: 'alert-warning',
      messageType: 'Info',
      messageText: 'You have arleady enrolled for the selected course.',
    },
    error: {
      alertClass: 'alert-danger',
      messageType: 'Error',
      messageText: 'Some error occured. Please try again later.',
    },
  };

  const $row = $('#messageRow');
  status = status.toLowerCase();
  messageJson = _messages[status];

  $row
    .find('strong#message')
    .text(messageJson['messageType'] + ': ' + messageJson['messageText']);
  $row.find('#alertBox').addClass(messageJson['alertClass']);
  $row.toggle(true);
};

$(document).ready(function () {
  loadDepartments();
  // stream handler
  $streamDrpdwn.on('change', function () {
    streamHandler(this.value);
    $('#courseDrpdwnDiv').toggle(this.value !== '' && this.value !== null);
    $('#offeringsDiv').toggle(false);
  });

  // course name handler
  $coursesDrpdwn.on('change', function () {
    coursesHandler(this.value);
    $('#offeringsDiv').toggle(this.value !== '' && this.value !== null);
  });

  // Add to cart handler -- check if already exists in db in php
  $('#addToCartBtn').on('click', function () {
    $('span#radioError').toggle(false);
    const offeringId = $(
      'input[name=offeringRadio]:checked',
      '#coursesOfferingTable'
    ).val();

    if (!(offeringId === undefined)) {
      addToCart(offeringId);
    } else {
      $('span#radioError').toggle(true);
    }
  });
});
