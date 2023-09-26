<?php
include_once('db_connect.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch new announcements
$sql = "SELECT * FROM announcement WHERE is_new = 1";
$result = $conn->query($sql);

$announcements = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $announcements[] = $row;
  }
}

// Mark fetched announcements as read
$markAsReadSql = "UPDATE announcement SET is_new = 0 WHERE is_new = 1";
$conn->query($markAsReadSql);

$conn->close();

// Return the fetched announcements as a JSON response
echo json_encode($announcements);
?>
