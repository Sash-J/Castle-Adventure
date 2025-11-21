<?php
session_start();
if (isset($_GET['form'])) {
    $_SESSION['active_form'] = $_GET['form'];
}

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

function showError($errors)
{
    return !empty($errors) ? "<p class='error-messege'>$errors</p>" : '';
}

function isActiveForm($formName, $activeForm) /* Setting the active form */
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
            <form action="Auth.php" method="post">
                <?= showError($errors['login']); ?>
                <h2>Login</h2>
                <Label>
                    Username<br>
                    <input type="text" name="logusername" placeholder="Enter Username" alt="Enter Username">
                </Label><br><br>
                <label>
                    Password<br>
                    <input type="password" name="logpassword" placeholder="Enter Password" alt="Enter Password">
                </label><br>
                <button type="submit" name="login" class="img-btn">
                    <img class="btn-image" src="./Assets/Button_1.png">
                    <span class="Btn-text">Login</span>
                </button>
                <p>Don't have an account? <a href="login.php?form=register">Register</a></p>
            </form>
        </div>

        <div class="form <?= isActiveForm('register', $activeForm); ?>" id="form-register">
            <form action="Auth.php" method="post">
                <?= showError($errors['register']); ?>
                <h2>Registration</h2>
                <table>
                    <tr>
                        <td>
                            <label>Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><br>
                        </td>
                        <td>
                            <input type="text" name="regname" placeholder="Enter a Name" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Username&nbsp&nbsp</label><br>
                        </td>
                        <td>
                            <input type="text" name="regusername" placeholder="Enter Username" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password&nbsp&nbsp</label><br>
                        </td>
                        <td>
                            <input type="password" name="regpassword" placeholder="Enter Password" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><br>
                        </td>
                        <td>
                            <input type="text" name="regemail" placeholder="Enter Email" required>
                        </td>
                    </tr>
                </table>
                <button type="submit" name="register" class="img-btn">
                    <img class="btn-image" src="./Assets/Button_1.png">
                    <span class="Btn-text">Register</span>
                </button>
                <p>Already have an account? <a href="login.php?form=login">Login</a></p>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>