<?php
include "dbh.class.php";
class Profile extends Dbh {
    function infolist() {
        $Sessemail = $_SESSION['email'];
        $Sessid = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE email='$Sessemail' AND id='$Sessid'";
        $stmt = $this->connect()->query($sql);
        while($row = $stmt->fetch())
        {
            $firstname = $row['firstname'];
            $email = $row['email'];

            echo "
                <li>$firstname</li>
                <li>$email</li>
                ";
        }
    }


    function selectproinfo() {
        include "languages/config.php";
        $Sessemail = $_SESSION['email'];
        $Sessid = $_SESSION['id'];

        $sql = "SELECT * FROM users WHERE email='$Sessemail' AND id='$Sessid'";                
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch())
        {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $phone = $row['phone'];
            $image = $row['image'];
        }

        $sqljoin = "SELECT id, user_id AS userId, car_address FROM caraddress WHERE user_id=$Sessid";
        $stmt2 = $this->connect()->query($sqljoin);

            if(!isset($_POST['updateinfo']))
            {
                echo "
                <li class='box-li'>". $land['firstname'] .":
                <ul>
                    <li>$firstname</li>
                </ul>
                </li>
                <li class='box-li'>". $land['lastname'] .":
                    <ul>
                        <li>$lastname</li>
                    </ul>
                </li>
                <li class='box-li'>". $land['email'] .":
                    <ul>
                        <li>$email</li>
                    </ul>
                </li>
                <li class='box-li'>". $land['tel'] .":
                    <ul>
                        <li>$phone</li>
                    </ul>
                </li>";
            }
            else {
                echo "
                <form method='post' action=''>
                <li class='box-li'>". $land['firstname'] .":
                <ul>
                    <li>
                        <input type='text' class='editinput' name='firstname' value='$firstname'>
                    </li>
                </ul>
                </li>
                <li class='box-li'>". $land['lastname'] .":
                <ul>
                    <li>
                        <input type='text' class='editinput' name='lastname' value='$lastname'>
                    </li>
                </ul>
                </li>
                <li class='box-li'>". $land['email'] .":
                <ul>
                    <li>
                        <input type='text' class='editinput' name='email' value='$email'>
                    </li>
                </ul>
                </li>
                <li class='box-li'>". $land['tel'] .":
                <ul>
                    <li>
                        <input type='text' class='editinput' name='phone' value='$phone'>
                    </li>
                </ul>
                </li>
                ";
            }
    }

    function carLocation() {
        $Sessid = $_SESSION['id'];
        $sql = "SELECT * FROM caraddress WHERE user_id=$Sessid";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetchAll()) {
            foreach($row as $r) {
                $car_addr_id = $r['id'];
                $car_address = $r['car_address'];

                if(!(isset($_POST['changeaddr']))) {
                    echo "<li class='car-li'>$car_address</li>";
                }
                else {
                    echo "<form action='' method='POST'>
                        <ul>
                            <li class='addr-li'>
                                <form method='POST' action=''>
                                <input type='hidden' class='editcaraddr' name='car_addr_id' value='$car_addr_id'>
                                <input type='text' class='editcaraddr' name='editcaraddr' value='$car_address'>
                                    <button type='submit' class='addr-done' name='updateprocarinfo'><span><i class='fas fa-check'></i></span></button>
                                    <button type='submit' class='remove-addr' name='removeddr'><span><i class='fas fa-trash-alt'></i></span></button>
                                </form>
                            </li>
                        </ul>
                        </form>";
                }
            }   
        }
    }
    
    function updateselectcaraddrinfo() {
        if(isset($_POST['updateprocarinfo']))
        {
            $addrId = $_POST['car_addr_id'];
            $editcaraddr = htmlspecialchars($_POST['editcaraddr']);

            if(strlen($editcaraddr) > 40) {
                $addrErr = "";
            }
            else {
            $sql = "UPDATE caraddress SET car_address='$editcaraddr' WHERE id='$addrId'";
            $stmt= $this->connect()->query($sql);

            echo "<script>window.open('profile.php','_self')</script>";
        }
    }
}

    function deletecaraddrinfo() {
        if(isset($_POST['removeddr']))
        {
            $addrId = $_POST['car_addr_id'];
            $sql = "DELETE FROM caraddress WHERE id='$addrId'";
            $stmt= $this->connect()->query($sql);
        }
    }

    function addaddress() {
        include "languages/config.php";

        if(!isset($_POST['addaddress']))
        {
            echo "
            <form method='POST' action=''>
                <button type='submit' name='addaddress' class='addaddress'>".$land['addaddress']."
            </form>";
        }

        if(isset($_POST['addaddress']))
        {
            echo "
            <form action='' method='POST' class='address-form'>
                <input type='hidden' name='user_id' value='".$_SESSION['id']."'>
                <input type='text' class='addressInp' name='car_address' autofocus>
                <input type='submit' class='address-submit' name='newaddress' value='".$land['add']."'>
            </form>
            ";
        }
        if(isset($_POST['newaddress']))
            {
                $sql = "INSERT INTO caraddress (user_id, car_address) VALUES (?,?)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([
                    $user_id = $_POST['user_id'],
                    $car_address = $_POST['car_address']
                ]);
                echo "<script>window.open('profile.php','_self')</script>";
            }
        }
    

    function updateselectproinfo() {
        include "languages/config.php";
        if(isset($_POST['updateproinfo']))
        {
            $Sessid = $_SESSION['id'];
            $editfirstname = $_POST['firstname'];
            $editlastname = $_POST['lastname'];
            $editemail = $_POST['email'];
            $editphone = $_POST['phone'];
            $sql = "UPDATE users SET firstname='$editfirstname', lastname='$editlastname', 
                    email='$editemail', phone='$editphone' WHERE id=$Sessid";
            $stmt = $this->connect()->query($sql);

            if($_SESSION['email'] = $editemail)
            {
                echo "<script>alert('".$land['changemail']."')</script>";
            }
        }
    }

    // CARS

    function carinfo() {
        include "languages/config.php";
        if(isset($_POST['updatecars']))
        {
            $sql = "SELECT * FROM cars";
            $stmt = $this->connect()->query($sql);
            while($row = $stmt->fetch())
            {
                // $manufactId = $row['car_id'];
                $manufacturer = $row['cars'];
                echo "<option class='manufaccars' value='$manufacturer'>$manufacturer</option>";
            }
        
        }
        if(!isset($_POST['updatecars'])) {
            $Sessid = $_SESSION['id'];
            $sql = "SELECT car, model FROM user_car WHERE user_id='$Sessid'";
            $stmt = $this->connect()->query($sql);

            while($row = $stmt->fetch())
            {   
                $manufacturer = $row['car'];
                $model = $row['model'];

                echo "<li class='car-li'>".$land['manufacturer'].": <span>$manufacturer</span></li>
                        <li class='car-li'>".$land['model'].": <span>$model</span></li>";
            }
        }
    }

    function modelinfo() {
        if(isset($_POST['query'])) {
            $carname = $_POST['query'];
            $sql = "SELECT model FROM models WHERE car_name='$carname'";
            $stmt = $this->connect()->query($sql);

            while($row = $stmt->fetch())
            {
                $modellist = $row['model'];
                echo "<option value='$modellist'>$modellist</option>";
            }
        }
    }

    function insertcarinfo() {
        if(isset($_POST['insertcarinfo']))
        {
            $selectcar = htmlspecialchars($_POST['selectcar']);
            $selectmodel = htmlspecialchars($_POST['selectmodel']);
            if(empty($selectcar) || empty($selectmodel))
            {
                $carErr = "Fields can not be empty!";
            }
            else {
                $sql = "INSERT INTO user_car (user_id, car, model) VALUE (?,?,?)";
                $stmt = $this->connect()->prepare($sql);

                $stmt->execute([
                    $user_id = $_SESSION['id'],
                    $selectcar = htmlspecialchars($_POST['selectcar']),
                    $selectmodel = htmlspecialchars($_POST['selectmodel'])
                ]);
            }
        }
    }
}

$modeProfile = new Profile();
$modeProfile->modelinfo();