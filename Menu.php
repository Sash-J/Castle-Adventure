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
</head>

<body>

    <div class="container">
        <div class="menu-container">
            <h2>Menu</h2>
            <h3>Detective <?= htmlspecialchars($_SESSION['username']); ?>!</h3>
            <div class="menu-buttons">
                <button id="startGame" onclick="startGame()" class="img-btn">
                    <img class="btn-image" src="./Assets/Button_1.png">
                    <span class="Btn-text">Start</span>
                </button><br>

                <button onclick="instructions()" class="img-btn">
                    <img class="btn-image" src="./Assets/Button_1.png">
                    <span class="Btn-text">Instructions</span>
                </button><br>

                <button onclick="logout()" class="img-btn">
                    <img class="btn-image" src="./Assets/Button_1.png">
                    <span class="Btn-text">Logout</span>
                </button><br>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>