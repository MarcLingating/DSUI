<?php
session_start();
include_once('connection.php');

if(isset($_GET['id'])){
    $database = new Connection();
    $db = $database->open();
    try{
        // Retrieve the file path from the database based on the form_id
        $id = $_GET['id'];
        $stmt = $db->prepare("SELECT documentFile FROM document_form WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            // Get the file path from the database
            $filePath = $row['documentFile'];

            // Check if the file exists
            if(file_exists($filePath)){
                // Set headers to force download as an Excel file
                header('Content-Description: File Transfer');
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); // Adjust content type for Excel files
                header('Content-Disposition: attachment; filename=' . basename($filePath));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filePath));
                ob_clean();
                flush();
                readfile($filePath);
                exit;
            } else {
                $_SESSION['message'] = 'File not found.';
            }
        } else {
            $_SESSION['message'] = 'Form not found.';
        }
    } catch(PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }
    $database->close();
} else {
    $_SESSION['message'] = 'Invalid form_id.';
}

header('location: ./index.php?page=forms');
?>
