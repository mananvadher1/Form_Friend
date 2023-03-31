<?php
    include('./php/config.php');
    ?>
<!-- This is the code for the about page of a form-handler and creators website -->
<html>
<!-- coment by vandan -->
<!-- another -->
<head>
    <title>About Us</title>
    <style>
        /* Add some style to the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
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
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .logo {
            display: block;
            margin: 0 auto;
            width: 200px;
        }

        .intro {
            text-align: center;
        }

        .team {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
        }

        .team-member {
            width: 33%;
            padding: 10px;
        }

        .team-member img {
            display: block;
            margin: 0 auto;
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

        .team-member h3 {
            text-align: center;
            margin-top: 10px;
        }

        .team-member p {
            text-align: center;
        }
       
    </style>
</head>

<body>
<?php
    include('./php/config.php');
    ?>
    <?php include('./navbar.php'); ?>
    <div class="container">
        <!-- Add a logo for the website -->
        <img src="./../image/logo.png" alt="Logo" class="logo">
        <!-- Add an introduction paragraph -->
        <div class="intro">
            <h1>About Us</h1>
            <p>We are Form-Handler, a website that helps you create and manage online forms easily and efficiently.
                Whether you need a contact form, a survey, a registration form, or any other type of form, we have you
                covered. You can customize your forms with our drag-and-drop builder, collect responses in real-time,
                and export your data in various formats. No coding required!</p>
            <p>We are also a platform for creators who want to share their forms with the world. You can browse through
                our gallery of forms created by other users, or submit your own form and get feedback from the
                community. You can also earn money by monetizing your forms with ads or donations.</p>
        </div>
        <!-- Add a team section -->
        <div class="team">
            <!-- Add a team member -->
            <div class="team-member">
                <img src="alice.jpg" alt="Alice" class="team-member-img">
                <h3>Alice</h3>
                <p>Founder and CEO</p>
                <p>Alice is the visionary behind Form-Handler. She has a passion for creating user-friendly and
                    innovative web applications. She oversees the overall direction and strategy of the company.</p>
            </div>
            <!-- Add another team member -->
            <div class="team-member">
                <img src="bob.jpg" alt="Bob" class="team-member-img">
                <h3>Bob</h3>
                <p>Lead Developer</p>
                <p>Bob is the mastermind behind the technical aspects of Form-Handler. He has extensive experience in
                    web development and programming. He leads the development team and ensures the quality and
                    performance of the website.</p>
            </div>
            <!-- Add another team member -->
            <div class="team-member">
                <img src="charlie.jpg" alt="Charlie" class="team-member-img">
                <h3>Charlie</h3>
                <p>Community Manager</p>
                <p>Charlie is the voice of Form-Handler. He manages the communication and engagement with the users and
                    creators. He handles the social media accounts, the blog, the newsletter, and the support requests.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
