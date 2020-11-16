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
            $sql = "SELECT cars FROM cars WHERE cars LIKE '%$searchtext%'";
            $stmt = $this->connect()->query($sql);
    
            while($row = $stmt->fetch())
            {
                $car = $row['cars'];
                echo "<li>$car</li>";
            }
        }
    }
    function selectcars() {
        if(empty($_POST['query']))
        {
            $sql = "SELECT cars FROM cars ORDER BY rand() LIMIT 15";
            $stmt = $this->connect()->query($sql);

            while($row = $stmt->fetch())
            {
                $car = $row['cars'];
                echo "<li>$car</li>";
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
            $sql = "INSERT INTO models (car_name, model) VALUE (?,?)";
            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([
                // $carName = htmlspecialchars($_POST['addmanufacturer']),
                $carName = 'lexus',
                $model = htmlspecialchars($_POST['model'])
            ]);
        }
    }

    function lastaddedmodel() {
        $sql = "SELECT car_name, model FROM models ORDER BY id DESC LIMIT 5";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()){
            $car_name = $row['car_name'];
            $model = $row['model'];
        
            echo "<li>$car_name - $model</li>";
        }
    }
}

$carlist = new Admincars();
$carlist->searchCar();