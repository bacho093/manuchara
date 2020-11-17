<?php
session_start();
include_once "includes/autoloader.inc.php";
include "languages/config.php";

if(isset($_SESSION['firstname']) || isset($_SESSION['email'])) 
{
    header("Location: index.php");
}

$users = new Users;

if(isset($_POST['register'])) {
  $validation = new Validator($_POST);
  $errors = $validation->validateForm();
  if($errors) {
    // 
  }
  else {
    $users->register();
    header("Location: index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="footer/footer.css">
    <link rel="stylesheet" href="navigation/navigate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>რეგისტრაცია</title>
</head>
<body>
<?php
  include "navigation/navigate.php";
?>
<main>
    <h1>რეგისტრაცია</h1>
    <div class="register-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="register" method="post">
            <p><input type="text" name="firstname" placeholder="<?php echo $land['firstname']; ?>"></p>
            <div class="error"><p><?php echo $errors['firstname'] ?? ''; ?></p></div>

            <p><input type="text" name="lastname" placeholder="<?php echo $land['lastname']; ?>"></p>
            <div class="error"><p><?php echo $errors['lastname'] ?? ''; ?></p></div>

            <p><input type="email" name="email" placeholder="<?php echo $land['email']; ?>"></p>
            <div class="error"><p><?php echo $errors['email'] ?? ''; ?></p></div>

            <p><input type="text" name="phone" id='phone' min="0" placeholder='(+995) 555 55 55 55'></p>
            <div class="error"><p><?php echo $errors['phone'] ?? ''; ?></p></div>

            <p><input type="password" name="password" placeholder="<?php echo $land['pass']; ?>"></p>
            <div class="error"><p><?php echo $errors['password'] ?? ''; ?></p></div>

            <p><input type="password" name="re-password" placeholder="<?php echo $land['repass']; ?>"></p>
            <div class="error"><p><?php echo $errors['re-password'] ?? ''; ?></p></div>

            <p><input type="submit" name='register' value="<?php echo $land['register']; ?>"></p>
        </form>
    </div>
</main>

<script src="js/cleave.min.js"></script>
<script src="js/cleave-phone.ge.js"></script>
<script src="js/phone.js"></script>
<script src="js/navigation.js"></script>

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

<?php
  include "footer/footer.php";
?>
</body>
</html>