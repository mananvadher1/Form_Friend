<?php
include_once("./php/config.php");
$mysqli = new mysqli("localhost", "root", "", "form_friend");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $result = mysqli_query($mysqli, "SELECT * FROM forms WHERE id=$id");
    while($row = mysqli_fetch_array($result))
    {
        $formlink = $row['formlink'];
        $formfram = $row['formfram'];
        $formname = $row['formname'];
        $formdes = $row['formdes'];
        $formdeadline = $row['formdeadline'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./CSS/admin.css">
    <style>
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 32px;
        }

        nav ul {
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            list-style: none;
            margin-left: 20px;
        }

        nav ul li:first-child {
            margin-left: 0;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 600px;
            margin: 0 auto;
            border: 1px solid gray;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0;
        }

        select {
            width: 100%;
            padding: 5px;
            border: 1px solid gray;
            border-radius: 5px;
        }

        .sform {
            width: 100%;
            padding: 5px;
            border: 1px solid gray;
            border-radius: 5px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            /* Add some margin to the top of the button */
        }

        button:hover {
            background-color: darkgreen;
        }
        a{
            decoration: none;
        }
    </style>
</head>

<body>
    
        <section>
            <h1>Update form for student</h1>
            <form action="updateform.inc.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="formlink">Form Link :</label>
                <input type="text" id="formlink" name="formlink" required placeholder="Paste your form link here "
                    class="sform" value="<?php echo $formlink; ?>">
                <label for="formfram">Form Frame :</label>
                <input type="text" id="formfram" name="formfram" required placeholder="Paste your form iframe link here"
                    class="sform" value="<?php echo $formfram; ?>">
                    <label for="formname">Form name :</label>
                <input type="text" id="formname" name="formname" required placeholder="enter your form name"
                    class="sform" value="<?php echo $formname; ?>">
                    <label for="formdes">Form Description :</label>
                <input type="text" id="formdes" name="formdes" required placeholder="enter your form description here"
                    class="sform" value="<?php echo $formdes; ?>">
                    <label for="formdeadline">Form deadline :</label>
                <input type="date" id="formdeadline" name="formdeadline" required placeholder="enter your form description here"
                    class="sform" value="<?php echo $formdeadline; ?>">
                    
                <!-- Add a button to submit the form -->
                <button type="submit" name="updateform">Update</button>
</form> 
           
                </section> 

</body>

</html>





