<?php
include "dbh.class.php";

class Booking extends Dbh {
    function book() {


        if(isset($_POST['booknow']))
        {
            $date = $_POST['date'];
            $time = $_POST['time'];
            $date_old = "$date $time"; 
            //Date for database
            $date_for_database = date ('d-m-Y H:i:s', strtotime($date_old));

            $sql = "INSERT INTO booking (booking) VALUE (?)";
            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([
                $booking = $date_for_database
            ]);
        }

    }

    function slot() {
        if(isset($_POST['query']))
        {
            $sql = "SELECT slot FROM time_slot";
            $stmt = $this->connect()->query($sql);

            while($row = $stmt->fetch())
            {
                $slot = $row['slot'];
                $book = $row['booking'];
                echo "<option value='$slot'>$slot</option>";
            }
        }
    }
}

$booklist = new Booking();
$booklist->slot();
