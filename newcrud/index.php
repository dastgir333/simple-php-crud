
<?php include 'database.php';?>




<!DOCTYPE html>
<html>
<head>
	<title>PHP PDO CRUD</title>
</head>
<body>
<h2>Student list</h2>
<a href="add.php">Add New</a><br><br>
<table border ="1px" cellpadding="5px" cellspacing="0">
	<tr>
		<th>ID</th>
		<th>Student Name</th>
		<th>Age</th>
		<th>Email</th>
		<th>Action</th>
	</tr>

	<?php

     $stmt = $conn->prepare("SELECT * FROM tb_students ORDER BY student_id ASC");
     $stmt->execute();
     $results = $stmt->fetchAll();

     foreach ($results as $row) {
     	# code...
     

	?>
	<tr>
		<th><?=$row['student_id'];?></th>
		<th><?=$row['student_name'];?></th>
		<th><?=$row['age'];?></th>
		<th><?=$row['email'];?></th>
		<th>
			<a href="edit.php?id=<?=$row['student_id'];?>"> Edit</a>
			<a href="delete.php?id=<?=$row['student_id'];?>">Delete </a>

		</th>
	</tr>

	<?php

}

?>

</table>
</body>
</html>