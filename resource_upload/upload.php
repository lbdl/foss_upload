<?php
$id = $_GET['id'];
//session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link href="../css/form.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--<div id="uploadDiv">-->
<form enctype="multipart/form-data" id="upload_form" action="target.php" method="POST">
    <input type="hidden" name="APC_UPLOAD_PROGRESS"
           id="progress_key" value="<?php echo $id ?>"/>
    <input type="file" id="uploaded_file" name="uploaded_file"/><br/>
    <br>
    <input onclick="window.parent.startProgress(); return true;"
           type="submit" value="Upload!"/>
</form>
<!--</div>-->
</body>
</html>

