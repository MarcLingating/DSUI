<?php
session_start();
include_once('connection.php');

if (isset($_POST['add'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        // Check if the title already exists
        $stmt = $db->prepare("SELECT COUNT(*) FROM upload_document WHERE title = :title");
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->execute();
        $titleCount = $stmt->fetchColumn();

        if ($titleCount > 0) {
            $_SESSION['message'] = 'Title already exists. Please choose a different title.';
            header('location: ./index.php?page=upload_documents');
            exit;
        } else {
            // Insert the data into the database
            $stmt = $db->prepare("INSERT INTO upload_document (title, schoolyear, document, status, dateend, dateupload) VALUES (:title, :schoolyear, :document, :status, :dateend, :dateupload)");

            if ($stmt->execute(array(
                ':title' => $_POST['title'],
                ':schoolyear' => $_POST['schoolyear'],
                ':document' => $_POST['document'],
                ':status' => $_POST['status'],
                ':dateend' => $_POST['dateend'],
                ':dateupload' => $_POST['dateupload'],
            ))) {
                $_SESSION['message'] = 'Form added successfully';
                header('location: ./index.php?page=upload_documents');
                exit;
            } else {
                $_SESSION['message'] = 'Something went wrong. Cannot add form';
                header('location: ./index.php?page=upload_documents');
                exit;
            }
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
        header('location: ./index.php?page=upload_documents');
        exit;
    }

    // Close connection
    $database->close();
} else {
    $_SESSION['message'] = 'Fill up the form first';
    header('location: ./index.php?page=upload_documents');
    exit;
}
?>
