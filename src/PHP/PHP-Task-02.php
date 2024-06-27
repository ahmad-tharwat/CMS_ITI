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
            <a href="./PHP-Task-02.php" class="active">PHP Task-02</a>
            <a href="./PHP-Task-03.php">PHP Task-03</a>
            <a href="./PHP-Task-04.php">PHP Task-04</a>
            <a href="./PHP-Task-05.php">PHP Task-05</a>
            <a href="https://iti.gov.eg/contact-us">Contact</a>
        </nav>
    </header>
    <div>
        <?php
            /* Task 1 */
            echo nl2br("Task One\n\n");
            /* Task 4 */
            echo "Task 4<br>";
            $indexed_array = [12, 45, 10, 25];
            $sum = array_sum($indexed_array);
            $avg = $sum / count($indexed_array);
            print_r($indexed_array);
            echo "<br>Sum: " . $sum . "<br>";
            echo "Average: " . $avg . "<br>";
            arsort($indexed_array);
            echo "Values in descending order:<br>";
            print_r($indexed_array);
            /* Task 5 */
            $assoc_array = array("Sara"=>31, "John"=>41, "Walaa"=>39, "Ramy"=>40);
            echo "<br><br>Task 5<br>";
            echo "Associative Array:<br>";
            print_r($assoc_array);
            asort($assoc_array);
            echo "<br>Ascending order by value: <br>";
            print_r($assoc_array);
            echo "<br>";
            ksort($assoc_array);
            echo "Ascending order by key: <br>";
            print_r($assoc_array);
            echo "<br>";
            arsort($assoc_array);
            echo "Descending order by value: <br>";
            print_r($assoc_array);
            echo "<br>";
            krsort($assoc_array);
            echo "Descending order by key: <br>";
            print_r($assoc_array);
            /* Task 3 */
            echo "<br><br>Task 3<br>";
            echo '<pre>', print_r($_SERVER);
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