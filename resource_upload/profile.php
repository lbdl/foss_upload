<?php
session_start();
?>
    <!DOCTYPE html>
    <html>
<head>
    <title>Your Home Page</title>
    <link href="../css/form.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $_SESSION['login_user']; session_destroy();?></i></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
    </html>
