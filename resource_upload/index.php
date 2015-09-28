<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
    header("location: upload.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form in PHP with Session</title>
    <link href="../css/form.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
    <h1>Add History To FoSS!</h1>
    <div id="login">
        <h2>Login</h2>
        <form action="" method="post">
            <label>UserName :</label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login ">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</div>
</body>
</html>