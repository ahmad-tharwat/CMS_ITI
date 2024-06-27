<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syllabus</title>
    <link rel="stylesheet" href="../CSS/main.css">
    <style>
        #db {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Adjust margin as needed */
        }

        #db, #db th, #db td {
            border: 1px solid whitesmoke;
        }

        #db th, #db td {
            padding: 8px;
            text-align: left;
        }

        #db th {
            background-color: #8b0000;
            color: white;
            text-align: center;
        }
        
        #content {
            background-color: #363636;
            color: whitesmoke;
            padding: 20px;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        .add-button {
            background-color: #8b0000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #6a0000;
        }

        .action-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 18px;
            margin-right: 5px;
            display: inline-block;
            padding: 5px;
        }

        .action-button:hover {
            color: #8b0000;
        }

        .action-button .icon {
            display: inline-block;
            vertical-align: middle;
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
        
        function user_view($user_id, $status_flag=null) {
            // 1st phase: establish connection (put inside all functions)
            $connect = __server_connect__($status_flag);
            
            // 2nd phase: the function logic
            $sql = "SELECT user_id, user_name, user_email, user_gender, user_mail_list FROM users WHERE user_id = $user_id";
            $row = mysqli_fetch_assoc(mysqli_query($connect, $sql));
            
            // 3rd phase: HTML drawing
            echo "<div>";
            echo "<h1>View Record</h1>";
            echo "<p><strong>Name:</strong><br>{$row['user_name']}</p>";
            echo "<p><strong>Email:</strong><br>{$row['user_email']}</p>";
            echo "<p><strong>Gender:</strong><br>{$row['user_gender']}</p>";
            echo "<p><strong>Mailing List Status:</strong><br> ". ($row['user_mail_list'] ? 'Receives mailing list' : 'Not in mailing list') ."</p>";
            echo "<button class='add-button' onclick=\"location.href='PHP-Task-04.php'\">Back</button><br>";
            echo "</div>";
        
            // 4th phase: disconnect (put inside all functions)
            __server_disconnect__($connect, 0);        
        }

        user_view($_GET['id'], 0);
    ?>
    <footer>
        <hr>
        <p style="text-align: center;">
            Copyright 2024 by Noha Salah &copy;. All Rights Reserved.
        </p>
    </footer>
</body>
</html>