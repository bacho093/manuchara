<?php
    session_start();
    include "../includes/autoloader.inc.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="sidebar/sidebar.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <section class="main">
        <?php
            include "sidebar/sidebar.php";
        ?>
    </section>


   <div class="positionnow" style="margin-left: 50%">
   <div class="pagination">
    <nav>

    </nav>
   </div>
</div>
</body>
</html>