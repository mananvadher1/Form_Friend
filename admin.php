<?php
    include('./php/config.php');
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
    </style>
</head>

<body>
    <header>
        <h1>Faculty Dashboard</h1>
        <nav>
            <ul>
                <li><a href="./login.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Form Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Form Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Form 1</td>
                        <td><button>Edit</button></td>
                        <td><button>Delete</button></td>
                    </tr>
                    <tr>
                        <td>Form 2</td>
                        <td><button>Edit</button></td>
                        <td><button>Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section>
            <h1>Create form for student</h1>
            <form id="student-form">
                <label for="formlink">Form Link :</label>
                <input type="text" id="formlink" name="formlink" required placeholder="Paste your form link here "
                    class="sform">
                <label for="formfram">Form Frame :</label>
                <input type="text" id="formfram" name="formfram" required placeholder="Paste your form iframe link here"
                    class="sform">
                    <label for="formname">Form name :</label>
                <input type="text" id="formname" name="formname" required placeholder="enter your form name"
                    class="sform">
                    <label for="formdes">Form Description :</label>
                <input type="text" id="formdes" name="formdes" required placeholder="enter your form description here"
                    class="sform">
                    <label for="formdeadline">Form deadline :</label>
                <input type="text" id="formdeadline" name="formdeadline" required placeholder="enter your form description here"
                    class="sform">
                    <!-- <label for="semester">Semester:</label>
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
                    </select> -->
                <!-- Add a hidden input to store the selected users' email addresses -->
                <input type="hidden" id="selected-users" name="selected-users" value="">
                <!-- Add a button to submit the form -->
                <button type="submit" id="submit-button">Create Form</button>
            </form>

            <!-- Add some JavaScript code to handle the form submission -->
            <script>

                // Get the form element by its id
                var form = document.getElementById("student-form");

                // Add an event listener to the form when it is submitted
                form.addEventListener("submit", function (event) {

                    // Prevent the default action of the form (which is to reload the page)
                    event.preventDefault();

                    // Get the values of the select elements by their ids
                    var semester = document.getElementById("semester").value;
                    var branch = document.getElementById("branch").value;
                    var batch = document.getElementById("batch").value;
                    var college = document.getElementById("college").value;

                    // Create an object to store the parameters for the AJAX request
                    var params = {
                        semester: semester,
                        branch: branch,
                        batch: batch,
                        college: college
                    };

                    // Create an AJAX request object
                    var xhr = new XMLHttpRequest();

                    // Open the request with the method (POST) and the URL (your PHP file)
                    xhr.open("POST", "your_php_file.php");

                    // Set the request header to indicate that the data is in JSON format
                    xhr.setRequestHeader("Content-type", "application/json");

                    // Add an event listener to handle the response from the server
                    xhr.addEventListener("load", function () {

                        // Check if the status code is 200 (OK)
                        if (xhr.status == 200) {

                            // Parse the response as JSON
                            var response = JSON.parse(xhr.responseText);

                            // Check if the response has a success property and it is true
                            if (response.success) {

                                // Get the hidden input element by its id
                                var selectedUsers = document.getElementById("selected-users");

                                // Set the value of the hidden input to the email addresses of the selected users
                                selectedUsers.value = response.emails;

                                // Submit the form normally
                                form.submit();

                            } else {

                                // Display an error message from the response
                                alert(response.message);

                            }

                        } else {

                            // Display a generic error message
                            alert("Something went wrong. Please try again.");

                        }

                    });

                    // Send the request with the parameters as JSON string
                    xhr.send(JSON.stringify(params));

                });

            </script>
        </section>
        <section>
            <h2>Reminders</h2>
            <form>
                <label for="form-name">Form Name:</label>
                <select id="form-name">
                    <option value="form1">Form 1</option>
                    <option value="form2">Form 2</option>
                </select>
                <label for="reminder-date">Reminder Date:</label>
                <input type="date" id="reminder-date" name="">
                <label for="reminder-time">Reminder Time:</label>
                <input type="time" id="reminder-time">
                <button id="schedule-reminder">Schedule Reminder</button>
            </form>
        </section>
        <section>
            <h2>Form Analytics</h2>
            <canvas id="form-analytics"></canvas>
        </section>
        <section>
            <h2>User Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>johndoe@example.com</td>
                        <td><button>Edit</button></td>
                        <td><button>Delete</button></td>
                    </tr>
                    <tr>
                        <td>Jane Doe</td>
                        <td>janedoe@example.com</td>
                        <td><button>Edit</button></td>
                        <td><button>Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <script>

    </script>
</body>

</html>