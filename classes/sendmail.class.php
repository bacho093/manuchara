<?php

class Sendmail extends Dbh {
    public function __construct() {
        $name = trim($_POST['username']);
        $phone = trim($_POST['user-phone']);
        $mailFrom = trim($_POST['user-email']);
        $msg = trim(htmlspecialchars($_POST['user-msg']));
        
        $mailTo = "bacho093@gmail.com";
        $header = $name;
        $txt = "თქვენ მიიღეთ წერილი " . $name . "_სგან" . ".\n\n";
        $txt .= "მობილურის ნომერია: " . $phone . ".\n\n" . "წერილი: " . $msg;
        
        mail($mailTo,$header,$txt,$mailFrom);
        echo "<script>alert('Your email has been successfully sent.')</script>";
    }
}


