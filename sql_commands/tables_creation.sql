-- Students Table
CREATE TABLE ref_students(
	student_id int(11) NOT NULL AUTO_INCREMENT,
	fname varchar(100) NOT NULL,
	mname varchar(100) NOT NULL,
	lname varchar(100) NOT NULL,
    email_id varchar(30) NOT NULL,
	PRIMARY KEY (student_id)
);

-- Instructors Table
CREATE TABLE ref_instructors(
	instructor_id int(10) NOT NULL,
	fname varchar(100) NOT NULL,
	mname varchar(100) NOT NULL,
	lname varchar(100) NOT NULL,
    email_id varchar(50) NOT NULL,
	PRIMARY KEY (instructor_id)
);

-- Courses Table
CREATE TABLE ref_courses(
	courses_id varchar(100) NOT NULL,
	name varchar(100) NOT NULL,
	stream varchar(100) NOT NULL,
	PRIMARY KEY (courses_id)
);

-- Room Table
CREATE TABLE ref_room(
	room_id varchar(100) NOT NULL,
	room_code varchar(10) NOT NULL,
	capacity int(3) NOT NULL,
	PRIMARY KEY (room_id)
);

-- Schedules Table
CREATE TABLE ref_schedules(
    schedule_id varchar(100) NOT NULL,
    occurrence varchar(5) NOT NULL,
    start_time varchar(10) NOT NULL,
    end_time varchar(10) NOT NULL,
    PRIMARY KEY (schedule_id)
);

-- Term Table
CREATE TABLE ref_term(
    term_id int(3) NOT NULL AUTO_INCREMENT,
    season varchar(10) NOT NULL,
    year int(4) NOT NULL,
    PRIMARY KEY (term_id)
);

-- Courses Offering Table
CREATE TABLE course_offerings(
    offering_id int(10) NOT NULL AUTO_INCREMENT,
    course_id varchar(100) NOT NULL,
    instructor_id int(10) NOT NULL,
    room_id varchar(100) NOT NULL,
    schedule_id varchar(100) NOT NULL,
    PRIMARY KEY (offering_id),
    FOREIGN KEY (course_id) REFERENCES ref_courses(courses_id),
    FOREIGN KEY (instructor_id) REFERENCES ref_instructors(instructor_id),
    FOREIGN KEY (room_id) REFERENCES ref_room(room_id),
    FOREIGN KEY (schedule_id) REFERENCES ref_schedules(schedule_id)
    );


-- Courses Cart
CREATE TABLE courses_cart(
    cart_entry_id int(10) NOT NULL AUTO_INCREMENT,
    student_id int(11) NOT NULL,
    offering_id int(10) NOT NULL,
    term_id int(3) NOT NULL,
    status varchar(15) NOT NULL DEFAULT 'N/A',
    PRIMARY KEY (cart_entry_id),
    FOREIGN KEY (student_id) REFERENCES ref_students(student_id),
    FOREIGN KEY (offering_id) REFERENCES courses_offering(offering_id),
    FOREIGN KEY (term_id) REFERENCES ref_term(term_id)
);

-- Courses Taken
CREATE TABLE courses_taken(
    taken_id int(10) NOT NULL AUTO_INCREMENT,
    student_id int(11) NOT NULL,
    offering_id int(10) NOT NULL,
    term_id int(3) NOT NULL,
    PRIMARY KEY (taken_id),
    FOREIGN KEY (student_id) REFERENCES ref_students(student_id),
    FOREIGN KEY (offering_id) REFERENCES courses_offering(offering_id),
    FOREIGN KEY (term_id) REFERENCES ref_term(term_id)
);


CREATE TABLE sections(
	uuid varchar(100) NOT NULL,
	course_offering_uuid varchar(100) NOT NULL,
	section_type varchar(100) NOT NULL,
	number int(10) NOT NULL,
    room_uuid varchar(50) NOT NULL,
    schedule_uuid varchar(50) NOT NULL,
	PRIMARY KEY (uuid)
);

CREATE TABLE teachings(
	instructor_id int(10) NOT NULL,
	section_uuid varchar(100) NOT NULL
);

CREATE TABLE course_offerings_tmp(
	uuid  varchar(100) NOT NULL,
	course_uuid varchar(100) NOT NULL,
	term_code varchar(10) NOT NULL,
	name  varchar(100) NOT NULL,
	PRIMARY KEY (uuid)
);