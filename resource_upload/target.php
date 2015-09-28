<?php

$targetDir = "uploaded_content/";

function fileIdentifier($fName) {
    $tmpStr = uniqid($fName);
}

function recordUploads($fileID) {
    echo "Stored $fileID";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tmpName = basename($_FILES["test_file"]["name"]);
    $targetFileName = $targetDir . $tmpName;
    if (move_uploaded_file($_FILES["test_file"][fileIdentifier($tmpName)],
        $targetFileName)) {
    } else {
        echo "Sorry failed to store $tmpName to $targetFileName";
    }

    echo "<p>File uploaded.  Thank you!</p>";
}

?>