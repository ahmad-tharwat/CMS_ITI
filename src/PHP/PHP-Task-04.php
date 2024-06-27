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

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .button {
            background-color: #8b0000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action-button {
            background-color: transparent;
            color: white;
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

        function __empty_users__($connection) {
            $sql = "TRUNCATE TABLE users";
            mysqli_query($connection, $sql);
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }

        function __delete_user__($connection) {
            $user_id = mysqli_real_escape_string($connection, $_GET['delete_id']);
            $sql = "DELETE FROM users WHERE user_id = $user_id";
            mysqli_query($connection, $sql);
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;   
        }

        function __edit_user__($connection, $display_query) {
            while($row = mysqli_fetch_assoc($display_query)) {
                echo "<tr>".
                     "<td>{$row['user_id']}</td>".
                     "<td><form action='' method='post'><input type='hidden' name='user_id' value='{$row['user_id']}'><input type='text' name='user_name' value='{$row['user_name']}'></td>".
                     "<td><input type='email' name='user_email' value='{$row['user_email']}'></td>".
                     "<td><input type='text' name='user_gender' value='{$row['user_gender']}'></td>".
                     "<td><input type='checkbox' name='user_mail_list' value='1' ".($row['user_mail_list'] == 1 ? 'checked' : '')."></td>".
                     "<td class='buttons'>";
                echo "<button type='submit' class='action-button' name='save_edit'>Save Edit</button>";
                echo "<button class='action-button' onclick=\"location.href='PHP-Task-04-view.php?id={$row['user_id']}'\">View</button>";
                echo "<button class='action-button' onclick=\"location.href='PHP-Task-04.php?delete_id={$row['user_id']}'\">Delete</button>";
                echo "</form></td></tr>";
            }
            $user_id = $_POST['user_id'];
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $user_gender = $_POST['user_gender'];
            $user_mail_list = $_POST['user_mail_list'];
            $sql = "UPDATE users SET user_name = '$user_name', 
                    user_email = '$user_email', 
                    user_gender = '$user_gender', 
                    user_mail_list = '$user_mail_list' 
                    WHERE user_id = '$user_id'";
            mysqli_query($connect, $sql);
        }

        function __html_display__($display_query) {
            echo "<div class='header-container'>";
            echo "<h1>Users Details</h1>";
            echo "<form method='post'>";
            echo "<button type='submit' class='button' name='clear_database' onclick=\"return confirm('Are you sure you want to clear the database? This action cannot be undone.');\">Clear Database</button>";
            echo "</form>";
            echo "<button class='button' onclick=\"location.href='PHP-Task-04-form.php'\">Add New User</button>";
            echo "</div>";
            if (mysqli_num_rows($display_query) > 0) {
                echo "<table id='db'>";
                echo "<tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Mailing list</th>
                        <th>Action</th>
                      </tr>";
                while($row = mysqli_fetch_assoc($display_query)) {
                    echo "<tr>".
                         "<td>{$row['user_id']}</td>".
                         "<td>{$row['user_name']}</td>".
                         "<td>{$row['user_email']}</td>".
                         "<td>{$row['user_gender']}</td>".
                         "<td>{$row['user_mail_list']}</td>".
                         "<td class='buttons'>";
                    /* --------------> Get back here <-------------- 
                     * CRUD operations task (Bonus):
                     * * edit
                     * */
                    echo "<button class='action-button' onclick=\"location.href='PHP-Task-04-view.php?id={$row['user_id']}'\">View</button>";
                    echo "<button class='action-button' onclick=\"editUser{$row['user_id']}'\">Edit</button>";
                    echo "<button class='action-button' onclick=\"deleteUser({$row['user_id']})\">Delete</button>";
                    echo "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Table is empty</p>";
            }
            // JavaScript function for delete confirmation (optional)
            echo "<script>
                    function deleteUser(user_id) {
                        if (confirm('Are you sure you want to delete this user?')) {
                            window.location.href = 'PHP-Task-04.php?delete_id=' + user_id;                    
                        }
                    }
                    function editUser(user_id) {
                        window.location.href = 'PHP-Task-04.php?edit_id=' + user_id;
                    }
                </script>";
        }

        function users_details($status_flag=null) {
            // 1st phase: establish conncetion (put inside all functions)
            $connect = __server_connect__($status_flag);
        
            // 2nd phase: SQL logic
            $sql = 'SELECT user_id, user_name, user_email, user_gender, user_mail_list FROM users';
            $display = mysqli_query($connect, $sql);
            if (isset($_POST['clear_database'])) {
                __empty_users__($connect);
            }
            if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
                __delete_user__($connect);
            }
            if (isset($_GET['edit_id']) && is_numeric($_GET['edit_id'])) {
                __edit_user__($connect, $display);
            }
            // 3rd phase: HTML drawing
            __html_display__($display);

            // 4th phase: free memory and disconnect (put inside all functions)
            mysqli_free_result($display);
            __server_disconnect__($connect, $status_flag);
        }

        users_details(0);
    ?>
    <footer>
        <hr>
        <p style="text-align: center;">
            Copyright 2024 by Noha Salah &copy;. All Rights Reserved.
        </p>
    </footer>
</body>
</html>