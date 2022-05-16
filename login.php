<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
    fieldset{
        box-shadow: 3px 3px 15px black;
        border: none;
   }
   @media only screen and (min-width: 600px){
       fieldset{
        margin-left: 33%;
        margin-right: 32%;
       }
   }
   legend{
       margin-left: 45%;
       background-color: green;
       padding-right: 18px;
       padding-left: 18px;
       padding-top: 21px;
       padding-bottom: 21px;
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
    background: rgba(100,100,100,0.1);
    transition: 0.3s;
}
.submit{
    cursor: pointer;
    padding: 7px;
    color: white;
    background-color: darkgreen;
    border: none;
    border-radius: 5px;
    box-shadow: 1px 1px 4px black;
}
.submit:hover{
    background-color: purple;
    transition: 0.3s;
    transform: perspective(400px) translateZ(10px);
}
.register a:hover{
    color: darkgreen;
}
.register a{
    color: darkblue;
}
    </style>
</head>
<?php
session_start();
$connection = mysqli_connect("sql112.epizy.com", "epiz_30681127", "4smbzrvf", "epiz_30681127_loginauthentication");
if(mysqli_connect_errno()) {  
    die("Failed to connect! ". mysqli_connect_error());  
} 
if(isset($_POST['submit2'])){
    $Email2 = $_POST['email2'];
    $Password2 = $_POST['password2'];
    $Password2 = md5($Password2);
    $sql = "SELECT * FROM logintable WHERE email = '$Email2' AND pass2 = '$Password2'";
    $store = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($store);
    if($count == 1){
        $_SESSION['success'] = "Logged in successfully!";
        header("location: homepage.php");
    }
    else{
        $logerror = "Invalid email or password!";
    }
}
?>
<body>
<h2 align="center" style="color: red;"><?php echo $logerror; ?></h2>
<h1 align="center" style="text-decoration: underline;color: darkgreen;"><em>LOGIN YOUR ACCOUNT</em></h1><br><br><br>
<fieldset>
    <legend>
    <i class="fas fa-user-lock fa-3x"></i>
    </legend>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST">
        <div id="exceptinput">
        <b style="color: purple;">EMAIL ID: </b><br><input type="email" name="email2" placeholder="Enter your email id" required><br><br><br>
        <b style="color: purple;">PASSWORD: </b><br><input type="password" name="password2" placeholder="Enter your password" required><br><br><br>
       </div>
        <input type="Submit" class="submit" name="submit2">
    </form>
</fieldset><br><br><br>
<div align="center" class="register">
    <em style="color: purple;">Don't have an account? </em><a href="registration.php"><b>REGISTER NOW</b></a>
</div>
</body>
</html>
