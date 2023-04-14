<?php
include('./php/config.php');

if (isset($_POST['createform'])) {
  $formlink = $_POST['formlink'];
  $formfram = $_POST['formfram'];
  $formname = $_POST['formname'];
  $formdes = $_POST['formdes'];
  $formdeadline = $_POST['formdeadline'];
} else {
  echo "<script>alert('Bad Request !')</script>";
  echo "<script>window.location.href = './../index.php';</script>";
}

// Validate the form data
if (empty($formlink) || empty($formfram) || empty($formname) || empty($formdes) || empty($formdeadline)) {
  echo "Please fill all the fields.";
  exit();
}

// Insert the user data into the database
$sql = "INSERT INTO forms ( formlink , formfram, formname, formdes, formdeadline)
VALUES ('$formlink', '$formfram', '$formname', '$formdes', '$formdeadline')";

if (mysqli_query($conn, $sql)) {
  echo "Data inserted successfully.";
  echo "<script>window.location.href = './admin.php';</script>";
} else {
  echo "Error: " . mysqli_error($conn);
}

// Close the connection
$conn->close();
?>
