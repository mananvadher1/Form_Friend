<!-- <?php

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
      
        // if($role == '0') {
        //     $roleUser = 0;
        // } else {
        //     $roleUser = 1;
        // }
        $name = $fname . $lname;

    } else {
        echo "<script>alert('Password not match !')</script>";
        echo "<script>window.location.href = './../signup.php';</script>";
    }


} else {
    echo "<script>alert('Bad Request !')</script>";
    echo "<script>window.location.href = './../index.php';</script>";
}

?>-->

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
       
        // if($role == 'student') {
        //     $roleUser = 0;
        // } else {
        //     $roleUser = 1;
        // }
        $name = $fname . $lname;

    } else {
        echo "<script>alert('Password not match !')</script>";
        echo "<script>window.location.href = './../signup.php';</script>";
    }


} else {
    echo "<script>alert('Bad Request !')</script>";
    echo "<script>window.location.href = './../index.php';</script>";
}

// Validate the form data
if (empty($role) || empty($username) || empty($fname) || empty($lname) || empty($email) || empty($semester) || empty($branch) || empty($batch) || empty($college) || empty($mobile) || empty($psw) || empty($pswRep)) {
  echo "Please fill all the fields.";
  exit();
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
$sql = "INSERT INTO users   ( role, username,fname, lname, email, semester, branch ,enroll ,batch, college, mobile, psw , pswRep)
VALUES ('$role' , $username', '$fname', '$lname', '$email', '$semester', '$branch', $enroll , '$batch', '$college', '$mobile', '$psw' , '$pswRep')";

if(empty($branch) || empty($batch) || empty($college) || empty($mobile) || empty($psw) || empty($psw_repeat)) {
    echo "Please fill all the fields.";}
  // } else if($psw != $psw_repeat) {
  //   echo "Passwords do not match.";
  // } else {
  //   // Prepare the SQL query to insert the data into the table
  //   $sql = "INSERT INTO users ( batch, college, mobile, psw) VALUES ( '$batch', '$college', '$mobile', '$psw')";
  // }
  //   // Execute the query and check for errors
    if(mysqli_query($conn, $sql)) {
      echo "Data inserted successfully.";
      echo "<script>window.location.href = './../home.php';</script>";
    } else {
      echo "Error: " . mysqli_error($conn);
    }

// if ($conn->query($sql) === TRUE) {
//   echo "Registration successful. Welcome to our website!";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// Close the connection
$conn->close();
?>


