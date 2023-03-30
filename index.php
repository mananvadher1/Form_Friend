<?php
include('./php/config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>My Website Home Page</title>
    <link rel="stylesheet" type="text/css" href="./CSS/home.css">
</head>

<body>
    <?php include('./navbar.php') ?>
    <main>
        <section>
            <h2>Welcome to My Website</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit augue ac leo ultrices eleifend.
                Nunc quis blandit ante, et lacinia elit. Aliquam laoreet magna in tortor fermentum, at gravida magna
                sagittis. </p>
            <button>Learn More</button>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 My Website. All rights reserved.</p>
    </footer>
    <script src="/js/home.js"></script>
</body>

</html>