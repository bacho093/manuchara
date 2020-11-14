<?php
    session_start();
    include "../includes/autoloader.inc.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <link rel="stylesheet" href="sidebar/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>მომხმარებლები</title>
</head>
<body>
<section class="main">
    <?php
        include "sidebar/sidebar.php";
    ?>
    <table>
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th style="width: 40px; font-size: 13px">Delete Edit</th>
    </tr>
        <tr>

        </tr>
    </table>
</section>
</body>
</html>