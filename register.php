<?php
session_start();
  include_once "includes/autoloader.inc.php";


  if(isset($_POST['register'])) {
    $validation = new Validator($_POST);
    $errors = $validation->validateForm();
    if($errors) {
        // 
    }
    else {
        $users = new Users;
        $users->register();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/register.css">
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
            <p><input type="text" name="firstname" placeholder="სახელი"></p>
            <div class="error"><p><?php echo $errors['firstname'] ?? ''; ?></p></div>

            <p><input type="text" name="lastname" placeholder="გვარი"></p>
            <div class="error"><p><?php echo $errors['lastname'] ?? ''; ?></p></div>

            <p><input type="email" name="email" placeholder="მეილი"></p>
            <div class="error"><p><?php echo $errors['email'] ?? ''; ?></p></div>

            <p><input type="text" name="phone" id='phone' min="0" value='+995'></p>
            <div class="error"><p><?php echo $errors['phone'] ?? ''; ?></p></div>

            <p><input type="password" name="password" placeholder="პაროლი"></p>
            <div class="error"><p><?php echo $errors['password'] ?? ''; ?></p></div>

            <p><input type="password" name="re-password" placeholder="გაიმეორეთ პაროლი"></p>
            <div class="error"><p><?php echo $errors['re-password'] ?? ''; ?></p></div>

            <p><input type="submit" name='register' value="რეგისტრაცია"></p>
        </form>
    </div>
</main>

<script src="js/cleave.min.js"></script>
<script src="js/cleave-phone.ge.js"></script>
<script src="js/phone.js"></script>
</body>
</html>