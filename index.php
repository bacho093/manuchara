<?php
// https://www.youtube.com/watch?v=L5uCc8Hab-I
  session_start();
  include_once "database/dbh.php";
  include "database/login.php";
  include "languages/config.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MAGISON</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="navigation/navigate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  </head>
  <body>
<?php
  include "navigation/navigate.php";
?>
    <div class="text-info">
      <h1><?php echo $land['washcar']; ?></h1>
    </div>
    <main>
      <a href="">
        <div class="sedani">
          <h2><?php echo $land['sedan']; ?></h2>
        </div>
      </a>
      <a href="">
        <div class="jipi">
          <h2><?php echo $land['jeep']; ?></h2>
        </div>
      </a>
    </main>

    <div class="social-icon">
      <a href="www.facebook.com"><i class="fab fa-facebook-f"></i></a>
      <a href="www.facebook.com"><i class="fab fa-instagram"></i></a>
      <a href="www.facebook.com"><i class="fab fa-google-plus-g"></i></a>
    </div>


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
