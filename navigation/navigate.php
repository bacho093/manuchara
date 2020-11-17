<?php
  // include "database/login.php";
  $users = new Users();
  if(isset($_POST['login-submit']))
  {
    $users->login();
  }

  if(isset($_POST['logout']))
  {
    unset($_SESSION['firstname']);
    unset($_SESSION['email']);
  }
?>
<div class="navigations">
      <nav>
      <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
      </div>
        <ul class="nav-list">
          <li><a href="index.php"><?php echo $land["home"]; ?></a></li>
          <li><a href="about.php"><?php echo $land['about']; ?></a></li>
          <li><a href="contact.php"><?php echo $land['contact']; ?></a></li>
          
                <?php
                    if(!isset($_SESSION['lang'])) {
                        echo "<li class='lang'><a href='?lang=EN'>EN</a>";
                    }
                    else {
                        if(isset($_SESSION['lang'])) {
                            if($_SESSION['lang'] == 'ge')
                            {
                                echo "<li class='lang'><a href='?lang=en'>EN</a>";
                            }
                            else {
                                echo "<li class='lang'><a href='?lang=ge'>GE</a></li>";
                            }
                        }
                    }
                ?>
        </ul>
        <?php
          if(isset($_SESSION['firstname'])){
            echo "<ul class='login-user'>
                    <li>".$_SESSION['firstname']."</li>
                    <li><a href='profile.php'> " . $land['profile'] . "</a></li>
                    <li><a href='booking.php'>" . $land['booking'] . "</a></li>
                    <li>
                      <form class='logout' method='post'>
                        <button type='submit' name='logout'><i class='fas fa-sign-out-alt'></i></button>
                      </form>
                    </li>
                  </ul>";
          }
          else {
            echo "<ul class='social-media'>
            <ul>
              <li class='auth'><a href='#'>".$land['forgpass']."</a></li>
            </ul>
              <li>
              <div class='form-wrapper'>
              <button id='closeuarea'><i class='fas fa-times'></i></button>

                <form class='login' method='post'>
                  <input type='email' name='email' placeholder='Email' autofocus>
                  <input type='password' name='password' placeholder='Password'>
                  <input type='submit' name='login-submit' value='".$land['signin']."'>
                </form>
              </div>
              </li>
              <li class='registerbtn'><a href='register.php'>".$land['register']."</a></li>
          </ul>";
          }
        ?>
        <div class="user-area">
          <?php if(!isset($_SESSION['email'])) :?>

            <p><?php echo $land['userarea'] ?> <i class="fas fa-layer-group"></i></p>

          <?php endif; ?>
          <?php if(isset($_SESSION['email'])) :?>

            <p><a href="profile.php"><?php echo $land['userarea'] ?> <i class="fas fa-layer-group"></i></a></p>

          <?php endif; ?>
        </div>
      </nav>
    </div>