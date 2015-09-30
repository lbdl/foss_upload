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

    }


    (function () {
        var httpRequest;
        document.getElementById("ajaxButton").onclick = function () {
            makeRequest("getProgress.php?progress_key=<?php echo($id)?>");
        };

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
            httpRequest.onreadystatechange = alertContents;
            httpRequest.open('GET', url, true);
            httpRequest.send();
        }

        function alertContents() {
            if (httpRequest.readyState === 4) {
                if (httpRequest.status === 200) {
                    alert(httpRequest.responseText);
                } else {
                    alert('There was a problem with the request.');
                }
            }
        }
    })();


    //    function getProgress() {
    //        GDownloadUrl("getProgress.php?progress_key=<?php //echo($id)?>//",
    //            function (percent, responseCode) {
    //                document.getElementById("progressinner").style.width = percent + "%";
    //                if (percent < 100) {
    //                    setTimeout("getProgress()", 100);
    //                }
    //            });
    //    }

    var counter = 0;

    function startProgress() {
        document.getElementById("progressouter").style.display = "block";
        setTimeout("monitorUploadProgress()", 1000);
        fire();
    }

    function fire() {
        if (counter < 101) {
            document.getElementById("progressinner").style.width =
                counter + "%";
            counter++;
            setTimeout("fire()", 100);
        }
    }

</script>

<iframe id="login" name="theframe" src="upload.php?id=<?php echo($id) ?>">
</iframe>


<div id="progressouter" style="width: 500px; height: 20px; border: 6px solid red; display:none;">
    <div id="progressinner" style=
    "position: relative; height: 20px; background-color: purple; width: 0%; ">
    </div>
</div>

<!--<span onclick="startProgress()">Start me up!</span>-->

</body>
</html>