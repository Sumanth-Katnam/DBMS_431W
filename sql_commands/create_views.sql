--- number of students per course
--CREATE VIEW Report1 AS
--SELECT D.id, D.dept_name, C.course_id, C.course_name, I.instructor_id, I.fname, B.cnt
--FROM courses_taken A, ref_courses C,(
  --  SELECT course_id,count(*) as cnt
    --FROM courses_taken C1, course_offerings C2
    --WHERE C1.offering_id = C2.offering_id
    --GROUP BY course_id) B, ref_department D,ref_instructor I, course_offerings O
--WHERE A.offering_id = O.offering_id
--AND B.offering_id = O.offering_id
--AND C.dept_id = O.dept_id
--AND O.instructor_id = I.instructor_id;
--AND A.course_id = B.course_id;


CREATE VIEW Report1 AS
SELECT D.dept_id, D.dept_name, C.course_id, C.course_name, I.instructor_id, concat(I.fname," ",I.mname," ",I.lname) as instructor_name, count(*) as total
FROM courses_taken A, ref_courses C, ref_department D,ref_instructors I, course_offerings O
WHERE A.offering_id = O.offering_id
AND C.course_id = O.course_id
AND C.dept_id = D.dept_id
AND I.instructor_id = O.instructor_id
GROUP BY D.dept_id,C.course_id,I.instructor_id;

CREATE INDEX capacity_check
ON ref_room(capacity);

--vacant slots per room
CREATE VIEW Report2 AS
SELECT A.room_name, A.occurrence, A.start_time, A.end_time
FROM (SELECT *
    FROM ref_room R, ref_schedules S) A LEFT JOIN
    (SELECT room_id,schedule_id
    FROM course_offerings C
    GROUP BY room_id,schedule_id) B
ON  A.room_id = B.room_id
AND A.schedule_id = B.schedule_id
WHERE B.schedule_id is null;

--Instructor Availability
CREATE VIEW Report3 AS
SELECT A.instructor_id, concat(A.fname," ",A.mname," ",A.lname) as instructor_name, A.occurrence, A.start_time, A.end_time
FROM (SELECT *
    FROM ref_instructors I, ref_schedules S) A LEFT JOIN
    (SELECT instructor_id,schedule_id
    FROM course_offerings C
    GROUP BY instructor_id,schedule_id) B
ON  A.instructor_id = B.instructor_id
AND A.schedule_id = B.schedule_id
WHERE B.schedule_id is null;

--number of cart entries per course
CREATE VIEW Report4 AS
SELECT C.course_id, C.course_name, I.instructor_id, concat(I.fname," ",I.mname," ",I.lname) as instructor_name, S.occurrence, S.start_time, S.end_time, D.count
FROM ref_courses C, ref_instructors I, ref_schedules S, courses_cart_entry A, course_offerings B,
    (SELECT b.course_id,count(*) as count
    FROM course_offerings b, ref_courses c, courses_cart_entry CE
    WHERE b.course_id =  c.course_id and b.offering_id = CE.offering_id
    GROUP BY b.course_id) D
WHERE A.offering_id = B.offering_id
AND B.course_id = C.course_id
AND B.instructor_id = I.instructor_id
AND B.schedule_id = S.schedule_id
AND B.course_id = D.course_id;
