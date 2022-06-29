<?php

function upload_img(){
  $err = 0;
  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
    return $err;
    exit();
  }

  // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    return $err;
    exit();
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    return $err;
    exit();
  return 0;
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    return $target_file;
    exit();
  } else {
    return $err;
    exit();
  }
}

}






?>