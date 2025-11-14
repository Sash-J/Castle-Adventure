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

function isActiveForm($formName, $activeForm) /* Setting the active block */
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
    <!-- Messege Box -->
    
    <div class="container">
        <div class="form <?= isActiveForm('login', $activeForm); ?>" id="form-login">
            <form action="Register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']); ?> <!-- check for errors in username and password and if any display message -->
                <Label id="user">
                    Username<br>
                    <input type="text" name="logusername" placeholder="Enter Username" required>
                </Label><br>
                <label id="pass">
                    Password<br>
                    <input type="password" name="logpassword" placeholder="Enter Password" required>
                </label><br>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('form-register')">Register</a></p>
            </form>
        </div>

        <div class="form <?= isActiveForm('register', $activeForm); ?>" id="form-register">
            <form action="Register.php" method="post">
                <h2>Registration</h2>
                <?= showError($errors['register']); ?>
                <label>
                    Name
                    <input type="text" name="regname" placeholder="Enter Name" required>
                </label><br>
                <label>
                    Username
                    <input type="text" name="regusername" placeholder="Enter a Username" required>
                </label><br>
                <label>
                    Password
                    <input type="text" name="regpassword" placeholder="Enter a Password" required>
                </label><br>
                <label>
                    Email
                    <input type="text" name="regemail" placeholder="Enter a email" required>
                </label><br>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="" onclick="showForm('form-login')">Login</a></p>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>