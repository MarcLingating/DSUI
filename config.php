<?php
session_start();
include_once('connection.php');

if (isset($_POST['add_form'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        // Retrieve the 'schoolyear' and 'title' values from the form
        $schoolyear = $_POST['schoolyear'];
        $title = $_POST['title'];
        $schoolName = $_POST['schoolName'];

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
        move_uploaded_file($_FILES['documentFile']['tmp_name'], $documentFilePath);

        // Prepare the SQL statement with placeholders
        $stmt = $db->prepare("INSERT INTO document_form (title, schoolName, status, schoolyear, schoolId, document, documentFile) VALUES (:title, :schoolName, :status, :schoolyear, :schoolId, :document, :documentFile)");

        // Create an array to hold the values
        $fieldValues = array(
            ':title' => $_POST['title'],
            ':schoolName' => $_POST['schoolName'],
            ':status' => $_POST['status'],
            ':schoolyear' => $_POST['schoolyear'],
            ':schoolId' => $_POST['schoolId'],
            ':document' => $_POST['document'],
            ':documentFile' => $documentFilePath // Save the file path in the database
        );

        if ($stmt->execute($fieldValues)) {
            $_SESSION['message'] = 'Form added successfully';
        } else {
            $_SESSION['message'] = 'Something went wrong. Cannot add form';
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    // Close connection
    $database->close();
} else {
    $_SESSION['message'] = 'Fill up the form first';
}

header('location: ./index.php?page=data_retrieve');
?>
