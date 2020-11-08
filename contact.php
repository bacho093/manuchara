<?php
    session_start();
    include_once "database/dbh.php";
    include "database/login.php";
    include "database/contact.php";
    include "languages/config.php";


    if(isset($_SESSION['user']))
    {
        $uemail = $_SESSION['email'];
        $uname = $_SESSION['user'];
    }
    else {
        $uemail = '';
        $uname = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="navigation/navigate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Contact</title>
</head>
<body>
    <?php
        include "navigation/navigate.php";
    ?>
    <section class='contact-main'>
        <h1><?php echo $land['magison']; ?></h1>
        <div class="contact-box">
            <div class="cb1">
                <p><?php echo $land['email']; ?>: gmail@gmail.com</p>
            </div>
            <div class="cb2">
                <p><?php echo $land['tel']; ?>: (+995) 555 555 555</p>
            </div>
        </div>
        <div class="contact-form">
            <h2><?php echo $land['contactus'] ?></h2>
            <form action="" method="post">
                <p>
                    <input type="text" name="username" placeholder='Name:' value="<?php echo $uname ?>">
                    <div class="error"><p><?php echo $fnameErr ?? ''; ?></p></div>
                </p>
                <p>
                    <input type="email" name="user-email" placeholder="Your Email:" value="<?php echo $uemail; ?>">
                    <div class="error"><p><?php echo $subemailErr ?? ''; ?></p></div>
                </p>
                <p>
                    <input type="text" name="user-phone" id="phone" placeholder="Phone Number">
                    <div class="error"><p><?php echo $phoneErr ?? ''; ?></p></div>
                </p>
                <p>
                    <textarea name="user-msg" placeholder="Write to us"></textarea>
                    <div class="error"><p><?php echo $msgErr ?? ''; ?></p></div>
                </p>
                <p>
                    <input type="submit" name='sendmail' value="Send">
                </p>
            </form>
        </div>
    </section>



<script src="js/cleave.min.js"></script>
<script src="js/cleave-phone.ge.js"></script>
<script src="js/phone.js"></script>
          <!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "101305325132337", // Facebook page ID
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
</body>
</html>