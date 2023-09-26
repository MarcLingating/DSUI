<?php
session_start();
include_once('connection.php');

if (isset($_POST['edit'])) {
    try {
        $database = new Connection();
        $db = $database->open();

        // Check if a new file has been uploaded
        if ($_FILES['documentFile']['size'] > 0) {
            // Retrieve form data
            $id = $_POST['id'];
            $title = $_POST['title'];
            $status = $_POST['status'];
            $schoolyear = $_POST['schoolyear'];
            $schoolId = $_POST['schoolId'];
            $schoolName = $_POST['schoolName'];
            $document = $_POST['document'];
            $textfield1 = $_POST['textfield1'];
            $textfield2 = $_POST['textfield2'];
            $textfield3 = $_POST['textfield3'];
            $textfield4 = $_POST['textfield4'];
            $textfield5 = $_POST['textfield5'];
            $textfield6 = $_POST['textfield6'];
            $textfield7 = $_POST['textfield7'];

            // Create a folder path based on 'schoolyear' and 'title'
            $folderPath = "uploads/$schoolyear/$title/$schoolName/";

            // Ensure the folder exists, or create it if it doesn't
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            // Generate a unique filename for the uploaded document
            $documentFileName = uniqid() . "_" . $_FILES['documentFile']['name'];

            // Move the uploaded document to the folder
            $documentFilePath = $folderPath . $documentFileName;
            if (move_uploaded_file($_FILES['documentFile']['tmp_name'], $documentFilePath)) {
                // Retrieve the old file path from the database using a prepared statement
                $stmt_select = $db->prepare("SELECT * FROM document_form WHERE id = :id");
                $stmt_select->execute(array(':id' => $id));
                $oldFilePath = $stmt_select->fetchColumn();

                // Check if the old file exists before deleting it
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }

                // Update the database with the new file path and other fields
                $stmt = $db->prepare("UPDATE document_form SET 
                    title = :title, 
                    status = :status, 
                    schoolyear = :schoolyear, 
                    schoolId = :schoolId, 
                    schoolName = :schoolName, 
                    document = :document, 
                    documentFile = :documentFile, 
                    textfield1 = :textfield1, 
                    textfield2 = :textfield2, 
                    textfield3 = :textfield3, 
                    textfield4 = :textfield4, 
                    textfield5 = :textfield5, 
                    textfield6 = :textfield6, 
                    textfield7 = :textfield7 
                    WHERE id = :id");

                $stmt->execute(array(
                    ':id' => $id,
                    ':title' => $title,
                    ':status' => $status,
                    ':schoolyear' => $schoolyear,
                    ':schoolId' => $schoolId,
                    ':schoolName' => $schoolName,
                    ':document' => $document,
                    ':documentFile' => $documentFilePath,
                    ':textfield1' => $textfield1,
                    ':textfield2' => $textfield2,
                    ':textfield3' => $textfield3,
                    ':textfield4' => $textfield4,
                    ':textfield5' => $textfield5,
                    ':textfield6' => $textfield6,
                    ':textfield7' => $textfield7
                ));

                $_SESSION['message'] = 'Record updated successfully';
            } else {
                $_SESSION['message'] = 'File upload failed.';
            }
        } else {
            $_SESSION['message'] = 'No new file uploaded.';
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = 'Error: ' . $e->getMessage();
    } finally {
        // Close connection
        if (isset($database)) {
            $database->close();
        }
    }
} else {
    $_SESSION['message'] = 'Fill up the form first';
}

header('location: ./index.php?page=data_retrieve');
?>
