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
  const _appendOfferingRow = (rowIndex, offering) => {
    $tableBody = $('#coursesOfferingTable').find('tbody');
    $tableBody.empty();
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
        .append($('<td>').text(offering.occurence))
        .append($('<td>').text(offering.start_time))
        .append($('<td>').text(offering.end_time))
        .append($('<td>').text(offering.availability))
    );
  };

  $.each(offeringsList, function (i, offering) {
    _appendOfferingRow(i, offering);
  });
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
  const $row = $('#messageRow');
  let alertClass;
  let messageType;
  let messageText;
  status = status.toLowerCase();
  if (status === 'success') {
    alertClass = 'alert-info';
    messageType = 'Success';
    messageText = 'The course has been successfully added to cart.';
  } else if (status === 'duplicate') {
    alertClass = 'alert-warning';
    messageType = 'Info';
    messageText = 'The selected course already exists in your cart.';
  } else {
    alertClass = 'alert-danger';
    messageType = 'Error';
    messageText = 'Some error occured. Please try again later.';
  }

  $row.find('strong#message').text(messageType + ': ' + messageText);
  $row.find('#alertBox').addClass(alertClass);
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
    const offeringId = $(
      'input[name=offeringRadio]:checked',
      '#coursesOfferingTable'
    ).val();

    $('span#radioError').toggle(offeringId === undefined);
    if (!(offeringId === undefined)) {
      addToCart(offeringId);
    }
  });
});
