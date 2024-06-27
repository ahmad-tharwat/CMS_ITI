CREATE DATABASE grades;
USE grades;
CREATE TABLE students (
    student_id INT,
    student_name VARCHAR(100) NOT NULL,
    email VARCHAR(50),
    tel VARCHAR(20),
    PRIMARY KEY (student_id)
);
CREATE TABLE courses (
    course_id INT,
    course_name VARCHAR(100) NOT NULL,
    credit_hour INT,
    PRIMARY KEY (course_id)
);
CREATE TABLE students_courses (
    course_id INT,
    student_id INT,
    grade INT,
    reg_date DATE,
    PRIMARY KEY (course_id, student_id),
    FOREIGN KEY (course_id) REFERENCES courses (course_id),
    FOREIGN KEY (student_id) REFERENCES students (student_id)
);
ALTER TABLE students MODIFY student_name VARCHAR(150);
ALTER TABLE students ADD UNIQUE(email);
SELECT CURRENT_TIME(), CURRENT_DATE(), CURRENT_USER(), VERSION();
ALTER TABLE students ADD COLUMN gender ENUM('male', 'female');
ALTER TABLE students ADD COLUMN BIRTH_DATE DATE;
ALTER TABLE students 
    DROP COLUMN student_name,
    ADD COLUMN first_name VARCHAR(50) NOT NULL,
    ADD COLUMN last_name VARCHAR(50) NOT NULL;
INSERT INTO students
    SET student_id = 2,
        first_name = 'Ahmad',
        last_name = 'Tharwat',
        tel = '01153229951',
        email = 'ahmad_20th@tuta.io',
        gender = 'male',
        birth_date = '1999-05-01';
CREATE TABLE MALE_STUDENTS SELECT * FROM students WHERE gender = 'male';