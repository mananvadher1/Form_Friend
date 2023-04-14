<?php
include_once("./php/config.php");
$mysqli = new mysqli("localhost", "root", "", "form_friend");
if(isset($_POST['editform'])){
    $formname = $_POST['formname'];
    $result = mysqli_query($mysqli, "SELECT * FROM forms WHERE formname='$formname'");
    while($row = mysqli_fetch_array($result))
    {
        $formlink = $row['formlink'];
        $formfram = $row['formfram'];
        $formdes = $row['formdes'];
        $formdeadline = $row['formdeadline'];
    }
}
if(isset($_POST['updateform'])){
    $id = $_POST['id'];
    $formlink=$_POST['formlink'];
    $formfram=$_POST['formfram'];
    $formname=$_POST['formname'];
    $formdes=$_POST['formdes'];
    $formdeadline=$_POST['formdeadline'];

    //updating the table
    $result=mysqli_query($mysqli, "UPDATE forms SET formlink='$formlink', formfram='$formfram', formname='$formname', formdes='$formdes', formdeadline='$formdeadline' WHERE id=$id");

    //redirectig to the display page. In our case, it is index.php
    header("Location: index.php");
}
?>