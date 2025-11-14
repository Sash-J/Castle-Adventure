<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>

<body>
    <div class="menu">
        <h1>Welcome, <span><?= $_SESSION['name']; ?></span></h1>
    </div>
</body>

</html>