<?php
    session_start();
    include_once "includes/autoloader.inc.php";
    $cars = new Admincars();
    $cars->cars();
    $cars->insertmodellist();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <link rel="stylesheet" href="sidebar/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/cars.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Cars</title>
</head>
<body>
<section class="main">
        <?php
            include "sidebar/sidebar.php";
        ?>

        <div class="car-list">
            <div class="cars">
                <p class='divtitle'>Add Car</p>
                <h1>Cars</h1>
                <form action="" id='addinlistnewcar' method='POST'>
                    <input type="text" name="newCar" id='newCar' class='newCar' placeholder="Add new car">
                    <button type="submit" id='addnewcar' class='addnew' name='addnewcar'>Add new car</button>
                </form>

                <form action="" method="POST">
                    <input type="text" name="search" id='search' placeholder="Search">

                </form>
                <ul id='carslist'>
                    <?php
                        $cars->selectcars();
                        $cars->searchCar();
                    ?>
                </ul>
            </div>
            <div class="model-and-manufac">
                <div class="models">
                    <p class='divtitle'>Add Model</p>
                        <h1>Select Car</h1>
                        <form action="" id='addinlistnewcar' method='POST'>
                            <select name="addmanufacturer" class='newCar'>
                                <option value="">Select Car</option>
                                <?php
                                    $cars->selectcarlist();
                                ?>
                            </select>
                </div>
            
                <div class="manufacture">
                    <h1>Enter a value</h1>
                    <input type="text" name="model" class='newCar'>
                    <input type="submit" name='addmodel' class='addnew' value="Add Model">
                    </form>

                    <ul class="carlist">
                    <p class='lastadded'>Last Added...</p>
                        <li>asdasdasd</li>
                        <li>asdasdasd</li>
                    </ul>
                </div>
            </div>
        </div>

    </section>
    <script>
      $(document).ready(function() {
          $('#search').keyup(function() {
            var searchText = $(this).val();
            if(searchText !== '')
            {
                $.ajax({
                    url: '../classes/admincars.class.php',
                    method: 'POST',
                    data: {
                        query: searchText
                    },
                    success: function(res) {
                        $('#carslist').html(res);
                    }
                });
            }
          });
      });        
    </script>

</body>
</html>