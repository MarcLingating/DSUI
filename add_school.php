<?php
session_start();
include_once('connection.php');

if(isset($_POST['add'])){
    $database = new Connection();
    $db = $database->open();
    try{
        // Make use of prepared statement to prevent SQL injection
        $stmt = $db->prepare("INSERT INTO school (schoolId, schoolName, district, status) VALUES (:schoolId, :schoolName, :district, :status)");
        
        // If-else statement for executing our prepared statement
        if($stmt->execute(array(
            ':schoolId' => $_POST['schoolId'],
            ':schoolName' => $_POST['schoolName'],
            ':district' => $_POST['district'],
            ':status' => $_POST['status']
        ))) {
            $_SESSION['message'] = 'Form added successfully';
        } else {
            $_SESSION['message'] = 'Something went wrong. Cannot add form';
        }
    }
    catch(PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }

    // Close connection
    $database->close();
}
else{
    $_SESSION['message'] = 'Fill up the form first';
}

header('location: ./index.php?page=school');
?>
