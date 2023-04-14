<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "form_friend");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get id of row to delete from URL parameter
$id = $_GET["id"];

// Delete row from MySQL database
$sql = "DELETE FROM forms WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// Close MySQL connection
mysqli_close($conn);
?>