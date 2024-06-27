SELECT * FROM students;
SELECT * FROM students WHERE gender='male';
SELECT count(*) AS No_Females FROM students WHERE gender='female';
SELECT * FROM students WHERE birth_date<'1992-10-01';
SELECT * FROM students WHERE gender='male' AND birth_date<'1992-10-01';
SELECT course_id, grade FROM students_courses
    ORDER BY grade;
SELECT concat(first_name, ' ', last_name) as student_name from students
    WHERE first_name LIKE 'A%';
SELECT gender, count(*) FROM students
    GROUP BY gender;
SELECT first_name, count(*) as repeats FROM students
    GROUP BY first_name
    HAVING repeats > 2;
-- SELECT course_name, MIN(grade) AS maximum FROM courses INNER JOIN students_courses
--     GROUP BY course_name
--     ON courses.course_id = students_courses.course_id;
SELECT courses.course_name FROM courses
    JOIN students_courses ON courses.course_id = students_courses.course_id
    WHERE students_courses.grade = (SELECT MAX(grade) FROM students_courses);
-- zeinab_anter@msn.com