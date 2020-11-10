<?php
    session_start();
    include "database/dbh.php";
    include "languages/config.php";

    if(!isset($_SESSION['user']))
    {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/profile.css">
    <title><?php echo $land['profile']; ?></title>
</head>
<body>
    <div class="profilepage">
        <div class="container-sm">
            <div class="profile-wrapper">
                <h1>"Bacho"<?php echo  " " . $land['userpage']; ?></h1>

                <div class="form-wrapper">
                    <form action="" method="post">
                        <p>
                            <input type="text" name="firstname" value=''>
                        </p>
                        <p>
                            <input type="text" name="lastname" value=''>
                        </p>
                        <p>
                            <input type="text" name="email" value=''>
                        </p>
                        <p>
                            <input type="text" name='phone' value=''>
                        </p>
                        <p>
                            <input type="text" name='password' value=''>
                        </p>
                        <p>
                            <input type="text" name='repassword' value=''>
                        </p>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>