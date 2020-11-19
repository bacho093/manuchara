<?php
    session_start();
    include_once "includes/autoloader.inc.php";

    $admin_userlist = new Adminusers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <link rel="stylesheet" href="sidebar/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/users.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>მომხმარებლები</title>
</head>
<body>
<section class="main">
    <?php
        include "sidebar/sidebar.php";
    ?>

    <div class="table">
        <div class="header-box">
            <div class="addnew">
                <a href="#">დაჯავშნე</a>
            </div>
            <div class="search-user">
                <form action="" method="post">
                    <input type="text" name="searchuser" id="searchuser" placeholder='By Email or Phone'>
                </form>
            </div>
        </div>
    <table class='userList'>
    <tr class='trTitle'>
        <th>სახელი</th>
        <th>გვარი</th>
        <th>მეილი</th>
        <th>ტელეფონი</th>
        <th>სტატუსი</th>
        <th class='ed'>INFO - BLOCK</th>
    </tr>
            <?php
                $admin_userlist->userList();
                $admin_userlist->searchUser();
            ?>
    </table>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#searchuser').keyup(function() {
            var searchuser = $(this).val();
            if(searchuser !== '') {
                $.ajax({
                    url: '../classes/adminusers.class.php',
                    method: 'POST',
                    data: {
                        result: searchuser
                    },
                    success: function(res) {
                        $('.userList').html(res)
                    }
                });
            }
        });
    });
</script>
</body>
</html>