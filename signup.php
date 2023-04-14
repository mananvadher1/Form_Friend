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
                padding: 16px;
                background-color: white;
                max-width: 500px;
                margin: auto;
                margin-top: 100px;
            }

            /* Full-width input fields */
            input[type=text],
            input[type=password],
            input[type=email],
            input[type=number] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            input[type=text]:focus,
            input[type=password]:focus,
            input[type=email]:focus,
            input[type=number]:focus {
                background-color: #ddd;
                outline: none;
            }

            /* Overwrite default styles of hr */
            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }

            /* Set a style for the submit button */
            .registerbtn {
                background-color: #4CAF50;
                color: white;
                padding: 16px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            .registerbtn:hover {
                opacity: 1;
            }

            /* Add a blue text color to links */
            a {
                color: dodgerblue;
            }

            /* Set a grey background color and center the text of the "sign in" section */
            .signin {
                background-color: #f1f1f1;
                text-align: center;
            }

            /* paste frome here */
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
                border-radius: 10px;
                padding: 20px;
                /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
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


            select {
                background-color: #ddd;
                outline: none;
            }
        </style>
    </head>

    <body>
    <?php include('./navbar.php'); ?>

        <form action="./backend/registration.php" method="POST">
            <div class="container">
                <h1>Sign Up</h1>
                <!-- <div style="display: flex; justify-content: center;">
                    <label for="student" style="font-weight: bold;">Student</label>
                    <input type="radio" name="role"  value="0" id="student">
                    <label for="faculty" style="font-weight: bold;">Faculty</label>
                    <input type="radio" name="role" id="faculty" value="1">
                    
                </div> -->
                <hr>
                <label for="role">I am a:</label>
                <select id="role" name="role">
                    <option value="0">Student</option>
                    <option value="1">Faculty</option>
                </select>


                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" id="username" required>

                <label for="fname"><b>First Name</b></label>
                <input type="text" placeholder="Enter First name" name="fname" id="fname" required>

                <label for="lname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last name" name="lname" id="lname" required>

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" id="email" required>
                <label for="semester">Semester:</label>
                <select id="semester" name="semester" required>
                    <option value="">Select a semester</option>
                    <option value="1">First</option>
                    <option value="2">Second</option>
                    <option value="3">Third</option>
                    <option value="4">Fourth</option>
                    <option value="5">Fifth</option>
                    <option value="6">Sixth</option>
                    <option value="7">Seventh</option>
                    <option value="8">Eighth</option>
                </select>
                <label for="branch">Branch:</label>
                <select id="branch" name="branch" required>
                    <option value="">Select a branch</option>
                    <option value="CSE">Computer Science and Engineering</option>
                    <option value="ECE">Electronics and Communication Engineering</option>
                    <option value="ME">Mechanical Engineering</option>
                    <option value="CE">Civil Engineering</option>
                    <option value="EE">Electrical Engineering</option>
                </select>
                <label for="batch">Batch:</label>
                <select id="batch" name="batch" required>
                    <option value="">Select a batch</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
                <label for="college">College:</label>
                <select id="college" name="college" required>
                    <option value="">Select a college</option>
                    <option value="ABC">ABC College of Engineering</option>
                    <option value="XYZ">XYZ College of Technology</option>
                    <option value="PQR">PQR College of Science</option>
                </select>
                <label for="mobile"><b>Mobile number</b></label>
                <input type="number" placeholder="Enter Mobile number" name="mobile" id="mobile" required>
                <label for="enroll"><b>Enrollment No </b></label>
                <input type="number" placeholder="enroll" name="enroll" id="enroll" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw-repeat" required>
                <hr>

                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                <button type="submit" name="register" class="registerbtn" value="set">Register</button>
            </div>
        </form>
        <div class="signin">
            <p>Already have an account? <a href="login.html">login</a>.</p>
        </div>
        <footer>
            <p>&copy; 2023 My Website. All rights reserved.</p>
        </footer>
    </body>

    </html>