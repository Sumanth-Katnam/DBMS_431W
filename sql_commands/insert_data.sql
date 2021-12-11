-- Students Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/students.csv'
 INTO TABLE ref_students
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
 (fname,mname,lname,email_id,password,last_logged_in,country_code,phone_number);

-- Instructors Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/instructors.csv'
 INTO TABLE ref_instructors
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
 (fname,mname,lname,email_id,password);

-- ref_department Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/departments.csv'
 INTO TABLE ref_department
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\n'
 (dept_name);

-- ref_courses Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/courses.csv'
 INTO TABLE ref_courses
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\n'
 (course_name,dept_id);

-- ref_room Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/rooms.csv'
 INTO TABLE ref_room
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
 (room_name,capacity);

-- Students Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/schedules.csv'
 INTO TABLE ref_schedules
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
 (occurrence,start_time,end_time);

--course_offerings table
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/course_offerings.csv'
 INTO TABLE course_offerings
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\n'
 (room_id,schedule_id,course_id,instructor_id);

-- courses_cart Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/courses_cart.csv'
 INTO TABLE courses_cart
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
 (fld1,fld2,fld3,fld4);

-- courses_taken Table load
LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/courses_taken.csv'
 INTO TABLE courses_taken
 FIELDS TERMINATED BY ','
 LINES TERMINATED BY '\r\n'
 (fld1,fld2,fld3,fld4);









 --sections table
 LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/sections.csv'
  INTO TABLE sections
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
  (uuid,course_offering_uuid,section_type,number,room_uuid,schedule_uuid);

  --teachings table
  LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/teachings.csv'
   INTO TABLE teachings
   FIELDS TERMINATED BY ','
   LINES TERMINATED BY '\n'
   (instructor_id,section_uuid);




 Insert into course_offerings
 select NULL,d.course_id, b.instructor_id, c.room_id, c.schedule_id


select * from (select *,row_number() over(partition by schedule_id,room_id order by schedule_id,room_id) as rn
from abc) a where a.rn =1 limit 10;

select * from (SELECT
   *,
   ROW_NUMBER() OVER (
      PARTITION BY schedule_id
      ORDER BY schedule_id
   ) row_num
FROM
   abc) a where a.row_num=1;

SELECT
  ROW_NUMBER() OVER(ORDER BY schedule_id ASC) AS Row,
  schedule_id, room_id
FROM abc limit 10;

 create table abc as
 select c.course_id, i.instructor_id, r.room_id, s.schedule_id
 from  ref_room r, ref_schedules s, ref_courses c, ref_instructors i;

SELECT *
FROM abc
INTO OUTFILE '/var/www/flask_app/data/temp.csv'
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n';

 -- ref_term Table load
 LOAD DATA LOCAL INFILE '/home/mmb7103/DBMS_431W/data_new/ref_term.csv'
  INTO TABLE ref_term
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\r\n'
  (fld1,fld2,fld3,fld4);

-----
