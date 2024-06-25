<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syllabus</title>
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/form.css">
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
            <a href="./PHP-Task-03.php" class="active">PHP Task-03</a>
            <a href="https://iti.gov.eg/contact-us">Contact</a>
        </nav>
    </header>
    <div>
        <?php
            echo "<h2>Application name: PHP class registration</h2>";
            $students = [
                ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'PHP'],
                ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'CMS'],
                ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'PHP'],
                ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
                ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'PHP'],
            ];
        ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Track</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr style="color: <?php echo ($student['track'] == 'CMS') ? 'red' : ''; ?>">
                        <td><?php echo $student['name']; ?></td>
                        <td><?php echo $student['email']; ?></td>
                        <td><?php echo $student['track']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div>
        <form action="<?php $_PHP_SELF ?>" method="post" id="form">
            <h1>Application name: AAST_BIS class registration</h1>
            <div class="title">
                Field marked with <span style="color: red;">*</span> are required fields
            </div>
            <table id="fTable">
                <thead>
                    <tr>
                        <th scope="col" id="labels"></th>
                        <th scope="col" id="inputs"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><label for="name"><span style="color: red;">*</span> Name</label></th>
                        <td><input type="text" class="text" id="name" name="name" required
                                placeholder="first_Name last_Name"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="email"><span style="color: red;">*</span> E-mail</label></th>
                        <td><input type="email" class="text" id="email" name="email" required
                                placeholder="mail@domain.abc"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="group_id">Group #</label></th>
                        <td><input type="text" class="text" id="group_id" name="group_id"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="class_details">Class details</label></th>
                        <td><textarea id="class_details" name="class_details"></textarea></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="gender"><span style="color: red;">*</span> Gender</label></th>
                        <td style="display: flex; width: 50%">
                            <input type="radio" class="text" id="gender1" name="gender" value="male" required>
                            <label for="gender1">Male</label>
                            <input type="radio" class="text" id="gender2" name="gender" value="female" required>
                            <label for="gender2">Female</label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="courses">Courses</label></th>
                        <td>
                            <select id="courses" name="courses[]" multiple>
                                <option value="php">PHP</option>
                                <option value="mysql">MySQL</option>
                                <option value="html">HTML</option>
                                <option value="js">JavaScript</option>
                                <option value="css">CSS</option>
                                <option value="git">Git</option>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <input type="checkbox" id="terms" name="terms" value="1" required>
                            <label for="terms"><span style="color: red;">*</span> I accept the <a href="#">terms of use</a></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" id="submission" name="submission" value="Submit >>">
                            <input type="reset" id="resetting" name="resetting" value="Reset">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
        <?php
            if (!empty($_REQUEST["group_id"]) && 
                !empty($_REQUEST["class_details"]) && 
                !empty($_REQUEST["courses"]))
                {
                    echo "Welcome ". $_REQUEST['name']. "<br />";
                    echo "Your e-mail is ". $_REQUEST['email']. "<br />";
                    echo "Your group number is #". $_REQUEST['group_id']. "<br />";
                    echo "Your class is ". $_REQUEST['class_details']. "<br />";
                    echo "Your gender is ". $_REQUEST['gender']. "<br />";
                    echo "You are studying the following course(s): ";
                    foreach ($_POST['courses'] as $course) {
                        echo $course . ", ";
                    }
                    echo "<br />";
            }
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