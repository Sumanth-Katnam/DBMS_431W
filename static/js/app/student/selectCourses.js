let request;
const $streamDrpdwn = $('#streamDrpdwnDiv').find('select#streamDrpdwn');
const $coursesDrpdwn = $('select#courseNameDrpdwn');

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

$(document).ready(function () {
  // stream handler
  $streamDrpdwn.on('change', function () {
    streamHandler(this.value);
  });

  // course name handler
  // Add to cart handler -- check if already exists in db in php
});
