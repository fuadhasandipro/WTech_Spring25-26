<?php
include "../Controller/RegistrationController.php";
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                <td><span class="error">* <?php echo $nameErr ?? '';?></span></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                <td><span class="error">* <?php echo $emailErr ?? '';?></span></td>
            </tr>
            <tr>
                <td>Website:</td>
                <td><input type="text" name="website" value="<?php echo $website; ?>"></td>
                <td><span class="error"><?php echo $websiteErr ?? '';?></span></td>
            </tr>
            <tr>
                <td>Comment:</td>
                <td><textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea></td>
                <td></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
                    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
                </td>
                <td><span class="error">* <?php echo $genderErr ?? '';?></span></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
                <td><span class="error">* <?php echo $passwordErr ?? '';?></span></td>
            </tr>
            <tr>
                <td>File Upload:</td>
                <td><input type="file" name="file"></td>
                <td><span class="error"><?php echo $fileErr ?? '';?></span></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
