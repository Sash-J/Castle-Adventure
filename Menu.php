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

    <div class="game-container">
        <h1 class="menuTitle">Menu</h1>
        <h3 style="color:white;">Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h3>
        <div class="menu-buttons">
            <button id="startGame" onclick="startGame()">Play</button>
            <button onclick="instructions()">Instructions</button>
            <button onclick="logout()">Logout</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>