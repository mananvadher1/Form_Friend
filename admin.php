<?php
include('./php/config.php');
session_start();
echo "hello";
if ($_SESSION['logedin']!="vandan") {
    echo "<script>window.location.href = './login.php';</script>";
    
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
        <?php
        $sql = "SELECT * FROM forms";
        $result = $conn->query($sql);
        // Fetch results
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["formname"] . "</td>";
                // echo "<td><button>Edit</button></td>";
                echo "<td><button><a href='editform.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to edit this item?\");'>Edit</a></button></td>";
                echo "<td><button><a href='delete.inc.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a></button></td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </tbody>
</table>
        </section>
        <section>
            <h1>Create form for student</h1>
            <form action="formcreate.php" method="post">
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
                <input type="date" id="formdeadline" name="formdeadline" required placeholder="enter your form description here"
                    class="sform">
                    
                <!-- Add a button to submit the form -->
                <button type="submit" name="createform">Create</button>
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
  <p>Select your branch:</p>
  <select id="branch" onchange="showSemester(); showBatch();"> <!-- Use a select element for the branch -->
    <option value="CSE">CSE</option>
    <option value="ECE">ECE</option>
    <option value="MECH">MECH</option>
  </select>

  <p>Select your semester:</p>
  <select id="semester">
    <!-- The options will be added by the script -->
  </select>

  <p>Select your batch:</p>
  <select id="batch">
    <!-- The options will be added by the script -->
  </select>

  <input type="button" value="Submit" onclick="submitForm();">
  <!-- <button type="submit" name="sendmail" value="Submit" onclick="submitForm();>Send reminder</button> -->
</form>

<script>
function getBranch() {
  var branch = document.getElementById("branch").value; // Get the value of the branch select element
  return branch;
}

// This function shows the semesters based on the branch
function showSemester() {
  var branch = getBranch();
  var semester = document.getElementById("semester");
  semester.innerHTML = ""; // Clear the previous options
  if (branch == "CSE") {
    // Add options for CSE branch
    semester.innerHTML += "<option value='1'>First</option>";
    semester.innerHTML += "<option value='2'>Second</option>";
    semester.innerHTML += "<option value='3'>Third</option>";
    semester.innerHTML += "<option value='4'>Fourth</option>";
    semester.innerHTML += "<option value='5'>Fifth</option>";
    semester.innerHTML += "<option value='6'>Sixth</option>";
    semester.innerHTML += "<option value='7'>Seventh</option>";
    semester.innerHTML += "<option value='8'>Eighth</option>";
  } else if (branch == "ECE") {
    // Add options for ECE branch
    semester.innerHTML += "<option value='1'>First</option>";
    semester.innerHTML += "<option value='2'>Second</option>";
    semester.innerHTML += "<option value='3'>Third</option>";
    semester.innerHTML += "<option value='4'>Fourth</option>";
    semester.innerHTML += "<option value='5'>Fifth</option>";
    semester.innerHTML += "<option value='6'>Sixth</option>";
  } else if (branch == "MECH") {
    // Add options for MECH branch
    semester.innerHTML += "<option value='1'>First</option>";
    semester.innerHTML += "<option value='2'>Second</option>";
    semester.innerHTML += "<option value='3'>Third</option>";
    semester.innerHTML += "<option value='4'>Fourth</option>";
  }
}


function showBatch() {
  var branch = getBranch();
  var batch = document.getElementById("batch");
  batch.innerHTML = ""; // Clear the previous options
  if (branch == "CSE") {
    // Add options for CSE branch
    batch.innerHTML += "<option value='C1'>C1</option>";
    batch.innerHTML += "<option value='C2'>C2</option>";
    batch.innerHTML += "<option value='C3'>C3</option>";
  } else if (branch == "ECE") {
    // Add options for ECE branch
    batch.innerHTML += "<option value='E1'>E1</option>";
    batch.innerHTML += "<option value='E2'>E2</option>";
    batch.innerHTML += "<option value='E3'>E3</option>";
    batch.innerHTML += "<option value='E4'>E4</option>";
  } else if (branch == "MECH") {
    // Add options for MECH branch
    batch.innerHTML += "<option value='M1'>M1</option>";
    batch.innerHTML += "<option value='M2'>M2</option>";
    batch.innerHTML += "<option value='M3'>M3</option>";
    batch.innerHTML += "<option value='M4'>M4</option>";
    batch.innerHTML += "<option value='M5'>M5</option>";
    batch.innerHTML += "<option value='M6'>M6</option>";
  }
}
// This function submits the form data to a server
function submitForm() {
  // Get the form data
  var branch = getBranch();
  var semester = document.getElementById("semester").value;
  var batches = [];
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  // Loop over the checkboxes and push the checked ones to the batches array
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      batches.push(checkboxes[i].value);
    }
  }
  // Send the form data to the server using AJAX or a form submit
  // For example, using jQuery:
  $.post("server.php", {branch: branch, semester: semester, batches: batches}, function(data) {
    // Handle the server response
    alert(data);
  });
}
</script>

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