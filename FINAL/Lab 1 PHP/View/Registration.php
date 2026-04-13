<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>

<body>

    <form method="POST" action="">
        <table>
            <tr>
                <p style="color: red">* required field</p>
            </tr>
            <tr>
                <td> <label for="name">Name: </label> </td>
                <td> <input type="text" name="name"> </td>
                <td><p style="color: red">*</p></td>
            </tr>
            <tr>
                <td> <label for="email">Email: </label> </td>
                <td> <input type="email" name="Email"> </td>
                <td><p style="color: red">*</p></td>
            </tr>
            <tr>
                <td> <label for="website">Website: </label> </td>
                <td> <input type="text" name="Website"> </td>
            </tr>
            <tr>
                <td> <label for="comment">Comment: </label> </td>
                <td> <textarea name="comment" rows="5"></textarea> </td>
            </tr>
            <tr>
                <td> <label for="gender">Gender: </label> </td>
                <td> 
                    <input type="radio" name="male"> <label for="male">Male</label>
                    <input type="radio" name="female"> <label for="female">Female</label>
                    <input type="radio" name="other"> <label for="other">Other</label>
                </td>
                <td><p style="color: red">*</p></td>
            </tr>
            <tr>
                  <td> <input type="submit" name="submit"> </td>
            </tr>
        </table>
    </form>

</body>
</html>