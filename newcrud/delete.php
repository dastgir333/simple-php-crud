<?php include 'database.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];
	

		try{

			$stmt = $conn->prepare("DELETE FROM  tb_students WHERE student_id=?");
			$stmt->execute(array($id));
			header('location:index.php');
		}catch(PDOException $ex){
			echo $ex->getMessage();
		}
}


?>
				
