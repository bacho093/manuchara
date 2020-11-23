<?php

include "dbh.class.php";

class Search extends Dbh {
    function ajaxsearch() {
        if(isset($_POST['query'])) {
            $srch = $_POST['query'];
            $sel = $_POST['sel'];
            $sql = "SELECT * FROM users WHERE $sel LIKE '%$srch%'";
            $stmt = $this->connect()->query($sql);

            while($row = $stmt->fetch())
            {
                $name = $row['username'];
                $email = $row['email'];

                echo "<div id='result'>
                        <p>$name</p>
                        <p>$email</p>
                    </div>";
            }
            echo "<div class='prev'>prev</div>
            <div class='next'>next</div>";
        }
        else {
            // PAGINATION


            // END PAGINATION

            $sql = "SELECT * FROM users ORDER BY id ASC LIMIT 0,2";
            $stmt = $this->connect()->query($sql);

            while($row = $stmt->fetch())
            {
                $name = $row['username'];
                $email = $row['email'];

                echo "<div id='result'>
                        <p>$name</p>
                        <p>$email</p>
                    </div>";
            }
            echo "<div class='pagination'>
                    <a href='?=prev' class='prev'>prev</a>
                    <a href='?=next' class='next'>next</a>
                </div>";
        }
    }
}

$sr = new Search();
$sr->ajaxsearch();