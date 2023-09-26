<?php
session_start();
include_once('connection.php');

if(isset($_POST['addform'])){
    $database = new Connection();
    $db = $database->open();
    try{
        // Make use of prepared statement to prevent SQL injection
        $stmt = $db->prepare("INSERT INTO forms (id, form_id, document, comment, documentFile, textfield1, textfield2, textfield3, textfield4, textfield5, textfield6, textfield7) 
                             VALUES (:id, :form_id, :document, :comment, :documentFile, :textfield1, :textfield2, :textfield3, :textfield4, :textfield5, :textfield6, :textfield7)");
        
        // Get the document name from the form data
        $documentName = $_POST['document'];
        $uploadfile = $_POST['documentFile'];

        // Create a folder based on the document name
        $folderPath = 'forms/'.$documentName. '/';
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        // Move the uploaded file to the folder
        $targetFilePath = $folderPath . '/' . basename($_FILES['documentFile']['name']);
        move_uploaded_file($_FILES['documentFile']['tmp_name'], $targetFilePath);

        // If-else statement for executing our prepared statement
        if($stmt->execute(array(
            ':id' => null, // Auto-incremental primary key usually doesn't need to be inserted explicitly
            ':form_id' => $_POST['form_id'], // Change to your actual input field name
            ':document' => $documentName, // Use the document name
            ':textfield1' => $_POST['textfield1'], // Change to your actual input field name
            ':textfield2' => $_POST['textfield2'],
            ':textfield3' => $_POST['textfield3'], 
            ':textfield4' => $_POST['textfield4'], 
            ':textfield5' => $_POST['textfield5'], 
            ':textfield6' => $_POST['textfield6'], 
            ':textfield7' => $_POST['textfield7'], 
            ':comment' => $_POST['comment'], 
            ':documentFile' => $targetFilePath  // Store the file path in the database
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
header('location: ./index.php?page=forms');
?>
