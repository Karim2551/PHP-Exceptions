<?php
session_start();

require_once 'chek.php';
require_once('pdo.php');

echo '<br>';


echo '<br>';
  $title = "";
  $ceo = "";
  $cat = "";
  $type = "";
  $aim = "";
  $phone = "";
  $email = -1;
  if
  (
      isset($_POST["title"]) && isset($_POST["ceo"])
     && isset($_POST["cat"])  && isset($_POST["type"])
  )
  {
    $title = $_POST["title"];
    $ceo = $_POST["ceo"];
    $cat = $_POST["cat"];
    $type = $_POST["type"]; 
    $aim = $_POST["aim"];
    $city = $_POST["city"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $mime = $check["mime"];
  }
  
  

// PHP Program to illustrate normal try catch block code
class myException extends Exception {
 public function myMessage() {
    
      $m = 'Error on line <b style="color:red">'.$this->getLine().'</b> in '.$this->getFile()
      .': <b >'.$this->getMessage().'</b> <b style="color:red">is not a valid E-Mail address</b>';
      return $m;
    }
}

  $email = $_POST['email'];
  //TRY CATCH FINALLY
  try {
    
    if(strlen($email) < 8) {
          throw new myException($email);
    }
  }
  
  catch (myException $e) {
    
    echo $e->myMessage();
  } finally
  {
    echo '<a href="in.php">If you are an "angel" Please open investor site</a>';
  }






  
//Inserting of Image

  $insert_sql = "INSERT INTO start
  (title, ceo, cat, type, aim,city,phone,email, mime, logo) VALUES (:title, :ceo,:cat, :type,:aim,:city,:phone, :email,:mime, :logo)";
    
  $img = fopen($target_file, 'rb');

  $stmt = $pdo->prepare($insert_sql);
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':ceo', $ceo);
  $stmt->bindParam(':cat', $cat);
  $stmt->bindParam(':type', $type);
  $stmt->bindParam(':aim', $aim);
  $stmt->bindParam(':city', $city);
  $stmt->bindParam(':phone', $phone);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':mime', $mime);
  $stmt->bindParam(':logo', $img, PDO::PARAM_LOB);
  $stmt->execute();

   
  
 

?>


<?php 
 function myerror($error_no, $error_msg)
  {
      echo "Error: [$error_no] $error_msg "; echo "<br>";
      echo "Now Script will end"; echo "<br>";
      
      die();
  }
  set_error_handler("myerror");

 ?>