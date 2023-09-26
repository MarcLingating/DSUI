<?php
session_start();
include_once('connection.php');

if (isset($_POST['edit'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $form_id = $_POST['form_id']; // Form ID to identify the form you want to edit

        // Retrieve the existing form data
        $stmt_select = $db->prepare("SELECT * FROM forms WHERE form_id = :form_id");
        $stmt_select->execute(array(':form_id' => $form_id));
        $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Get the existing document name and the new document name
            $existingDocument = $row['document'];
            $newDocument = $_POST['document'];

            // Check if a new document is provided and it's different from the existing one
            if (!empty($newDocument) && $newDocument !== $existingDocument) {
                // Remove the old folder and its contents
                $existingFolder = 'forms/' . $existingDocument;
                if (is_dir($existingFolder)) {
                    array_map('unlink', glob("$existingFolder/*"));
                    rmdir($existingFolder);
                }

                // Create a new folder with the new document name
                $newFolder = 'forms/' . $newDocument;
                if (!file_exists($newFolder)) {
                    mkdir($newFolder, 0777, true);
                }
            } else {
                // If no new document is provided or it's the same, use the existing folder
                $newFolder = 'forms/' . $existingDocument;
            }

            // Check if a new file is uploaded
            if ($_FILES['documentFile']['size'] > 0) {
                // Remove the old file if it exists
                $oldFilePath = $newFolder . '/' . $row['documentFile'];
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }

                // Move the uploaded file to the folder
                $targetFilePath = $newFolder . '/' . basename($_FILES['documentFile']['name']);
                move_uploaded_file($_FILES['documentFile']['tmp_name'], $targetFilePath);
            } else {
                // If no new file is uploaded, keep the existing file path
                $targetFilePath = $row['documentFile'];
            }

            // Make use of prepared statement to update the form data
            $stmt = $db->prepare("UPDATE forms SET
                comment = :comment,
                document = :document,
                documentFile = :documentFile,
                textfield1 = :textfield1,
                textfield2 = :textfield2,
                textfield3 = :textfield3,
                textfield4 = :textfield4,
                textfield5 = :textfield5,
                textfield6 = :textfield6,
                textfield7 = :textfield7
                WHERE form_id = :form_id");

            // If-else statement for executing our prepared statement
            if ($stmt->execute(array(
                ':comment' => $_POST['comment'],
                ':document' => $newDocument, // Use the new document name
                ':documentFile' => $targetFilePath, // Use the uploaded file name or existing one
                ':textfield1' => $_POST['textfield1'],
                ':textfield2' => $_POST['textfield2'],
                ':textfield3' => $_POST['textfield3'],
                ':textfield4' => $_POST['textfield4'],
                ':textfield5' => $_POST['textfield5'],
                ':textfield6' => $_POST['textfield6'],
                ':textfield7' => $_POST['textfield7'],
                ':form_id' => $form_id
            ))) {
                $_SESSION['message'] = 'Form updated successfully';
            } else {
                $_SESSION['message'] = 'Something went wrong. Cannot update form';
            }
        } else {
            $_SESSION['message'] = 'Form not found';
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    // Close connection
    $database->close();
} else {
    // You should have an edit form in HTML here to input the new data.
    // This part should be replaced with your actual edit form HTML.
    echo 'Fill up the edit form first.';
}

header('location: ./index.php?page=form_list'); // Redirect back to the forms page after editing.
?>
