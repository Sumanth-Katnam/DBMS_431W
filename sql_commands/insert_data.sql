-- Students Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data/students.csv'
 INTO TABLE ref_students
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
   IGNORE 1 LINES
 (fname,mname,lname,email_id);

--SET FOREIGN_KEY_CHECKS=0;
--SET FOREIGN_KEY_CHECKS=1;
-- Instructors Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data/instructors.csv'
 INTO TABLE ref_instructors
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
  IGNORE 1 LINES
 (instructor_id,fname,mname,lname,email_id);

-- ref_courses Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data/courses.csv'
 INTO TABLE ref_courses
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\n'
   IGNORE 1 LINES
 (courses_id,name,stream);

-- ref_room Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data/rooms.csv'
 INTO TABLE ref_room
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
    IGNORE 1 LINES
 (room_id,room_code,capacity);

-- Students Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data/schedules.csv'
 INTO TABLE ref_schedules
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
    IGNORE 1 LINES
 (schedule_id,start_time,end_time,occurrence);

-- ref_term Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data/ref_term.csv'
 INTO TABLE ref_term
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
 (fld1,fld2,fld3,fld4);

-- courses_cart Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data/courses_cart.csv'
 INTO TABLE courses_cart
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
 (fld1,fld2,fld3,fld4);

-- courses_taken Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data/courses_taken.csv'
 INTO TABLE courses_taken
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
 (fld1,fld2,fld3,fld4);

 --sections table
 LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data/sections.csv'
  INTO TABLE sections
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
     IGNORE 1 LINES
  (uuid,course_offering_uuid,section_type,number,room_uuid,schedule_uuid);

  --teachings table
  LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data/teachings.csv'
   INTO TABLE teachings
   FIELDS TERMINATED BY ','
   LINES TERMINATED BY '\n'
      IGNORE 1 LINES
   (instructor_id,section_uuid);

  --course_offerings table
  LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data/course_offerings.csv'
   INTO TABLE course_offerings_tmp
   FIELDS TERMINATED BY ','
   LINES TERMINATED BY '\n'
      IGNORE 1 LINES
   (uuid,course_uuid,term_code,name);


 Insert into course_offerings
 select NULL,d.courses_id, b.instructor_id, c.room_uuid, c.schedule_uuid
 from course_offerings_tmp a, teachings b, sections c, ref_courses d
 where a.course_uuid = d.courses_id
 and b.section_uuid = c.uuid
 and a.uuid = c.course_offering_uuid;