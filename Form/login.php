<?php
include("../connect/connect.php");
$pwdError = "";
$emailError = "";
if (isset($_POST["submit"])) {
    $conn = connect();
    $email = $_POST["Email"];
    $pwd = $_POST["Password"];
    $sql = "select * from db_employee.login_table where user_name='$email'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $email_admin = $row['user_name'];
    if ($email_admin == "davidcontact119@gmail.com") {
        // password verify security 100%
        $pwd_verify = $row['password'];
        if (password_verify($pwd, $pwd_verify)) {
            header("location: ../admin_page/login_process.php");
        } else {
            $pwdError = "Password is undefined!";
        }
    } else  if ($row == true) {
        // password verify security 100%
        $pwd_verify = $row['password'];
        if (password_verify($pwd, $pwd_verify)) {
            header("location: ../admin_page/user_process.php");
        } else {
            $pwdError = "Password is undefined!";
        }
    } else {
        $emailError = "Email is not correct!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="txt-head">
                <h4>Log In Form</h4>
            </div>
            <div class="form-input">
                <label for="Email">Email</label>
                <input type="Email" name="Email" placeholder="Example@gmail.com">
                <span><?php echo $emailError ?></span>
            </div>
            <div class="form-input">
                <label for="Password">Password</label>
                <input type="Password" name="Password" placeholder="xxx-xxx-xxx">
                <span><?php echo $pwdError ?></span>
            </div>
            <div class="activate">
                <label for="activate">
                    <input type="checkbox" name="activate" required>Remember Me
                </label>
            </div>
            <div class="form-input">
                <input type="submit" class="submit" name="submit" value="Log In">
            </div>
            <div class="form-input">
                <div>
                    <h4>Don't have an account? <a href="Register.php">Register Here!</a></h4>
                </div>
            </div>
        </form>
    </div>
</body>

</html>