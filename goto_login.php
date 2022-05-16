<!DOCTYPE html>
<head>
<title>Account created successfully!</title>
</head>
<style>
.backlog{
    cursor: pointer;
    padding: 7px;
    color: white;
    background-color: darkgreen;
    border: none;
    border-radius: 5px;
    box-shadow: 1px 1px 4px black;
    margin-left: 50%;
}
.backlog:hover{
    background-color: purple;
    transition: 0.3s;
    transform: perspective(400px) translateZ(10px);
}
</style>
<?php

session_start();
if(isset($_POST['Gotologin'])){
    session_destroy();
    unset($_SESSION['done']);
    header('location: login.php');
}
?>
<body>
<html>
<?php if(isset($_SESSION['done'])): ?>
<h2 align="center" style="color: green;"><?php echo $_SESSION['done']; ?></h2>
<form action="gotologin.php" method="post">
<input type = "submit" value = "Back to login" name = "Gotologin" class = "backlog"> 
</form>
<?php endif ?>
</html>
</body>
