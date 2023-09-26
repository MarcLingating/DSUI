<?php
include_once('db_connect.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch new documents
$sql = "SELECT * FROM document WHERE is_new = 1";
$result = $conn->query($sql);

$documents = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $documents[] = $row;
  }
}

// Mark fetched documents as read
$markAsReadSql = "UPDATE document SET is_new = 0 WHERE is_new = 1";
$conn->query($markAsReadSql);

$conn->close();

// Return the fetched documents as a JSON response
echo json_encode($documents);
?>
