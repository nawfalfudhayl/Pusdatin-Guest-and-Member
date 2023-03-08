<?php
require 'lib/connect.php';

// username and password sent from form 
$username = 'member';
$userr = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// To protect MySQL injection
$userr = stripslashes($userr);
$email = stripslashes($email);
$password = stripslashes($password);
$userr = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$sql = "SELECT * FROM $username WHERE Username='$userr' and EmailMember='$email' and PasswordMember='$password'";
$result = mysqli_query($db, $sql);

// Mysql_num_row is counting table row
$count = mysqli_num_rows($result);

// If result matched $email and $password, table row must be 1 row
if ($count == 1) {
    // Register $email, $password and redirect to file "index-admin.php"
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['username'] = $userr;
    header("location:specialMember.php");
} else {
    header("location:login.php?msg=failed");
}