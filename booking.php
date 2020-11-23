<?php
    session_start();
    include_once "includes/autoloader.inc.php";

    if(!isset($_SESSION['firstname']) || !isset($_SESSION['email'])) {
        header("Location: index.php");
    }

    $book = new Booking();
    $book->book();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title></title>
</head>
<body>
<form action="" method="post">
        <input type="date" name="date" id="date">

        <select name="time" id="slot">
            <option>აირჩიეთ თარიღი</option>
        </select>

    <input type="submit" value="Book now" name='booknow'>
</form>

<script>

    $(document).ready(function() {
        $('#date').change(function() {
            var dateresult = $(this).val();
            if(dateresult !== '')
            {
                $.ajax({
                    url: 'classes/booking.class.php',
                    method: 'POST',
                    data: {
                        query: dateresult
                    },
                    success: function(res) {
                        $('#slot').html(res);
                    }
                });
            }
        });
    });

</script>

</body>
</html>