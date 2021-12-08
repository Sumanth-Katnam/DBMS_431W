CREATE VIEW Report1 AS
SELECT D.id, D.dept_name, C.course_id, C.course_name, I.instructor_id, I.fname, B.cnt
FROM courses_taken A, ref_courses C,(
    SELECT course_id,count(*) as cnt
    FROM courses_taken C1, course_offerings C2
    WHERE C1.offering_id = C2.offering_id
    GROUP BY course_id) B, ref_department D,ref_instructor I, course_offerings O
WHERE A.offering_id = O.offering_id
AND B.offering_id = O.offering_id
AND C.dept_id = O.dept_id
AND O.instructor_id = I.instructor_id;
AND A.course_id = B.course_id;


CREATE VIEW Report1 AS
SELECT D.dept_id, D.dept_name, C.course_id, C.course_name, I.instructor_id, I.fname, count(*) as total
FROM courses_taken A, ref_courses C, ref_department D,ref_instructors I, course_offerings O
WHERE A.offering_id = O.offering_id
AND C.course_id = O.course_id
AND C.dept_id = D.dept_id
AND I.instructor_id = O.instructor_id
GROUP BY D.dept_id,C.course_id,I.instructor_id;

CREATE INDEX capacity_check
ON ref_room(capacity);