 <?php
include 'database.php';
	if(isset($_POST['id'])) {
		$id =trim($_POST['id']);
		$sql = "DELETE FROM start WHERE id = $id";
		if(mysqli_query($conn, $sql)){
			echo $id;
		}
	}
?>