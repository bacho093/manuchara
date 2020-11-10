<?php
    session_start();
    include "../database/dbh.php";
    include "admin_database/users.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <link rel="stylesheet" href="sidebar/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
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