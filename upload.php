<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

if(isset($_POST["submit"])) {

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "The file already exists.<br>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "The file size is greater than 5,000,000 bytes.<br>";
        $uploadOk = 0;
    }

    // Determine the extension of the file
    $fileName = $_FILES["fileToUpload"]["name"];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Allow certain file formats
    if($fileExtension != "jpg"  && $fileExtension != "png"  && $fileExtension != "jpeg"
    && $fileExtension != "gif"  && $fileExtension != "pdf"  && $fileExtension != "ppt"
    && $fileExtension != "pptx" && $fileExtension != "doc"  && $fileExtension != "docx"
    && $fileExtension != "xls"  && $fileExtension != "xlsx") {
        echo "Only JPG, JPEG, PNG,  GIF, PPT, PPTX, DOC, DOCX, XLS, XLSX files are allowed.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "The file will not be uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded at " . date('Y-m-d H:i:s')."<br>";
        } else {
            echo "There was an error uploading the file ". basename( $_FILES["fileToUpload"]["name"]). "<br>";
        }
    }
    echo "<p>Click <a href='/upload.html'>here</a> to upload another file";
}
?>

