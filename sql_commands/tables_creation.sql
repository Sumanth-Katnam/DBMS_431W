-- Students Table
drop table ref_students;
CREATE TABLE ref_students(
	student_id int(11) NOT NULL AUTO_INCREMENT,
	fname varchar(100) NOT NULL,
	mname varchar(100) NOT NULL,
	lname varchar(100) NOT NULL,
    email_id varchar(30) NOT NULL,
    password varchar(30) NOT NULL,
    last_logged_in varchar(30) NOT NULL,
    country_code varchar(20) NOT NULL,
    phone_number int(11) NOT NULL,
	PRIMARY KEY (student_id)
);
desc ref_students;

-- Instructors Table
drop table ref_instructors;
CREATE TABLE ref_instructors(
	instructor_id int(11) NOT NULL AUTO_INCREMENT,
	fname varchar(100) NOT NULL,
	mname varchar(100) NOT NULL,
	lname varchar(100) NOT NULL,
    email_id varchar(50) NOT NULL,
    password varchar(30) NOT NULL,
	PRIMARY KEY (instructor_id)
);
desc ref_instructors;

--department table
drop table ref_department;
CREATE TABLE ref_department(
	dept_id int(11) NOT NULL AUTO_INCREMENT,
	dept_name varchar(30) NOT NULL,
	PRIMARY KEY (dept_id)
);
desc ref_department;


-- Courses Table
drop table ref_courses;
CREATE TABLE ref_courses(
	course_id int(11) NOT NULL AUTO_INCREMENT,
	course_name varchar(100) NOT NULL,
	dept_id int(11) NOT NULL,
	PRIMARY KEY (course_id),
	FOREIGN KEY (dept_id) REFERENCES ref_department(dept_id)
);
desc ref_courses;

-- Room Table
drop table ref_room;
CREATE TABLE ref_room(
	room_id int(11) NOT NULL AUTO_INCREMENT,
	room_name varchar(30) NOT NULL,
	capacity int(3) NOT NULL,
	PRIMARY KEY (room_id)
);
desc ref_room;

-- Schedules Table
drop table ref_schedules;
CREATE TABLE ref_schedules(
    schedule_id int(11) NOT NULL AUTO_INCREMENT,
    occurrence varchar(30) NOT NULL,
    start_time varchar(10) NOT NULL,
    end_time varchar(10) NOT NULL,
    PRIMARY KEY (schedule_id)
);
desc ref_schedules;

-- Courses Offering Table
drop table course_offerings;
CREATE TABLE course_offerings(
    offering_id int(11) NOT NULL AUTO_INCREMENT,
    course_id int(11) NOT NULL,
    instructor_id int(11) NOT NULL,
    room_id int(11) NOT NULL,
    schedule_id int(11) NOT NULL,
    PRIMARY KEY (offering_id),
    FOREIGN KEY (course_id) REFERENCES ref_courses(course_id),
    FOREIGN KEY (instructor_id) REFERENCES ref_instructors(instructor_id),
    FOREIGN KEY (room_id) REFERENCES ref_room(room_id),
    FOREIGN KEY (schedule_id) REFERENCES ref_schedules(schedule_id)
);
desc course_offerings;

-- Courses Cart
drop table courses_cart_entry;
CREATE TABLE courses_cart_entry(
    cart_entry_id int(11) NOT NULL AUTO_INCREMENT,
    student_id int(11) NOT NULL,
    offering_id int(11) NOT NULL,
    PRIMARY KEY (cart_entry_id),
    FOREIGN KEY (student_id) REFERENCES ref_students(student_id),
    FOREIGN KEY (offering_id) REFERENCES course_offerings(offering_id)
);
desc courses_cart_entry;




-- Courses Taken
drop table courses_taken;
CREATE TABLE courses_taken(
    taken_id int(11) NOT NULL AUTO_INCREMENT,
    student_id int(11) NOT NULL,
    offering_id int(11) NOT NULL,
    PRIMARY KEY (taken_id),
    FOREIGN KEY (student_id) REFERENCES ref_students(student_id),
    FOREIGN KEY (offering_id) REFERENCES course_offerings(offering_id)
);
desc courses_taken;




-----tables not being used


-- OLDER TABLES -- DO NOT USE ---

CREATE TABLE sections(
	uuid varchar(100) NOT NULL,
	course_offering_uuid varchar(100) NOT NULL,
	section_type varchar(100) NOT NULL,
	number int(11) NOT NULL,
    room_uuid varchar(50) NOT NULL,
    schedule_uuid varchar(50) NOT NULL,
	PRIMARY KEY (uuid)
);

CREATE TABLE teachings(
	instructor_id int(11) NOT NULL,
	section_uuid varchar(100) NOT NULL
);

CREATE TABLE course_offerings_tmp(
	uuid  varchar(100) NOT NULL,
	course_uuid varchar(100) NOT NULL,
	term_code varchar(10) NOT NULL,
	name  varchar(100) NOT NULL,
	PRIMARY KEY (uuid)
);


-- Term Table
CREATE TABLE ref_term(
    term_id int(3) NOT NULL AUTO_INCREMENT,
    season varchar(10) NOT NULL,
    year int(4) NOT NULL,
    PRIMARY KEY (term_id)
);
