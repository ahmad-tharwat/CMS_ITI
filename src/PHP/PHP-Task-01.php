<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syllabus</title>
    <link rel="stylesheet" href="../CSS/main.css">
</head>

<body>
    <header>
        <a href="https://iti.gov.eg">
            <img id="logo" src="../../imgs/ITI_logo.png" height="50" alt="iti logo">
        </a>
        <nav id="buttons">
            <a href="../../index.html">Home</a>
            <a href="../HTML/syllabus.html">Road Map</a>
            <a href="../HTML/registration_form.html">Registration Form</a>
            <a href="../HTML/JS-Task-01.html">JS Task-01</a>
            <a href="../HTML/JS-Task-02.html">JS Task-02</a>
            <a href="../HTML/JS-Task-03.html">JS Task-03</a>
            <a href="./PHP-Task-01.php" class="active">PHP Task-01</a>
            <a href="./PHP-Task-02.php">PHP Task-02</a>
            <a href="./PHP-Task-03.php">PHP Task-03</a>
            <a href="https://iti.gov.eg/contact-us">Contact</a>
        </nav>
    </header>
    <div>
        <?php
            define('WEBSITE_NAME', 'ITI-CMS');
            $age = 10;
            switch (true) {
                case ($age < 5):
                    echo "Stay at home";
                    break;
                case ($age == 5):
                    echo "Go to Kindergarten";
                    break;
                case ($age >= 6 && $age <= 12):
                    echo "Go to grade: " . $age;
                    break;
                default:
                    echo "Age is not within specified ranges";
            }
            phpinfo();
        ?>
    </div>

    <footer>
        <hr>
        <p style="text-align: center;">
            Copyright 2024 by Noha Salah &copy;. All Rights Reserved.
        </p>
    </footer>
</body>

</html>