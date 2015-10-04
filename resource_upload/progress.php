<?php
$id = uniqid("");
?>
<html>
<head>
    <link href="../css/form.css" rel="stylesheet" type="text/css">
</head>
<body>

<script type="text/javascript">

    function monitorUploadProgress() {
        var httpRequest;
        makeRequest("getProgress.php?progress_key=<?php echo($id)?>");

        function makeRequest(url) {
            if (window.XMLHttpRequest) { // Mozilla, Safari, ...
                httpRequest = new XMLHttpRequest();
            } else if (window.ActiveXObject) { // IE
                try {
                    httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch (e) {
                    try {
                        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    catch (e) {
                    }
                }
            }

            if (!httpRequest) {
                alert('Giving up :( Cannot create an XMLHTTP instance');
                return false;
            }

            httpRequest.onreadystatechange = setBar;
            httpRequest.open('GET', url, true);
            httpRequest.send();
        }

        function setBar(percent, responseCode) {
            document.getElementById("progressinner").style.width = percent + "%";
            if (percent < 100) {
                setTimeout("monitorUploadProgress()", 100);
            }
        }
    }

    var counter = 0;

    function startProgress() {
        document.getElementById("progressouter").style.display = "block";
        setTimeout("monitorUploadProgress()", 1000);
    }

</script>

<iframe id="login" name="theframe" src="upload.php?id=<?php echo($id) ?>">
</iframe>
<div id="progressouter" style="width: 500px; height: 20px; border: 6px solid red; display:none;">
    <div id="progressinner" style=
    "position: relative; height: 20px; background-color: #DCE6F7; width: 0%; ">
    </div>
</div>
</body>
</html>