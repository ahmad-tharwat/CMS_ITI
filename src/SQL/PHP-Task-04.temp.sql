CREATE DATABASE php_day4;
USE php_day4;
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT,
    user_name VARCHAR(30) NOT NULL,
    user_email VARCHAR(20) NOT NULL,
    user_gender ENUM('male', 'female') NOT NULL,
    user_mail_list BOOLEAN NOT NULL,
    PRIMARY KEY (user_id)
);
DESCRIBE users;