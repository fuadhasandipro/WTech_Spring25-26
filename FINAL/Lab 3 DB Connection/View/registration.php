<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Registration - Fuad Hasan</title>
    <style>
        .required { color: red; }
        body { font-family: Arial, sans-serif; margin: 20px; }
    </style>
</head>
<body>
    <h2>Create Your Account</h2>
    <hr>
    <form action="../Controller/registrationvalidation.php" method="post">
        <table cellpadding="5">
            <tr>
                <td><label for="name">Full Name:</label></td>
                <td><input type="text" id="name" name="name" placeholder="Enter your name"></td>
                <td><span class="required">*</span></td>
            </tr>
            <tr>
                <td><label for="email">Email Address:</label></td>
                <td><input type="email" id="email" name="email" placeholder="example@domain.com"></td>
                <td><span class="required">*</span></td>
            </tr>
            <tr>
                <td><label for="password">Choose Password:</label></td>
                <td><input type="password" id="password" name="password"></td>
                <td><span class="required">*</span></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="btnSubmit" value="Register Account">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>