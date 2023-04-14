<?php      
    include('./php/config.php');  
    $username = $_POST['username'];  
    $password = $_POST['psw'];
    $role = $_POST['role'];
       
    if(empty($role) || empty($username) || empty($psw)){
        echo "Please fill all the fields.";
        // exit();
      } 

        $sql = "select *from users where username = '$username' and psw = '$password' and roles='$role'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        if($count >0    ){  
            echo "<h1><center> Login successful </center></h1>"; 
            session_start();
            $_SESSION['username']= $username ;
            $_SESSION['logedin'] = true ;
            
            if($role == 0){

                echo "<script>window.location.href = './student.php';</script>";
            }
            else{
                echo "<script>window.location.href = './admin.php';</script>";
            }
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";
            echo "<script>window.location.href = './login.php';</script>";  
        }     
?>  