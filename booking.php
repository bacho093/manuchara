<?php
    if(!isset($_SESSION['user'])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $land['booking']; ?></title>
</head>
<body>
    
</body>
</html>