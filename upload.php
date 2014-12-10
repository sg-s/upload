<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// Check if file already exists
if (file_exists($target_file)) {
    // echo "Sorry, file already exists.";
    // $uploadOk = 0; // why tell the user anything? this can be a security risk as it allows attackers to know what files we have
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "<div id=\"notok\">Sorry, your file is too large.</div>";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<div id=\"notok\">Sorry, your file was not uploaded.</div>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<div id=\"ok\">The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</div>";
    } else {
        echo "<div id=\"notok\">Sorry, there was an error uploading your file.</div>";
    }
}
?> 
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css">
  
  <!--favicons-->
  <link href="assets/favicon.ico" rel="shortcut icon" type="image/ico">
</head>
<body>
    <div class="container">
        <!-- Centered inside whatever sized container  -->
        <div class="outer">
            <div class="inner">
                <div class="centered">
                    <div id="root">srinivas.gs/upload</div>

                    <div id = "maintext">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            Select file to upload:
                            <br>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <br>
                            <input type="submit" value="Upload File" name="submit">

                        </form>

                    </div>
                    <div id = "ok"></div>

                </div>
            </div>
        </div>
    </div>

</body>
</html> 