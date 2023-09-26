<?php
session_start();
include_once('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $database = new Connection();
    $db = $database->open();

    try {
        // Get the 'document' value from the database
        $stmt = $db->prepare("SELECT * FROM document_form WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['schoolName'])) {
            // Extract the 'document' value
            $schoolyear = $result['schoolyear'];
            $title = $result['title'];
            $schoolName = $result['schoolName'];
            
            // Construct the folder path
            $folderPath = "uploads/{$schoolyear}/{$title}/{$schoolName}";
            

            // Delete the folder and its contents
            if (file_exists($folderPath)) {
                // Remove all files in the folder
                $files = glob($folderPath . '/*');
                foreach ($files as $file) {
                    if (is_file($file)) {
                        if (!unlink($file)) {
                            $_SESSION['message'] = 'Failed to delete a file in the folder';
                            break; // Exit the loop if a file deletion fails
                        }
                    }
                }

                // Remove the folder itself
                if (is_dir($folderPath)) {
                    if (rmdir($folderPath)) {
                        $_SESSION['message'] = 'Form folder deleted successfully';
                    } else {
                        $_SESSION['message'] = 'Failed to delete the folder';
                    }
                }
            } else {
                $_SESSION['message'] = 'Folder does not exist';
            }

            // Delete the record from the database
            $stmt = $db->prepare("DELETE FROM document_form WHERE id = :id");
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                $_SESSION['message'] = 'Form data deleted from the database';
            } else {
                $_SESSION['message'] = 'Failed to delete form data from the database';
            }
        } else {
            $_SESSION['message'] = 'Form not found in the database or missing document data';
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = 'Error: ' . $e->getMessage();
    }

    // Close connection
    $database->close();
} else {
    $_SESSION['message'] = 'Invalid request to delete form and folder';
}

// Redirect to the appropriate page
header('location: ./index.php?page=data_retrieve');
?>
