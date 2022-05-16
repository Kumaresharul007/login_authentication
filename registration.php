<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<style>
.submit{
    cursor: pointer;
    padding: 7px;
    color: white;
    background-color: green;
    border: none;
    border-radius: 5px;
    box-shadow: 1px 1px 4px black;
}
.submit:hover{
    background-color: purple;
    transition: 0.3s;
    transform: perspective(400px) translateZ(10px);
}
fieldset{
    box-shadow: 3px 3px 15px black;
    border: none;
}
@media screen and (min-width: 600px){
    fieldset{
    margin-left: 33%;
    margin-right: 32%;
    }
}
legend{
    margin-left: 45%;
    background-color: green;
    padding: 18px;
    color: white;
    border-radius: 50%;
}
#exceptinput input{
    width: 98%;
    height: 35px;
    border-radius: 5px;
    background: rgba(100,100,100,0.3);
    border: none;
}
#exceptinput input:hover{
    background-color: white;
    background: rgba(100,100,100,0.1);
    transition: 0.3s;
}
.login a:hover{
    color: darkgreen;
}
.login a{
    color: darkblue;
}
</style>
<body>
<?php
session_start();
$conn = mysqli_connect("sql112.epizy.com", "epiz_30681127", "4smbzrvf", "epiz_30681127_loginauthentication");
if(mysqli_connect_errno()) {  
    die("Failed to connect! ". mysqli_connect_error());  
}  
if(isset($_POST["name"])){
    $Name = $_POST["name"];
    $Number = $_POST["number"];
    $Email = $_POST["email"];
    $Pass1 = $_POST["pass1"];
    $Pass2 = $_POST["pass2"];
    $error = false;
       if(!preg_match("/^[a-zA-Z\s]+$/", $Name)){
           $nameerr = "This field should contain only a text!";
           $error = true;
       }
       if(!preg_match("/^[0-9]*$/", $Number)){
           $numerr = "Please enter a valid number!";
           $error = true;
       }
       if(strlen($Number) != 10){
           $numerr = "Please enter a valid number!";
           $error = true;
       }
       if(strlen($Pass1) < 8){
           $pass1err = "Your password should be minimum 8 characters!";
           $error = true;
       }
       if(ctype_upper("$Pass1") || ctype_lower("$Pass1")){
           $pass1err = "Your password should have a different characters!";
           $error = true;
       }
       if($Pass1 != $Pass2){
           $pass2err ="The password does not match!";
           $error = true;
       }
    if($error == false){
        $hashed_pass2 = md5($Pass2);
        $sql = "INSERT INTO logintable (name, number, email, pass2) VALUES ('$Name', '$Number', '$Email', '$hashed_pass2')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['done'] = "Your account has been created successfully!";
        header("location: gotologin.php");
    } else {
        $account_error = "This email have already been registered!";
    }

    mysqli_close($conn);
    }
}

?>
<h2 align="center" style="color: red;"><?php echo $account_error; ?></h2>
<h1 align="center" style="text-decoration: underline;color: darkgreen;"><em>REGISTER FOR FREE</em></h1>
<fieldset>
    <legend>
<i class="fas fa-user fa-3x"></i>
</legend>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div id="exceptinput">
    <b style="color: purple;">NAME: </b><em><span style="color: red;"><?php echo $nameerr; ?></span></em><br><input type="text" placeholder = "Enter your name" name="name" required>
    <br><br><br>
    <b style="color: purple;">EMAIL ID:</b> <br><input type="email" name="email" placeholder = "Enter your email id" required><br><br><br>
    <b style="color: purple;">CONTACT NUMBER: </b><em><span style="color: red;"><?php echo $numerr; ?></span></em><br><input type="text" name="number" placeholder = "Enter your number">
    <br><br><br>
    <b style="color: purple;">CREATE PASSWORD: </b><em><span style="color: red;"><?php echo $pass1err; ?></span></em><br><input type="password" name="pass1" placeholder = "password" required><br>
    <li><em>your password should have different characters.</em></li>
    <li><em>your password should have atleast 8 characters.</em></li>
    <br>
    <b style="color: purple;">CONFIRM PASSWORD: </b><em><span style="color: red;"><?php echo $pass2err; ?></span></em><br><input type="password" name="pass2" placeholder = "Retype password" required>
    <br><br></div>
    <input type="Submit" class="submit" name="create">
</form>
</fieldset>
<br>
<div align="center" class="login">
    <em style="color: purple;">Already have an account? </em><a href="login.php"><b>LOG IN</b></a>
</div>
</body>
</html>
