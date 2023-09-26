<?php
    session_start();
    include_once('connection.php');

    if(isset($_POST['editschool'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $id = $_GET['id'];
            $title = $_POST['title']; // Change to the appropriate field name
            $dateupload = $_POST['dateupload']; // Change to the appropriate field name
            $dateend = $_POST['dateend']; // Change to the appropriate field name
            $schoolyear = $_POST['schoolyear']; // Change to the appropriate field name
            $document = $_POST['document']; // Change to the appropriate field name
            $status = $_POST['status']; // Change to the appropriate field name

            $sql = "UPDATE `upload_document` SET 
                `title` = '$title',
                `dateupload` = '$dateupload',
                `dateend` = '$dateend',
                `schoolyear` = '$schoolyear',
                `document` = '$document',
                `status` = '$status'
                WHERE `id` = '$id'";

            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Document updated successfully' : 'Something went wrong. Cannot update document';

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

    header('location: ./index.php?page=receive_document'); // Change the page name
?>
