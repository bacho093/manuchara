<?php
include "dbh.class.php";
class Admincars extends Dbh {
    function cars() {
        if(isset($_POST['addnewcar']))
        {
            if(empty($_POST['newCar']))
            {
                echo "<script>alert('Field can not be empty!')</script>";
            }
            else {
                $sql = "SELECT * FROM cars";
                $stmt = $this->connect()->query($sql);

                while($row = $stmt->fetch())
                {
                    $validcars = $row['cars'];
                    if($_POST['newCar'] == $validcars)
                    {
                        echo "<script>alert('Such a car already exists!')</script>";
                    }
                }
            }
        if(!(empty($_POST['newCar'])) && !($_POST['newCar'] == $validcars))
        {
                $sql = "INSERT INTO cars (cars) VALUES(?)";
                $stmt= $this->connect()->prepare($sql);
                $stmt->execute([
                $newCar = htmlspecialchars($_POST['newCar'])
            ]);
        }
        }
    }

    function searchCar() {
        if(isset($_POST['query']))
        {
            $searchtext = $_POST['query'];
            $sql = "SELECT * FROM cars WHERE cars LIKE '%$searchtext%'";
            $stmt = $this->connect()->query($sql);
    
            while($row = $stmt->fetch())
            {
                $carid = $row['car_id'];
                $car = $row['cars'];
                echo "<li>$car<a href='?removecar=$carid' class='removecar'><i class='fas fa-ban'></i></a></li>";
            }
            if(isset($_GET['removecar']))
            {
                $delcarid = $_GET['removecar'];
                $delCar = "DELETE FROM cars WHERE car_id='$delcarid'";
                $delStmt = $this->connect()->query($delCar);

                echo "<script>window.open('cars.php','_self')</script>";
            }
        }
    }

    function selectcars() {
        if(empty($_POST['query']))
        {
            
        // PAGINATION
        $xLimit = 15;
        $xRange = 0;

        if(!isset($_GET['page']))
        {
            $xRange = 0;
            $page = 0;
        }
        else {
            $page = $_GET['page'] + 1;
            $xRange = $page * 15;
        }

        $pagination = "SELECT * FROM cars ORDER BY car_id";
        $pagstmt = $this->connect()->prepare($pagination);
        $pagstmt->execute();
        $pagrow = $pagstmt->fetchall();
        $count = count($pagrow);



            $sql = "SELECT * FROM cars ORDER BY car_id ASC LIMIT $xRange,$xLimit";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll();

            if(!isset($_GET['page']) || !($_GET['page'] == (ceil($count / 15) - 2)))
            {
                $r_num_page = "<a href='?page=$page'><i class='fas fa-angle-double-right'></i></a>";
            }
            else {
                $r_num_page = '';
            }

            if(!isset($_GET['page']))
            {
                $l_num_page = '';
            }
            elseif($_GET['page'] == 0)
            {
                $l_num_page = "<a href='cars.php'><i class='fas fa-angle-double-left'></i></a>";
            }
            else {
                $page = $_GET['page'] - 1;
                $l_num_page = "<a href='?page=$page'><i class='fas fa-angle-double-left'></i></a>";
            }

        // END OF PAGINATION 

            foreach ($rows as $row)
            {
                $carid = $row['car_id'];
                $car = $row['cars'];
                echo "<li>$car<a href='?removecar=$carid' class='remove'><i class='fas fa-ban'></i></a></li>";
            }
                
            echo "<div class='pagination'>
                $l_num_page  $r_num_page
                </div>";

            if(isset($_GET['removecar']))
            {
                $delcarid = $_GET['removecar'];
                $delCar = "DELETE FROM cars WHERE car_id='$delcarid'";
                $delStmt = $this->connect()->query($delCar);

                echo "<script>window.open('cars.php','_self')</script>";
            }

        }



    }

    function selectcarlist() {
        $sql = "SELECT * FROM cars";
        $stmt = $this->connect()->query($sql);
        while($row = $stmt->fetch())
        {
            $manufacturer = $row['cars'];
            echo "
                <option value='$manufacturer'>$manufacturer</option>";
        }
    }
    function insertmodellist() {
        if(isset($_POST['addmodel']))
        {
            $carName = htmlspecialchars($_POST['addmanufacturer']);
            $model = htmlspecialchars($_POST['model']);

             
            if(empty($carName) || empty($model))
            {
                echo "<script>alert('Fields can not be empty!')</script>";
            }
            else {
                $sql = "INSERT INTO models (car_name, model) VALUE (?,?)";
                $stmt = $this->connect()->prepare($sql);
    
                $stmt->execute([
                    $carName = htmlspecialchars($_POST['addmanufacturer']),
                    $model = htmlspecialchars($_POST['model'])
                ]);
            }
        }
    }

    function lastaddedmodel() {
        $sql = "SELECT car_name, model, id FROM models ORDER BY id ASC LIMIT 5";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()){
            $model_id = $row['id'];
            $car_name = $row['car_name'];
            $model = $row['model'];
        
            echo "
                    <input type='hidden' name='modelid' value='$model_id'>
                    <li>$car_name - $model <a href='?remove=$model_id' class='remove'><i class='fas fa-ban'></i></a></li>";
        }
        if(isset($_GET['remove']))
        {
            $delModel = $_GET['remove'];

            $delSql = "DELETE FROM models WHERE id='$delModel'";
            $delStmt = $this->connect()->query($delSql);

            echo "<script>window.open('cars.php','_self')</script>";
        }
    }

    function insertcolorlist() {
        if(isset($_POST['addcolor']))
        {
            $color_ge = htmlspecialchars($_POST['color_ge']);
            $color_en = htmlspecialchars($_POST['color_en']);

             
            if(empty($color_ge) || empty($color_en))
            {
                echo "<script>alert('Fields can not be empty!')</script>";
            }
            else {
                $sql = "INSERT INTO colors (color_ge, color_en) VALUE (?,?)";
                $stmt = $this->connect()->prepare($sql);
    
                $stmt->execute([
                    $color_ge = htmlspecialchars($_POST['color_ge']),
                    $color_en = htmlspecialchars($_POST['color_en'])
                ]);
            }
        }
    }

    function lastaddedcolor() {
        $sql = "SELECT * FROM colors ORDER BY color_id ASC LIMIT 5";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()){
            $colorId = $row['color_id'];
            $color_ge = $row['color_ge'];
            $color_en = $row['color_en'];
        
            echo "
                    <input type='hidden' name='modelid' value='$colorId'>
                    <li>$color_en - $color_ge<a href='?remove=$colorId' class='remove'><i class='fas fa-ban'></i></a></li>";
        }
        if(isset($_GET['remove']))
        {
            $delColor = $_GET['remove'];

            $delSql = "DELETE FROM colors WHERE color_id='$delColor'";
            $delStmt = $this->connect()->query($delSql);

            echo "<script>window.open('cars.php','_self')</script>";
        }
    }
}

$carlist = new Admincars();
$carlist->searchCar();