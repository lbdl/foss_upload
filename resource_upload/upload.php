<?php
$id = $_GET['id'];
?>
    <!DOCTYPE html>
    <html>
<head>
    <title>Your Home Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
    </html>



    <form enctype="multipart/form-data" id="upload_form"
          action="target.php" method="POST">

        <input type="hidden" name="APC_UPLOAD_PROGRESS"
               id="progress_key"  value="<?php echo $id?>"/>

        <input type="file" id="test_file" name="test_file"/><br/>

        <input onclick="window.parent.startProgress(); return true;"
               type="submit" value="Upload!"/>

    </form>

