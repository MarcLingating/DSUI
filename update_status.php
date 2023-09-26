<?php

error_log("Update script executed.");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["status"])) {
    $documentId = $_POST["id"];
    $newStatus = $_POST["status"];

    error_log("Received ID: " . $documentId);
    error_log("Received Status: " . $newStatus);

    try {
        include_once('connection.php');
        $database = new Connection();
        $db = $database->open();

        $updateQuery = "UPDATE upload_document SET status = :status WHERE id = :id";
        $stmt = $db->prepare($updateQuery);
        $stmt->bindParam(":status", $newStatus);
        $stmt->bindParam(":id", $documentId);

        if ($stmt->execute()) {
            $_SESSION['update_success'] = true;
        } else {
            $_SESSION['update_success'] = false;
        }
    } catch (PDOException $e) {
        $_SESSION['update_success'] = false;
    }

    header('Location: ./index.php?page=receive_document');
    exit(); // Make sure to exit after sending the header
} else {
    error_log("Update script: Invalid data or method.");
}
?>
