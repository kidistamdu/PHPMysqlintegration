<?php

session_start();

//initialising variables

$username = "";
$email = "";
$errors = array();

//connect to db

$db = mysql_connect('localhost','root','','practice') or die ("could not connect to database");

//register user 

$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


//form validation

if(empty($username)) {array_push($errors,"username is required")};
if(empty($email)) {array_push($errors,"email is required")};
if(empty($password_1)) {array_push($errors,"password_1 is required")};
if($password_1 != $password_2){array_push($errors, "passwords do not match")};

// check db for existing user with same usernamae 

$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";
$results = mysql_query($db, $user_check_query);
$user = mysql_fetch_assoc($result);

if($user) {

    if($user['username']===$username){array_push($errors,"username already exists");}
    if($user['email']===$username){array_push($errors,"this email already has registered");}
}
// regiter the user if no error

if(count($errors)==0){
   $password = md5($password_1); //this will encrypt the password
   $query = "INSERT INTO user  (username email, password ) VALUES ('$username', '$email', '$password')";

   mysqli_query($db,$query);
   $_SESSION['username'] = $username;
   $_SESSION['success'] = "$you are now logged in";


}