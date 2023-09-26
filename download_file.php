<?php
require_once('connection.php'); // Include the Connection class

// Get the form ID from the query string (e.g., download.php?form_id=1)
$form_id = $_GET['form_id'];

// Create a new instance of the Connection class
$db = new Connection();
$conn = $db->open();

// Prepare and execute a query to retrieve the documentFile and filename (BLOB and filename)
$sql = "SELECT * FROM forms WHERE form_id = :form_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':form_id', $form_id, PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // Fetch the BLOB data and filename
    $documentFilePath = $result['documentFile'];
    $docFile = basename($documentFilePath); // Get the filename from the full path

    // Specify the folder path where the file should be downloaded
    $downloadFolder = 'forms/'; // Change this to your desired folder path

    // Set the appropriate content type and headers for download

    header("Content-Disposition: attachment; filename=$docFile");

    // Output the file to the browser
    readfile($downloadFolder . $docFile);
} else {
    echo "Document not found";
}

// Close the database connection
$db->close();
?>
