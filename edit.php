<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$dateupload = $_POST['dateupload'];
			$image = $_POST['image'];
			$description = $_POST['description'];
			$dateevent = $_POST['dateevent'];

			$sql = "UPDATE announcement SET dateupload = '$dateupload', image = '$image', description = '$description', dateevent = '$dateevent'  WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Ancnouncement updated successfully' : 'Something went wrong. Cannot update member';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Fill up edit form first';
	}

	header('location: index.php');

?>