<?php
session_start();
if (isset($_GET['form'])) {
    $_SESSION['active_form'] = $_GET['form'];
}

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

$successMsg = $_SESSION['register_success'] ?? '';

unset($_SESSION['login_error']);
unset($_SESSION['register_error']);
unset($_SESSION['register_success']);

$activeForm = $_SESSION['active_form'] ?? 'login';

function showError($errors)
{
    return !empty($errors) ? "<p class='error-messege'>$errors</p>" : '';
}

function showSuccess($successMsg)
{
    return !empty($successMsg) ? "<p class='success-messege'>$successMsg</p>" : '';
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

    <link rel="preload" href="Assets/Button_1.png" as="image">
    <link rel="preload" href="Assets/Button_2.png" as="image">
    <link rel="preload" href="Assets/Button_3.png" as="image">
    <link rel="preload" href="Assets/Button_4.png" as="image">
    <link rel="preload" href="Assets/Button_5.png" as="image">
    <link rel="preload" href="Assets/character01.png" as="image">
    <link rel="preload" href="Assets/character02.png" as="image">
    <link rel="preload" href="Assets/Game_Background.png" as="image">
    <link rel="preload" href="Assets/Lg_Background.png" as="image">
    <link rel="preload" href="Assets/MessageBox.png" as="image">
    <link rel="preload" href="Assets/MessageBox01.png" as="image">
    <link rel="preload" href="Assets/MessageBox02.png" as="image">

    <link rel="preload" href="https://fonts.gstatic.com/s/alexbrush/v19/SZc43FDpIKu6Hn4zHrekYw.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/pirataone/v17/I_urMpiDvgLdLh0fAtoft_SebaPcwNol.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/grenzegotisch/v17/0Fl5VN1Iz6e-B7j9F54FR920W5c.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/moondance/v7/uU9PCBUV5E0G4CCltZI4lw.woff2" as="font" type="font/woff2" crossorigin>
</head>

<body>
    <!-- W3C School tutorial reference  -->
    <!-- yt by @codehal in Login and registration - full stack ----- https://youtu.be/LiomRvK7AM8 -->
    <!----------- Login -------------->
    <div class="container">
        <div class="titleImg"><img src="./Assets/Title.png"></div>

        <?= showError($errors['login']); ?>

        <div class="form <?= isActiveForm('login', $activeForm); ?>" id="form-login">
            <form action="Auth.php" method="post">

                <h2>Login</h2>
                <Label>
                    Username<br>
                    <input type="text" name="logusername" placeholder="Enter Username" alt="Enter Username"
                        value="<?php echo isset($_SESSION['current_username']) ? $_SESSION['current_username'] : ''; ?>">
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
            <button type="button" name="guestBtn" class="guestImg-btn" onclick="guestLogin()">
                <img class="guestBtn-image" src="./Assets/Button_1.png">
                <span class="guest-text">Guest Player</span>
            </button>
        </div>

        <!----------- Registration -------------->
        <div class="form <?= isActiveForm('register', $activeForm); ?>" id="form-register">
            <form action="Auth.php" method="post">

                <?= showSuccess($successMsg); ?>

                <?php unset($_SESSION['current_username']);  //unset temporary saved username
                showError($errors['register']); ?>
                <!-- catch any errors in registration-->

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