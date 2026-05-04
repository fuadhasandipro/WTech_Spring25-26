<?php
session_start();
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true) {
    header("Location: Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome to Dashboard, <?php echo $_SESSION["UserName"]; ?>!</h1>
    <hr>
    <h3>Your Profile Details:</h3>
    <table border="1" cellpadding="10">
        <tr>
            <td><strong>User Name:</strong></td>
            <td><?php echo $_SESSION["UserName"]; ?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "N/A"; ?></td>
        </tr>
        <tr>
            <td><strong>Website:</strong></td>
            <td><?php echo isset($_SESSION["website"]) ? $_SESSION["website"] : "N/A"; ?></td>
        </tr>
        <tr>
            <td><strong>Gender:</strong></td>
            <td><?php echo isset($_SESSION["gender"]) ? $_SESSION["gender"] : "N/A"; ?></td>
        </tr>
        <tr>
            <td><strong>Comment:</strong></td>
            <td><?php echo isset($_SESSION["comment"]) ? $_SESSION["comment"] : "N/A"; ?></td>
        </tr>
        <?php if (isset($_SESSION["filepath"]) && !empty($_SESSION["filepath"])): ?>
        <tr>
            <td><strong>Uploaded File:</strong></td>
            <td>
                <a href="<?php echo $_SESSION["filepath"]; ?>" target="_blank">View File</a>
                <br>
                <?php 
                    $ext = pathinfo($_SESSION["filepath"], PATHINFO_EXTENSION);
                    if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif'])): 
                ?>
                    <img src="<?php echo $_SESSION["filepath"]; ?>" alt="Profile Picture" style="max-width: 200px; margin-top: 10px;">
                <?php endif; ?>
            </td>
        </tr>
        <?php endif; ?>
    </table>
    <br>
    <a href="../Controller/logout.php">Logout</a>
</body>
</html>
