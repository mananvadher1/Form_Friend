<?php

include('./../php/config.php');

if(isset($_POST['register'])){

    $role = $_POST['role'];
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $semester = $_POST['semester'];
    $branch = $_POST['branch'];
    $batch = $_POST['batch'];
    $college = $_POST['college'];
    $mobile = $_POST['mobile'];
    $psw = $_POST['psw'];
    $pswRep = $_POST['psw_repeat'];
    $enroll = $_POST['enroll'];

    if($psw == $pswRep) {

        $name = $fname . $lname;

        // Validate the form data
        if(empty($role) || empty($username) || empty($fname) || empty($lname) || empty($email) || empty($semester) || empty($branch) || empty($batch) || empty($college) || empty($mobile) || empty($psw) || empty($pswRep) || empty($enroll)){
          echo "Please fill all the fields.";
          // exit();
        } 
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            exit();
        }

        if ($role == "student" && ($semester < 1 || $semester > 8)) {
            echo "Invalid semester value.";
            exit();
        }

        // Check if the username already exists in the database
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "Username already taken. Please choose a different one.";
            exit();
        }

        // Insert the user data into the database
        $sql = "INSERT INTO users (roles, username, fname, lname, email, semester, branch, enroll, batch, college, mobile, psw, pswRep)
        VALUES ('$role', '$username', '$fname', '$lname', '$email', '$semester', '$branch', '$enroll', '$batch', '$college', '$mobile', '$psw', '$pswRep')";

        if(mysqli_query($conn, $sql)) {
            echo "Data inserted successfully.";
            echo "<script>window.location.href = './../login.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

    } else {
        echo "<script>alert('Password not match !');</script>";
        echo "<script>window.location.href = './../signup.php';</script>";
    }

} else {
    echo "<script>alert('Bad Request !');</script>";
    echo "<script>window.location.href = './../index.php';</script>";
}

// Close the connection
$conn->close();
?>
