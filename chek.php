<?php
  $target_dir = "img/";
  $target_file = $target_dir.basename($_FILES["image_to_upload"]["name"]);
  echo "File Path:".$target_file."<br>";
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  echo "File Extension:".$imageFileType."<br>";
  
  $check = getimagesize($_FILES["image_to_upload"]["tmp_name"]);
  // var_dump($check);
  echo "<br>";
  if($check !== false)
  {
    echo "File is an image - ".$check["mime"].".";
    $uploadOk = 1;
  }
  else
  {
    echo "File is not an image.<br>";
    $uploadOk = 0;
  }
  echo "<br>";
  if (file_exists($target_file))
  {
    echo "Sorry, file already exists.<br>";
    $uploadOk = 0;
  }

  if ($_FILES["image_to_upload"]["size"] > 500000)
  {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
    exit();
  }
  // Allow certain file formats
  if
  (
    $imageFileType != "jpg"  &&
    $imageFileType != "png"  &&
    $imageFileType != "jpeg" &&
    $imageFileType != "gif"
    //BMP, SVG, EPS
  )
  {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0)
  {
    echo "Sorry, your file was not uploaded.<br>";
  // if everything is ok, try to upload file
  }
  else
  {
    if (move_uploaded_file($_FILES["image_to_upload"]["tmp_name"], $target_file))
    {
      echo "The file ". basename( $_FILES["image_to_upload"]["name"]). " has been uploaded.<br>";
      die();
    }
    else
    {
      echo "Sorry, there was an error uploading your file.<br>";
    }
  }

 function myErrorHandler($errno, $errstr, $errfile, $errline) {
    echo "<b style=\"color:red\">Custom error:</b> [$errno] $errstr<br>";
    echo " Error on line $errline in $errfile<br>";
  }
  set_error_handler("myErrorHandler");

?>
