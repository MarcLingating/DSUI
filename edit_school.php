<?php
    session_start();
    include_once('connection.php');

    if(isset($_POST['editschool'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $id = $_GET['id'];
            $schoolId = $_POST['schoolId']; // Change to the appropriate field name
            $schoolName = $_POST['schoolName']; // Change to the appropriate field name
            $district = $_POST['district']; // Change to the appropriate field name
            $status = $_POST['status']; // Change to the appropriate field name

            $sql = "UPDATE `school` SET 
                `schoolId` = '$schoolId',
                `schoolName` = '$schoolName',
                `district` = '$district',
                `status` = '$status'
                WHERE `id` = '$id'";

            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'School updated successfully' : 'Something went wrong. Cannot update school';

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

    header('location: ./index.php?page=school_list'); // Change the page name
?>
