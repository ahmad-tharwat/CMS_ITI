UPDATE students_courses SET reg_date = CURRENT_DATE();
SELECT DATE_FORMAT(reg_date, "%W %D Day of %M in %Y") as reg_date FROM students_courses;
SELECT CONCAT(first_name, " ", last_name) as full_name,
    CASE
        WHEN grade > 85 THEN 'Excellent'
        WHEN grade BETWEEN 75 AND 85 THEN 'Very Good'
        WHEN grade BETWEEN 65 AND 75 THEN 'Good'
        WHEN grade BETWEEN 55 AND 65 THEN 'Pass'
        ELSE 'Failed'
    END AS grade
    FROM students s, students_courses cs
    WHERE cs.student_id = s.student_id;
SELECT UCASE(last_name),
    IFNULL (grade, 'absent') AS grade
    FROM students s LEFT JOIN students_courses sc
    ON sc.student_id = s.student_id;
SELECT CONCAT(first_name, " ", last_name) as full_name, course_name, grade
    FROM students s, students_courses cs, courses c
    WHERE cs.student_id = s.student_id AND cs.course_id = c.course_id;
SELECT course_name, MIN(grade), MAX(grade), AVG(grade), COUNT(sc.student_id) AS no_students
    FROM courses c, students_courses sc
    WHERE sc.course_id = c.course_
    GROUP BY course_name;
SELECT CONCAT(first_name, " ", last_name) as full_name
        FROM students s
        WHERE birth_date < (
            SELECT birth_date FROM students WHERE student_id = 1
        );
