<?php
    include_once "includes/autoloader.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

<div class="container">
    <form action="" id="srchbox">
        <select name="sel" id="sel">
            <option value="email">მეილით</option>
            <option value="username">სახელით</option>
        </select>
        <input type="text" name="search" id="search" placeholder='Search:'>
    </form>
    <div id="wrapper">
        <?php
            $search = new Search();
        ?>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#search').keyup(function() {
            var srchres = $('#search').val();
            var selres = $('#sel').val();

            if(srchres !== "")
            {
                $.ajax({
                    url: "classes/search.class.php",
                    method: "POST",
                    data: {
                        query: srchres,
                        sel : selres
                    },
                    success: function(res) {
                        $('#wrapper').html(res);
                    }
                });
            }
            else
            {
                $.ajax({
                    url: "classes/search.class.php",
                    success: function(res) {
                        $('#wrapper').html(res);
                    }
                })
            }
        });
    })
</script>
</body>
</html>