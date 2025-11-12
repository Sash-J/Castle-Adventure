<?php

session_start();
require_once 'Database.php';

if (isset($_POST['register'])){
  $name = $_POST['regname'];
  $username = $_POST['regusername'];
  $password = password_hash($_POST['regpassword'], PASSWORD_DEFAULT);
  $email = $_POST['regemail'];

  $checkUsername = $conn->query("SELECT username FROM users WHERE regusername = '$username'");
  if ($checkUsername->num_rows > 0) {
    $_SESSION['register_error'] = 'Email is already registered';
    $_SESSION['active_form'] = 'register';
  } else {
    $conn->query("INSERT INTO users (regname, regusername, regpassword, regemail) VALUES ('$name', '$username', '$password', '$email')");
  }

  header("Location: Login.php");
  exit();
}

if (isset($_POST['login'])){
  $username = $_POST['logusername'];
  $password = $_POST['logpassword'];

  $result = $conn->query ("SELECT * FROM users WHERE logusername = '$username'");
  if ($result->num_rows > 0){
    $name = $result->fetch_assoc();
    if (password_verify($password,$username['logpassword'])){
      $_SESSION['name'] = $username['logusername'];
      $_SESSION['password'] = $password['logpassword'];
    }
  }
  $_SESSION['login_error'] = 'Incorrect username or password';
  $_SESSION['actice form'] = 'form-login';
  header("Location: Login.php");
  exit();
}
?>