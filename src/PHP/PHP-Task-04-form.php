<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syllabus</title>
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/form.css">
    <style>
        .buttons {
            padding: 5px 10px;
            margin-inline: 20px;
            background-color: #8b0000;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            text-decoration: none;
        }

        .buttons:hover {
            background-color: #b30000;
        }
    </style>
</head>

<body>
    <?php
        include '../templates/header.html';

        function __server_connect__($status_flag=null) {
            $connection = mysqli_connect('localhost', 'root', '', 'php_day4') 
                or die("Connection Unsuccessfull: " . mysqli_connect_error() . "<br>");
            if ($status_flag===0) {
                echo "<span style='color:#14c4ff'>-------------------------------------------------</span><br>";
                echo "Connection to <span style='color:#14c4ff'> php_day4 </span> established <br>";
                echo "Host information: " . mysqli_get_host_info($connection) . "<br>";
                echo "<span style='color:#14c4ff'>-------------------------------------------------</span><br>";
            }
            return $connection;
        }

        function __server_disconnect__($connection, $status_flag=null) {
            mysqli_close($connection) 
                or die("Unable to disconnect<br>");
            if ($status_flag===0) {
                echo "<span style='color:#14c4ff'>-------------------------------------------------</span><br>";
                echo "Disconnected successfully <br>";
            }
        }
        
        function user_register($status_flag = null) {
            // 1st phase: establish conncetion (put inside all functions)
            $connect = __server_connect__($status_flag);
            
            // 2nd phase: the function logic
            include '../templates/registration_form.php';
            if (isset($_POST['name'], $_POST['email'], $_POST['gender'])) {
                if ($stmt = mysqli_prepare($connect, "INSERT INTO users (user_name, user_email, user_gender, user_mail_list) VALUES (?, ?, ?, ?)")) {
                    $mail = isset($_POST['mail']) ? 1 : 0;
                    mysqli_stmt_bind_param($stmt, "sssi", $_POST['name'], $_POST['email'], $_POST['gender'], $mail);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "New user added to database<br>";
                    } else {
                        echo "Error: " . mysqli_error($connect);
                    }
                    mysqli_stmt_close($stmt);
                }
            }

            // 3rd phase: disconnect (put inside all functions)
            __server_disconnect__($connect, $status_flag); 
        }

        user_register(0);
    ?>
    <footer>
        <hr>
        <p style="text-align: center;">
            Copyright 2024 by Noha Salah &copy;. All Rights Reserved.
        </p>
    </footer>
</body>
</html>