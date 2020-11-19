<?php

class Admininfo extends Dbh {
    function userInfo() {
        $userId = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id='$userId'";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()) {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $phone = $row['phone'];

            echo "
            <tr>
            <th>სახელი</th>
            <th>გვარი</th>
            <th>მეილი</th>
            <th>ნომერი</th>
            <th>სტატუსი</th>
            </tr>
            
            <tr class='user-tr'>
            <td>$firstname</td>
            <td>$lastname</td>
            <td>$email</td>
            <td>$phone</td>
            <td>status</td>
            </tr>";
        }
    }
    function userCar() {
        $userId = $_GET['id'];
        $sql = "SELECT * FROM user_car WHERE user_id='$userId'";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch())
        {
            $car = $row['car'];
            $model = $row['model'];
            $color = $row['color'];
            $vehicle_num = $row['vehicle_num'];

            echo "
            <tr class='user-tr2'>
                <td class='user-td'>ავტომობილი: <span style='color: orangered'>$car</span></td>
                <td class='user-td'>მოდელი: $model</td>
                <td class='user-td'>ფერი: $color</td>
                <td class='user-td'>ავტომობილის ნომერი: $vehicle_num</td>
            </tr>";
        }
    }
    function usercaraddr() {
        $userId = $_GET['id'];
        $sql = "SELECT * FROM caraddress WHERE user_id='$userId'";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()) {
            $carAddr = $row['car_address'];

            echo "
            <tr class='user-tr2'>
                <td class='user-td' style='background: #fff'>მისამართი:  $carAddr</td>
            </tr>";
        }
    }
}