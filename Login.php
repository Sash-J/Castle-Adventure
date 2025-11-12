<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($errors)
{
    return !empty($errors) ? "<p class='error-message'>$errors</p>" : '';
}

function isActiveForm($formName, $activeForm)
{
    return $formName === $activeForm ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Castle Adventure</title>
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <!-- yt by @codehal in Login and registration - full stack -->
    <div class="container">
        <div class="form <?= isActiveForm('login', $activeForm); ?>" id="form-login">
            <form action="Register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']); ?>
                <Label id="user">Username</Label><br>
                <input type="text" name="logusername" placeholder="Enter Username" required><br>
                <label id="pass">Password</label><br>
                <input type="password" name="logpassword" placeholder="Enter Password" required><br>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('form-register')">Register</a></p>
            </form>
        </div>

        <div class="form <?= isActiveForm('register', $activeForm); ?>" id="form-register">
            <form action="Register.php" method="post">
                <h2>Registration</h2>
                <?= showError($errors['register']); ?>
                <label>Name</label>
                <input type="text" name="regname" placeholder="Enter Name" required><br>
                <label>Username</label>
                <input type="text" name="regusername" placeholder="Enter a Username" required><br>
                <label>Password</label>
                <input type="text" name="regpassword" placeholder="Enter a Password" required><br>
                <label>Email</label>
                <input type="text" name="regemail" placeholder="Enter a email" required><br>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="" onclick="showForm('form-login')">Login</a></p>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>