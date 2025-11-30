<?php

session_start();
require_once 'Database.php'; /* Database reading */

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
  //catch any errors
}


// ------------Register------------
if (isset($_POST['register'])) {
  $name = $_POST['regname'];
  $username = $_POST['regusername'];
  $password = password_hash($_POST['regpassword'], PASSWORD_DEFAULT);
  $email = $_POST['regemail'];

  //username check
  $checkUsername = $conn->query("SELECT username FROM user WHERE username = '$username'");
  if ($checkUsername->num_rows > 0) {
    $_SESSION['register_error'] = 'Username is already registered';
    $_SESSION['active_form'] = 'register';
    header("Location: Login.php");
    exit();
  }

  //email check
  $checkEmail = $conn->query("SELECT email FROM user WHERE email = '$email'");
  if ($checkEmail->num_rows > 0) {
    $_SESSION['register_error'] = 'Email is already registered';
    $_SESSION['active_form'] = 'register';
    header("Location: Login.php");
    exit();
  }

  $insert = $conn->query("INSERT INTO user (name, username, password, email) VALUES ('$name', '$username', '$password', '$email')");

  if ($insert) {
    $_SESSION['register_success'] = 'Registration Successful';
    $_SESSION['active_form'] = 'login';
  } else {
    $_SESSION['register_error'] = 'Registration failed';
    $_SESSION['active_form'] = 'register';
  }

  header("Location: Login.php");
  exit();
}

// ----------Login---------------
if (isset($_POST['login'])) {
  $username = $_POST['logusername'];
  $password = $_POST['logpassword'];

  //temporary saving username
  $_SESSION['current_username'] = !empty($username) ? $username : '';

  //Validatations
  if (empty($username) && empty($password)) {
    $_SESSION['login_error'] = 'Please enter username and password';
    $_SESSION['active_form'] = 'login';
    header("Location: Login.php");
    exit();
  }

  if (empty($username)) {
    $_SESSION['login_error'] = 'Please enter username';
    $_SESSION['active_form'] = 'login';
    $_SESSION['current_username']= $username;  //save typed username
    header("Location: Login.php");
    exit();
  }

  if (empty($password)) {
    $_SESSION['login_error'] = 'Please enter password';
    $_SESSION['active_form'] = 'login';
    header("Location: Login.php");
    exit();
  }

  //Login success and redirected
  $result = $conn->query("SELECT * FROM user WHERE username = '$username'");

  if ($result && $result->num_rows > 0) {  // validating credentials
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
      $_SESSION['username'] = $user['username'];
      $_SESSION['password'] = $user['password'];
      unset($_SESSION['current_username']);  // remove temporary saved username
      header("Location: Menu.php");
      exit();
    }
  }

  //Login failed
  $_SESSION['login_error'] = 'Incorrect username or password';
  $_SESSION['active_form'] = 'login';
  $_SESSION['current_username'] = $username;
  header("Location: Login.php");
  exit();
}
