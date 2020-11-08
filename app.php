<?php session_start() ?>

<?php require_once 'pdo.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Apply page</title>
</head>
<body>
    <!-- (:title, :ceo,:cat, :type,:aim,:city,:phone, :email,:mime, :logo)"; -->
     <center>
      <form action="insert.php" method="post" enctype="multipart/form-data">
    
    <input type="text" name="title" placeholder="Name of the StartUp" ><br><br>
    
    <input type="text" name="ceo" placeholder="Ceo" ><br><br>
    <select name="cat" id="cat">
                
                <option value="Sport">Sport</option>
                <option value="Medicine">Medicine</option>
                <option value="Education">Education</option>
                <option value="Media">Media</option>
            </select>
            <select name="type" id="type">
            	<option value="service">Service</option>
                <option value="Platform">Platform</option>
                <option value="App">Mobile app</option>
                <option value="Web Site">Web Service</option>
            </select>
            <br><br>
           	<input type="text" name="aim" placeholder="Aim" ><br><br>
            <input type="text" name="city" placeholder="City" ><br><br>
            <input type="text" name="phone"placeholder="Phone" ><br><br>
            <input type="text" name="email"placeholder="Email" ><br><br>
           	<input type="file" name="image_to_upload"><br><br>
    <input class="sign-up-submit" name="submit" value="REQUEST" type="submit" > 
  </form>
    </center>

</body>
</html>
