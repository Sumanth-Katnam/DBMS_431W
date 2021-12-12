const loadMyCourses = () => {
  request = $.ajax({
    url: '../php/student/p_myCourses.php',
    type: 'POST',
    datatype: 'json',
    data: { func: 'retrieveMyCourses' },
    success: function (courses) {
      populateCourses(JSON.parse(courses));
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log('Status: ' + textStatus);
      console.log('Error: ' + errorThrown);
    },
  });
};

const populateCourses = (courses) => {
  $tableBody = $('#coursesTakenTable').find('tbody');
  $tableBody.empty();

  const _addCourseRow = (rowIndex, course) => {
    $tableBody.append(
      $('<tr>')
        .attr('id', 'course_' + course.taken_id)
        .append($('<td>').text(rowIndex))
        .append($('<td>').text(course.course_name))
        .append($('<td>').text(course.instructor_name))
        .append($('<td>').text(course.occurrence))
        .append($('<td>').text(course.schedule_time))
        .append($('<td>').text(course.room_name))
        .append(
          $('<td>').append(
            $('<button>')
              .attr('class', 'btn btn-warning dropCourseBtn')
              .attr('id', 'dropCourseBtn' + rowIndex)
              .attr('hdnTakenId', course.taken_id)
              .text('Drop class')
          )
        )
    );
  };
  $.each(courses, function (i, course) {
    _addCourseRow(i + 1, course);
  });
  checkEmpty();
};

const checkEmpty = () => {
  $tableBody = $('#coursesTakenTable').find('tbody');
  rowsCount = $tableBody.find('tr').length;
  if (rowsCount == 0) {
    $tableBody.append(
      $('<tr>').append(
        $('<td>')
          .attr('colspan', 7)
          .attr('class', 'emptyRow')
          .text('No Courses Yet.')
      )
    );
  }
};

const dropCourse = (takenId) => {
  const _removeRow = (takenId) => {
    $tableBody = $('#coursesTakenTable').find('tbody');
    $tableBody.find('tr#course_' + takenId).remove();
    checkEmpty();
  };

  request = $.ajax({
    url: '../php/student/p_myCourses.php',
    type: 'POST',
    datatype: 'json',
    data: { func: 'dropCourse', taken_id: takenId },
    success: function (isSuccess) {
      if (isSuccess) _removeRow(takenId);
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
    ? 'Course has been successfully dropped.'
    : 'Some error occurred. Please try later.';

  $row.find('strong#message').text(messageType + ': ' + messageText);
  $row.find('#alertBox').addClass(alertClass);
  $row.toggle(true);
};

const dropClassHandler = (takenId) => {
  const question = 'Are you sure you want to drop this course?';
  ConfirmDialog('Warning', question).then(function (response) {
    if (response) {
      dropCourse(takenId);
    }
  });
};

$(document).ready(function () {
  loadMyCourses();

  $('#coursesTakenTable')
    .find('tbody')
    .on('click', '.dropCourseBtn', function () {
      dropClassHandler($(this).attr('hdnTakenId'));
    });
});
