<?php
  session_start();
  include_once "includes/autoloader.inc.php";
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
      <h1>გარეცხე მანქანა სახლიდან გაუსვლელად...</h1>
    </div>
    <main>
      <a href="">
        <div class="sedani">
          <h2>სედანი</h2>
        </div>
      </a>
      <a href="">
        <div class="jipi">
          <h2>ჯიპი</h2>
        </div>
      </a>
    </main>

    <div class="social-icon">
      <a href="www.facebook.com"><i class="fab fa-facebook-f"></i></a>
      <a href="www.facebook.com"><i class="fab fa-instagram"></i></a>
      <a href="www.facebook.com"><i class="fab fa-google-plus-g"></i></a>
    </div>
  </body>
</html>
