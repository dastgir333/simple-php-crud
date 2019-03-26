<?php include 'database.php';
if(isset($_POST['btn_submit'])){
	$id = $_POST['txt_id'];
	$name = $_POST['txt_student_name'];
	$age = $_POST['txt_age'];
	$email = $_POST['txt_email'];
	if(!empty($name)){

		try{

			$stmt = $conn->prepare("UPDATE tb_students set student_name=:name,
				age=:age,
				email=:email
				WHERE student_id = :id");

				 
				$stmt->execute(array(':name'=>$name, ':age'=>$age,':email'=>$email,':id'=>$id));
				    if($stmt){

					header('Location:index.php');
				}

		}catch(PDOException $ex){

			echo $ex->getMessage();
		}
	}else{

		echo "INPUT NAME";
	}

}

$student_id = 0;
$name = '';
$age = 0;
$email = '';
if(isset($_GET['id'])){

	$id = $_GET['id'];
	$stmt = $conn->prepare('SELECT * FROM tb_students WHERE student_id = :id');
	$stmt->execute(array(':id'=>$id));
	$row = $stmt->fetch();
	$student_id = $row['student_id'];
	$name = $row['student_name'];
	$age = $row['age'];
	$email = $row['email'];
}

	





?>

<form action="" method="post">
	<h2> Edit Student</h2>

	<table cellpadding="5px">
		
		<tr>
			<th>Student Name</th>
			<td><input type="text" name="txt_student_name" value="<?=$name;?>"></td>
		</tr>
		<tr>
		<th>Age</th>
		<td><input type="number" name="txt_age" value="<?=$age;?>"></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><input type="text" name="txt_email" value="<?=$email;?>"></td>
	</tr>

	<td> </td>
	<tr>
		<td><input type="hidden" name="txt_id" value="<?=$student_id;?>"></td>
		<td><input type="submit" name="btn_submit"></td>
	</tr>
	</table>

</form>