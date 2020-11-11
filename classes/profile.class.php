<?php
            
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
                </li>
";
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
                <li class='box-li'>". $land['caraddress'] .":
                <ul>
                    <li>". $_SESSION['phone'] ."</li>
                </ul>
                </li>
                    <button type='submit' class='editbtn' name='updateproinfo'>".$land['edit']."
                </form>
                </ul>";
            }
        }
    }

    function joininfo() {
        include "languages/config.php";

        $Sessid = $_SESSION['id'];  
            $sql = "SELECT caraddress.user_id, caraddress.car_address, users.id
            FROM caraddress
            JOIN users ON users.id='$Sessid' AND caraddress.user_id=users.id";
                
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch()) {
            $address = $row['car_address'];
            echo "<li class='car_addr'>$address</li>";
        }
        if(!isset($_POST['addaddress']))
        {
            echo "
            <form method='POST' action=''>
                <button type='submit' name='addaddress' class='addaddress'>".$land['addaddress']."
            </form>";
        }
    }

    function addaddress() {
        include "languages/config.php";

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
            }
        }
    

    function updateselectproinfo() {

        if(isset($_POST['updateproinfo']))
        {
            $Sessid = $_SESSION['id'];
            $editfirstname = $_POST['firstname'];
            $sql = "UPDATE users SET firstname='$editfirstname' WHERE id=$Sessid";
            $stmt = $this->connect()->query($sql);
        }
    }
}