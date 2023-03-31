<?php
    include('./php/config.php');
    ?>
<html>

<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

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

        footer {
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
            font-size: 14px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f0f0f0;
        }

        /* Add padding to containers */
        .container {
            z-index: 0;
            padding: 25px;
            background-color: white;
            max-width: 500px;
            margin: auto;
            margin-top: 100px;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .loginbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .loginbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign up" section */
        .signup {
            padding: 10px;
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include('./navbar.php'); ?>
    <form action="./login_check.php" method="post"  >
        <div class="container">
            <h1>Login</h1>
            <div style="display: flex; justify-content: center;">
                <input type="radio" name="role" id="student" value="student">
                <label for="student" style="font-weight: bold;">Student</label>
                <input type="radio" name="role" id="faculty" value="faculty">
                <label for="faculty" style="font-weight: bold;">Faculty</label>
            </div>
            <hr>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
            <hr>

            <button type="submit" class="loginbtn">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>

            <span class="psw">Forgot <a href="#">password?</a></span>

            <div class="signup">
                <p>Don't have an account? <a href="signup.html">Sign up</a>.</p>
            </div>
    </form>
    <footer>
        <p>&copy; 2023 My Website. All rights reserved.</p>
    </footer>
</body>

</html>