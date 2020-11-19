<?php
    include_once "includes/autoloader.inc.php";
    $info = new Admininfo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/info.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>მომხმარებლები</title>
</head>
<body>
    <div class="goback">
        <a href="users.php">Back</a>
        <div class="clear"></div>
    </div>
    <div class="user-info">
        <table>
            <?php
                $info->userInfo();
            ?>
        </table>

        <table>
            <tr class='user-tr2'>
            <th>ავტომობილი</th>
            </tr>
            <?php
                $info->userCar();
            ?>

            <tr class='user-tr2'>
            <th>მისამართი</th>
            </tr>
            <?php
                $info->usercaraddr();
            ?>
            
        </table>
    </div>
</body>
</html>