<?php
 session_start();
require_once('pdo.php');
 $message="";
 
 try {
     $connect = $pdo;
     $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
     if(isset($_POST["in"]))
     {
         if(empty($_POST["login"]) && empty($_POST["password"]))
         {
             $message = 'You have to add your password and name';
         } else 
         {
             $query="SELECT * FROM user
             WHERE login = :login AND password = :password";
             $stmt=$connect->prepare($query);
             $stmt->execute(
                 array(
                     'login' => $_POST["login"],
                     'password' => $_POST["password"]
                 )
            );
            $count=$stmt->rowCount();
            if($count>0)
            {
                $_SESSION['login'] = $_POST["login"];
                header("Location:inv.php");
                exit();
            }
            else
            {
                header("Location:app.php");
                $message = 'INCORRECT DATA';
                die();
            }
            
         }
     }
 } catch (PDOException $error) {
     $message = $error->getMessage();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Authorization</title>
</head>
<body>
<center><h1>Welcome, Our Dear "Angel"</h1></center>
    
    
<form method="POST">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="login">
    <small id="emailHelp" class="form-text text-muted">Please don't forget to add all necessary data.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <input type="submit" name="in" value="Send">
  </div>
  
  
</form>
</body>
</html>
