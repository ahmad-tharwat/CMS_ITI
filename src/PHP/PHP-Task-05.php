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
            <a href="./PHP-Task-01.php">PHP Task-01</a>
            <a href="./PHP-Task-02.php">PHP Task-02</a>
            <a href="./PHP-Task-03.php">PHP Task-03</a>
            <a href="./PHP-Task-04.php">PHP Task-04</a>
            <a href="./PHP-Task-05.php" class="active">PHP Task-05</a>
            <a href="https://iti.gov.eg/contact-us">Contact</a>
        </nav>
    </header>
    <?php
        function session() {
            session_start();
            $_SESSION['name'] = 'Ahmad';
            setcookie("name", "Ahmad Tharwat", time()+60);
            echo "<pre>";
            print_r($_SESSION);
            echo "<pre>";
            if (isset($_SESSION['page_count'])) $_SESSION['page_count'] += 1; else $_SESSION['page_count'] = 1;
            echo "Number of visits = <span style='color:#14c4ff'>" . $_SESSION['page_count'] . "</span> times<br>";
            echo "Session ID is <span style='color:#14c4ff'>" . session_id() . "</span><br>";
        }
        session();
        if ($_SESSION['page_count'] > 10) {
            session_regenerate_id();
            echo "<br>Session destroyed<br>";
            echo "Next session id will be: <span style='color:#14c4ff'>" . session_id() . "</span><br>";
            session_destroy();
        }
    ?>
    <footer>
        <hr>
        <p style="text-align: center;">
            Copyright 2024 by Noha Salah &copy;. All Rights Reserved.
        </p>
    </footer>
</body>
</html>