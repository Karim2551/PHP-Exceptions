<?php
	include 'database.php';
	$sql = "SELECT * FROM start";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr id="<?php echo $row["id"]; ?>">
			<td><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $row["id"]; ?>"></td>
			<td><?=$row['title'];?></td>
			<td><?=$row['email'];?></td>
			<td><?=$row['phone'];?></td>
			<td><?=$row['city'];?></td>
			<td><button type="button" class="btn btn-success btn-sm delete" data-id="<?=$row['id'];?>">Delete</button></td>
		</tr>
<?php	
		}
		}
	else {
		echo "<tr >
		<td colspan='5'>No Result found !</td>
		</tr>";
	}
	mysqli_close($conn);
?>