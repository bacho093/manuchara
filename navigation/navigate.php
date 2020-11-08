<?php
  include "database/login.php";
  if(isset($_POST['logout']))
  {
    unset($_SESSION['user']);
    unset($_SESSION['email']);
    unset($_SESSION['firstname']);
  }
?>
<div class="navigations">
      <nav>
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
          if(isset($_SESSION['user'])){
            echo "<ul class='login-user'>
                    <li>".$_SESSION['user']."</li>
                    <li><a href='profile'>ჩემი გვერდი</a></li>
                    <li><a href='profile'>ჯავშანი</a></li>
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
                <form class='login' method='post'>
                  <input type='email' name='email' placeholder='Email'>
                  <input type='password' name='password' placeholder='Password'>
                  <input type='submit' name='login-submit' value='".$land['signin']."'>
              </form>
              </li>
              <li><a href='register.php'>".$land['register']."</a></li>
          </ul>";
          }
        ?>
      </nav>
    </div>