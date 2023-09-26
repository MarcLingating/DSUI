<?php
session_start();
include_once('connection.php');

if (isset($_POST['add'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        // Check if an image file was selected for upload
        if (!empty($_FILES['image']['tmp_name'])) {
            $targetDir = "assets/announcement_img/";
            $targetFile = $targetDir . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if the file is an image
            $check = getimagesize($_FILES['image']['tmp_name']);
            if ($check !== false) {
                // Allow only specific file formats (you can add more if needed)
                $allowedTypes = array("jpg", "jpeg", "png", "gif");
                if (in_array($imageFileType, $allowedTypes)) {
                    // Move the uploaded file to the specified directory
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                        // File uploaded successfully, insert the file path into the database
                        $filePath = $targetFile;

                        // Make use of prepared statement to prevent SQL injection
                        $stmt = $db->prepare("INSERT INTO announcement (dateupload, image, description, dateevent) VALUES (:dateupload, :image, :description, :dateevent)");
                        // If-else statement in executing our prepared statement
                        $_SESSION['message'] = ($stmt->execute(array(':dateupload' => $_POST['dateupload'], ':image' => $filePath, ':description' => $_POST['description'], ':dateevent' => $_POST['dateevent']))) ? 'Announcement added successfully' : 'Something went wrong. Cannot add member';

                        header('Location: ./index.php?page=announcement');
                        exit;
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                }
            } else {
                echo "File is not an image.";
            }
        } else {
            $_SESSION['message'] = 'No image file selected.';
            header('Location: ./index.php?page=announcement');
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
        header('Location: ./index.php?page=announcement');
        exit;
    }
} else {
    $_SESSION['message'] = 'Fill up add form first';
    header('Location: ./index.php?page=announcement');
    exit;
}
