
<?php
session_start();
    include('./php/config.php');
    
    echo $_SESSION['logedin'];
    $username= $_SESSION['username']  ;
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .card {
            margin: 10px;
        }

        .card-header {
            font-weight: bold;
        }

        .card-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-link {
            text-decoration: none;
            color: black;
        }

        .form-link:hover {
            text-decoration: underline;
        }

        .consent-btn {
            margin: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Student Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="student_profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Welcome, <?php
// Retrieve session variables
echo $_SESSION["username"] . ".<br>";

?></div>
                    <div class="card-body">
                        <p>Your ID:  <?php $sql = "SELECT enroll FROM users where username = '$username' ";
$result = $conn->query($sql);

// Fetch results
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo $row["enroll"] . "<br>";
  }
} else {
  echo "0 results";
}
?></p>
                        <p>Your Branch: <?php $sql = "SELECT branch FROM users where username = '$username' ";
$result = $conn->query($sql);

// Fetch results
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo  $row["branch"] . "<br>";
  }
} else {
  echo "0 results";
}
?>
</p>
                        <p>Your Semester: <br> <?php $sql = "SELECT semester FROM users where username = '$username' ";
$result = $conn->query($sql);

// Fetch results
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo $row["semester"] . "<br>";
  }
} else {
  echo "0 results";
}
?></p>
      </div>
                </div>

                <div class="card">
                    <div class="card-header">Reminders</div>
                    <div class="card-body">
                        <!-- List of reminders -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">You have not filled out the feedback form for Course A. Please
                                fill it out by 31 March 2023.</li>
                            <li class="list-group-item">You have not filled out the consent form for Project B. Please
                                fill it out by 30 March 2023.</li>
                            <li class="list-group-item">You have not filled out the registration form for Event C.
                                Please fill it out by 29 March 2023.</li>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Main content -->
            <div class="col-md-9">
                <!-- List of forms -->
                <h3>Forms shared by administrators</h3>
                <!-- Table of forms -->
                <table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Form Name</th>
            <th scope="col">Form Link</th>
            <th scope="col">Form Description</th>
            <th scope="col">Form Deadline</th>
            <th scope="col">Form Status</th>
            <th scope="col">Form Consent</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM forms";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["formname"] . "</td>";
                echo '<td>' ."<a href='$row[formlink]'>click here for form link!</a>". '</td>';
                // echo "<td>" . $row["formlink"] . "</td>";
                echo "<td>" . $row["formdes"] . "</td>";
                echo "<td>" . $row["formdeadline"] . "</td>";
                echo "<td><span class=\"badge badge-danger\">Not filled</span></td>";
                echo "<td>";
                echo "<button class=\"btn btn-success consent-btn\">Yes</button>";
                echo "<button class=\"btn btn-danger consent-btn\">No</button>";
                echo "<button class=\"btn btn-warning consent-btn\">Maybe</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </tbody>
</table>
            </div>
        </div>
    </div>

    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>