<?php session_start(); ?>
<?php
// Setting a cookie
setcookie("username", "Karim", time()+30*24*60*60);
?>
<?php require_once 'pdo.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TumarShop(Admin)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<header>
	<nav style="background-color: yellowgreen" class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="#">Главная</a>
        
        
        <a class="py-2 d-none d-md-inline-block" href="out.php">Выход</a>
    <?php 
    //SESSION
    if(isset($_SESSION["login"])) {
        echo '<a class="btn btn" href="" style="background-color:yellowgreen;color:blue" >'.$_SESSION["login"].'</a>';}
    else{header("Location:app.php");}
    ?>
    </div>
    </nav>
		</header>


    <center><?php
// Accessing an individual cookie value

// Verifying whether a cookie is set or not
if(isset($_COOKIE["username"]))
{
  echo "<h1>Hi " . $_COOKIE["username"]." </h1>";
}
else
{
  echo "Welcome!";
}
?></center>

<center>    <?php
     //PDO USING 
     //SHOW GOODS FROM DB
 $pdo = new PDO('mysql:host=localhost;post=3306;dbname=as9','Karim2551','@Kar320id');
  $stmt = $pdo->query("SELECT * FROM start ");
?>
<div class="pow" style="width: 45%" >
  <table  class="table table-hover" ><tr style="background-color: blue;color: red"><th>Name</th><th>Photo</th><th>Price</th><th>Description</th></tr>
  <?php
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr><td>";
    echo($row['title']);
    echo "</td>";

   
    echo "<td>";
    echo '<img src="data:'.$row['mime'].';base64,'.base64_encode($row['logo']).'" alt="image not found" width="65"/>';
    echo "</td>";
    
    echo "<td>";
echo($row['aim']);
    echo "</td>";
    

     echo "<td>";
echo($row['cat']);
    echo "</td>";

    echo "</tr>";
  }
  ?>
  </table>
</div></center>
       



<center>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>View data</h2>
  <table class="table table-bordered table-sm" >
    <thead>
      <tr>
    <th><input type="checkbox" id="select_all"> Select </th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    <th>City</th>
    <th>Action</th>
      </tr>
    </thead>
    <tbody id="table">
      
    </tbody>
  </table>
  <div class="row">
    <div class="col-md-2 well">
    <span class="rows_selected" id="select_count">0 Selected</span>
    <a type="button" id="delete_records" class="btn btn-primary pull-right">Delete</a>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  $.ajax({
    url: "view_ajax.php",
    type: "POST",
    cache: false,
    success: function(dataResult){
      $('#table').html(dataResult); 
    }
  });
  /* delete selected records*/
  $('#delete_records').on('click', function(e) {
    var employee = [];
    $(".emp_checkbox:checked").each(function() {
      employee.push($(this).data('emp-id'));
    });
    if(employee.length <=0) {
      alert("Please select records."); 
    } 
    else { 
      WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";
      var checked = confirm(WRN_PROFILE_DELETE);
      if(checked == true) {
        var selected_values = employee.join(",");
        $.ajax({
          type: "POST",
          url: "delete_ajax.php",
          cache:false,
          data: 'id='+selected_values,
          success: function(response) {
            /* remove deleted employee rows*/
            var ids = response.split(",");
            for (var i=0; i < ids.length; i++ ) { 
              $("#"+ids[i]).remove(); 
            } 
          } 
        });
      } 
    } 
  });
}); 
$(document).on('click', '#select_all', function() {
  $(".emp_checkbox").prop("checked", this.checked);
  $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");
});
$(document).on('click', '.emp_checkbox', function() {
  if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) {
  $('#select_all').prop('checked', true);
  } else {
  $('#select_all').prop('checked', false);
  }
  $("#select_count").html($("input.emp_checkbox:checked").length+" Selected");

});
</script>
</body>
</html>

</center>