<?php include 'database.php';
if(isset($_POST['btn_submit'])){
	$name = $_POST['txt_student_name'];
	$age = $_POST['txt_age'];
	$email = $_POST['txt_email'];
	if(!empty($name)){

		try{

			$stmt = $conn->prepare("INSERT INTO tb_students(student_name,age,email) VALUES(:name, :age, :email)");
				$stmt->execute(array(':name'=>$name, ':age'=>$age,':email'=>$email));
					header('Location:index.php');

		}catch(PDOException $ex){

			echo $ex->getMessage();
		}
	}else{

		echo "INPUT NAME";
	}


	
}




?>

<form action="" method="post">
	<h2> Add New Student</h2>

	<table>
		
		<tr>
			<th>Student Name</th>
			<td><input type="text" name="txt_student_name"></td>
		</tr>
		<tr>
		<th>Age</th>
		<td><input type="number" name="txt_age"></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><input type="text" name="txt_email"></td>
	</tr>

	<td> </td>
	<tr>
		<td><input type="submit" name="btn_submit"></td>
	</tr>
	</table>

</form>