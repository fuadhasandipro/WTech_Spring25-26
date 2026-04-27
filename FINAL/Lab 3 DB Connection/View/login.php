<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login - Fuad Hasan</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h2>Welcome to Login</h2>
    <hr>
    <form method="post" action="../Controller/loginvalidation.php">
        <table border="0" cellspacing="10">
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required></td>
                <td style="color:red;">*</td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required></td>
                <td style="color:red;">*</td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Sign In">
                </td>
            </tr>
        </table>
    </form>
    <p>New here? <a href="registration.php">Register instead</a></p>
</body>
</html>