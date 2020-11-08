
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Apply page</title>
</head>
<body>
    
     <center>
      <form action="13.php" method="post" enctype="multipart/form-data">
    
    <input type="text" name="name" placeholder="Name of the StartUp" ><br><br>
    
    <input type="text" name="founder" placeholder="Founder" ><br><br>
    <select name="category" id="category">
                <option value="Service">Service</option>
                <option value="Sport">Sport</option>
                <option value="Medicine">Medicine</option>
                <option value="Education">Education</option>
                <option value="Industry">Industry</option>
                <option value="Game">Game</option>
            </select>
            <select name="type" id="type">
                <option value="Platform">Platform</option>
                <option value="App">Mobile app</option>
                <option value="Web Service">Web Service</option>
                <option value="Social Networl">Social Network</option>
            </select>
            <br><br>
           
            <input type="text" name="aim" placeholder="Aim" ><br><br>
            <input type="text" name="target" placeholder="Target" ><br><br>
            <input type="text" name="website" placeholder="Website" ><br><br>
            <input type="text" name="city" placeholder="City" ><br><br>
            <input type="text" name="number"placeholder="Phone" ><br><br>
            <input type="text" name="email"placeholder="Email" ><br><br>
           
            <input type="file" name="image_to_upload"><br><br>
    <input class="sign-up-submit" name="submit" value="REQUEST" type="submit" > 
  </form>
  <?php require_once('dbase.php') ?>
  </center>

</body>
</html>
