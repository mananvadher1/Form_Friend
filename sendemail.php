<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';  

$server = 'localhost';
$user = 'root';
$pwd = '';
$db = 'form_friend';

$conn = new mysqli($server, $user, $pwd, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    
    
    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPDebug = 2;                                      
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                   
        $mail->SMTPAuth   = true;                            
        $mail->Username   = 'vandanvala7677@gmail.com';                
        $mail->Password   = 'wtybjdupezxkuand';                       
        $mail->SMTPSecure = 'tls';                             
        $mail->Port       = 587; 
    
        $mail->setFrom('vandanvala7677@gmail.com', 'Vandan Vala'); 
        $sql = "select * from users";  
        $result = $conn->query($sql); 

        if($result->num_rows > 0) {
            while($stu = $result->fetch_assoc()){
                $mail->addAddress($stu['email']);
            }
            $mail->isHTML(true);                                 
            $mail->Subject = 'For Demo Purpose';
            $mail->Body = $msg . '<br><br><br>' . '<header>
            <h1>Form Manager</h1>
            <nav>
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./about.php">About</a></li>
                    <li><a href="./services.php">Services</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="./login.php">Login</a></li>
                    <li><a href="./signup.php">Sign up</a></li>
                </ul>
            </nav>
        </header>';
            $mail->send();
            echo "Mail has been sent successfully!";
        }
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}   else {
    echo "Submit btn not press.";
}

?>