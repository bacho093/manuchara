<?php

if(isset($_POST['sendmail'])) {

    $fnameErr = $subemailErr = $phoneErr = $msgErr = "";

    // Validate Firstname
    $username = trim($_POST['username']);
    if(empty($username)) {
            $fnameErr = "<p>Firstname can not be empty!</p>";
    }
    elseif(!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
            $fnameErr = "<p>Firstname must be 6-12 chars & alphanumeric</p>";
    }

    // Validate Email
    $subemail = trim($_POST['user-email']);

    if(empty($subemail)) {
            $emailErr = "<p>Email can not be empty!</p>";
    }
    elseif(!filter_var($subemail, FILTER_VALIDATE_EMAIL))
    {
            $emailErr = "<p>Email must be a valid email!</p>";
    }

    // Validate Phone Number
    $phone = trim($_POST['user-phone']);
    if(preg_match("/^[a-zA-Z-']*$/",$phone)) {
            $phoneErr = "<p>Incorrect Phone Number</p>";
    }

    // Validate Textarea
    $msg = trim(htmlspecialchars($_POST['user-msg']));
    if(empty($msg)) {
        $msgErr = "<p>Message can not be empty!</p>";
    }

    if(!($fnameErr || $subemailErr || $phoneErr || $msgErr))
    {
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
