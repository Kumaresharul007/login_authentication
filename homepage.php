<!DOCTYPE html>
<head>
<title>HomePage</title>
</head>
<style>
.logout{
    text-decoration: none;
    cursor: pointer;
    padding: 7px;
    color: white;
    background-color: green;
    border: none;
    border-radius: 5px;
    box-shadow: 1px 1px 4px black;
    text-align: center;
    margin-left: 50%;
}
.logout:hover{
    background-color: purple;
    transition: 0.3s;
    transform: perspective(400px) translateZ(10px);
}
.login{
    text-decoration: none;
    cursor: pointer;
    padding: 7px;
    color: white;
    background-color: green;
    border: none;
    border-radius: 5px;
    box-shadow: 1px 1px 4px black;
    text-align: center;
    margin-left: 50%;
}
.login:hover{
    background-color: purple;
    transition: 0.3s;
    transform: perspective(400px) translateZ(10px);
}
</style>
<?php
session_start();
if(isset($_POST['logout'])){
    session_destroy();
    unset($_SESSION['success']);
    header('location: login.php');
}
if(isset($_POST['login'])){
    header('location: login.php');
}
?>
<html>
<?php if(!isset($_SESSION['success'])) : ?>
<h2 align="center" style="color: green;">You must login first!</h2>
<form action="homepage.php" method="post">
<input type = "submit" value = "Login" class="login" name = "login">
</form>
<?php endif ?>
<?php if(isset($_SESSION['success'])) : ?>
<h2 align="center" style="color: green;"><?php echo $_SESSION['success']; ?></h2><br>
<h1 align="center">Welcome to my website homepage:)</h1>
<form action = "homepage.php" method="post">
<input type = "submit" value = "Logout" class="logout" name = "logout">
<?php endif ?>
</body>
</html>
