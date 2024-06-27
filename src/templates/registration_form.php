<?php
    function retain_value($field_name, $element_type) {
        if (isset($_POST[$field_name])) {
            $value = $_POST[$field_name];
        } else {
            $value = '';
        }
        switch ($element_type) {
            case 'text':
            case 'email':
            case 'number':
            case 'textarea':
                return htmlspecialchars($value);
                break;
            // putting the logic for radio and select elements is taking unnecessary time
            default:
                return '';
                break;
        }
    }
?>
<form action="<?php $_PHP_SELF ?>" method="post" id="form">
    <h1>User Registration Form</h1>
    <div class="title">
        Please fill this form and submit to add user record to the database
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
                <th scope="row"><label for="name">Name</label></th>
                <td><input type="text" class="text" id="name" name="name" required
                    pattern="[a-zA-Z ]+" placeholder="first_Name last_Name" value="<?php echo retain_value('name', 'text') ?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="email">E-mail</label></th>
                <td><input type="email" class="text" id="email" name="email" required
                        placeholder="mail@domain.abc" value="<?php echo retain_value('email', 'email') ?>"></td>
            </tr>
            <tr>
                <th scope="row"><label for="gender">Gender</label></th>
                <td style="display: flex; width: 50%">
                    <input type="radio" class="text" id="gender1" name="gender" value="male" 
                    <?php if (isset($_POST['gender']) && $_POST['gender'] === 'male') echo 'checked'; ?> required>
                    <label for="gender1">Male</label>
                    <input type="radio" class="text" id="gender2" name="gender" value="female" 
                    <?php if (isset($_POST['gender']) && $_POST['gender'] === 'female') echo 'checked'; ?> required>
                    <label for="gender2">Female</label>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <input type="checkbox" id="mail" name="mail" value="1">
                    <label for="mail">Sign-up in our mailing list</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" id="submission" class="buttons" name="submission" value="Submit >>">
                    <a href="../PHP/PHP-Task-04.php" class="buttons">Cancel</a>
                </td>
            </tr>
        </tfoot>
    </table>
</form>