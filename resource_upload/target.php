<?php

$targetDir = "uploaded_content/";

function fileIdentifier($fName) {
    $tmp = uniqid() . "_" . $fName;
    return $tmp;
}

function recordUploads($fileID) {
    echo "Stored $fileID";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tmpName = basename($_FILES["uploaded_file"]["name"]);
    $targetFileName = $targetDir . fileIdentifier($tmpName);
    if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"],
        $targetFileName)) {
    } else {
        echo "Sorry failed to store $tmpName to $targetFileName";
    }

    echo "<p>File uploaded.  Thank you!</p>";
}

?>