<?php
// Mark notifications as read in the database
// Replace 'your_db_host', 'your_db_name', 'your_username', and 'your_password' with your actual database credentials
$conn = new PDO('mysql:host=localhost;dbname=odss_db', 'root', '');
$query = "DELETE FROM ";
$statement = $conn->query($query);
?>
