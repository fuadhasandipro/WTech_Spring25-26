<?php
include "../Controller/loginvalidation.php";
$isloggedIn = $_SESSION["loggedIn"] ?? false;
if ($isloggedIn) {
    header("Location: Dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body>
        <form method='post' action="">
            <?php
            echo "<h1 style='color: red'>LogIn Page</h1>";
            ?>
            <p><span class="error"><?php echo $loginErr ?? '';?></span></p>
            <table>
                <tr>
                    <td> Email: </td>
                    <td> <input type="text" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>"/></td>
                    <td><span class="error">* <?php echo $emailErr ?? '';?></span></td>
                </tr>
                <tr>
                    <td> Password: </td>
                    <td> <input type="password" name="password"> </td>
                    <td><span class="error">* <?php echo $passwordErr ?? '';?></span></td>
                </tr>
                <tr>
                    <td> </td>
                    <td>
                        <input type="submit" value="Submit"/>
                    </td>
                </tr>
            </table>
        </form>
        <p>Don't have an account? <a href="Registration.php">Register here</a></p>
    </body>
</html>
