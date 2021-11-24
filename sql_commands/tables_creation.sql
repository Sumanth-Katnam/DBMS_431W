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
	instructor_id int(6) NOT NULL AUTO_INCREMENT,
	fname varchar(100) NOT NULL,
	mname varchar(100) NOT NULL,
	lname varchar(100) NOT NULL,
    email_id varchar(30) NOT NULL,
	PRIMARY KEY (instructor_id)
);

-- Courses Table
CREATE TABLE ref_courses(
	courses_id int(5) NOT NULL AUTO_INCREMENT,
	name varchar(100) NOT NULL,
	stream varchar(100) NOT NULL,
	PRIMARY KEY (courses_id)
);

-- Room Table
CREATE TABLE ref_room(
	room_id int(3) NOT NULL AUTO_INCREMENT,
	name varchar(100) NOT NULL,
	capacity varchar(100) NOT NULL,
	PRIMARY KEY (room_id)
);

-- Schedules Table
CREATE TABLE ref_schedules(
    schedule_id int(5) NOT NULL AUTO_INCREMENT,
    occurence varchar(10) NOT NULL,
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
CREATE TABLE courses_offering(
    offering_id int(10) NOT NULL AUTO_INCREMENT,
    courses_id int(5) NOT NULL,
    instructor_id int(6) NOT NULL,
    room_id int(3) NOT NULL,
    schedule_id int(5) NOT NULL,
    term_id int(3) NOT NULL,
    PRIMARY KEY (offering_id),
    FOREIGN KEY (courses_id) REFERENCES ref_courses(courses_id),
    FOREIGN KEY (instructor_id) REFERENCES ref_instructors(instructor_id),
    FOREIGN KEY (room_id) REFERENCES ref_room(room_id),
    FOREIGN KEY (schedule_id) REFERENCES ref_schedules(schedule_id),
    FOREIGN KEY (term_id) REFERENCES ref_term(term_id)
);


-- Courses Cart
CREATE TABLE courses_cart(
    cart_entry_id int(10) NOT NULL AUTO_INCREMENT,
    student_id int(11) NOT NULL,
    offering_id int(10) NOT NULL,
    status varchar(15) NOT NULL DEFAULT 'N/A',
    PRIMARY KEY (cart_entry_id),
    FOREIGN KEY (student_id) REFERENCES ref_students(student_id),
    FOREIGN KEY (offering_id) REFERENCES courses_offering(offering_id)
);

-- Courses Taken
CREATE TABLE courses_taken(
    taken_id int(10) NOT NULL AUTO_INCREMENT,
    student_id int(11) NOT NULL,
    offering_id int(10) NOT NULL,
    PRIMARY KEY (taken_id),
    FOREIGN KEY (student_id) REFERENCES ref_students(student_id),
    FOREIGN KEY (offering_id) REFERENCES courses_offering(offering_id)
);