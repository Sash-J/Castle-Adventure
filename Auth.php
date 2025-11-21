<?php

session_start();
require_once 'Database.php'; /* Database reading */

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}
//catch any error in connecting

// ------------Register------------
if (isset($_POST['register'])) {
  $name = $_POST['regname'];
  $username = $_POST['regusername'];
  $password = password_hash($_POST['regpassword'], PASSWORD_DEFAULT);
  $email = $_POST['regemail'];

  $checkUsername = $conn->query("SELECT username FROM user WHERE username = '$username'");

  if ($checkUsername->num_rows > 0) {
    $_SESSION['register_error'] = 'Username is already registered';
    $_SESSION['active_form'] = 'register';
  } else {
    $insert = $conn->query("INSERT INTO user (name, username, password, email) VALUES ('$name', '$username', '$password', '$email')");
    if ($insert) {
      $_SESSION['register_success'] = 'Registertion Success';
      $_SESSION['active_form'] = 'register';
      header("Location: Login.php");
      exit();
    } else {
      $_SESSION['register_error'] = 'Registration failed';
      $_SESSION['active_form'] = 'register';
    }
  }
}

// test comment
// ----------Login---------------
if (isset($_POST['login'])) {
  $username = $_POST['logusername'];
  $password = $_POST['logpassword'];

  $result = $conn->query("SELECT * FROM user WHERE username = '$username'");

  if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();

    //Login success and redirected
    if (password_verify($password, $user['password'])) {
      $_SESSION['username'] = $user['username'];
      $_SESSION['password'] = $user['password'];
      header("Location: Menu.php");
      exit();
    }
  }

  //Login failed
  $_SESSION['login_error'] = 'Incorrect username or password';
  $_SESSION['active_form'] = 'login';
  header("Location: Login.php");
  exit();
}

