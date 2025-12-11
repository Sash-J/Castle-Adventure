<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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

    <div class="container">
        <div class="titleImg"><img src="./Assets/Title.png"></div>

        <div class="menu-container">
            <h2>Menu</h2>
            <h3>Welcome!<br>Detective <?= htmlspecialchars($_SESSION['username']); ?>!</h3>
            <div class="menu-buttons">
                <button id="startGame" onclick="startGame()" class="img-btn">
                    <img class="btn-image" src="./Assets/Button_2.png">
                    <span class="Btn-text">Start</span>
                </button><br>

                <button onclick="instructions()" class="img-btn">
                    <img class="btn-image" src="./Assets/Button_2.png">
                    <span class="Btn-text">Instructions</span>
                </button><br>

                <button onclick="logout()" class="img-btn">
                    <img class="btn-image" src="./Assets/Button_2.png">
                    <span class="Btn-text">Logout</span>
                </button><br>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>