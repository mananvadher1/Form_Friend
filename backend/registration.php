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

    if($psw == $pswRep) {
        $psw = md5($psw);
        if($role == 'student') {
            $roleUser = 0;
        } else {
            $roleUser = 1;
        }
        $name = $fname . $lname;

    } else {
        echo "<script>alert('Password not match !')</script>";
        echo "<script>window.location.href = './../signup.php';</script>";
    }


} else {
    echo "<script>alert('Bad Request !')</script>";
    echo "<script>window.location.href = './../index.php';</script>";
}

?>