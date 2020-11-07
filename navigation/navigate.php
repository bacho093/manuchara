<?php
      if(isset($_POST['login-submit']))
      {
        $userlist = new Users();
        $userlist->login();
      }
      if(isset($_POST['logout']))
      {
        unset($_SESSION['info']);
      }

?>
<div class="navigations">
      <nav>
        <ul class="nav-list">
          <li><a href="index.php">მთავარი</a></li>
          <li><a href="#">ჩვენ შესახებ</a></li>
          <li><a href="#">კონტაქტი</a></li>
        </ul>
        <?php
          if(isset($_SESSION['info'])){
            echo "<ul class='login-user'>
                    <li>".$_SESSION['info']."</li>
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
              <li class='auth'><a href='#'>პაროლის აღდგენა</a></li>
            </ul>
              <li>
                <form class='login' method='post'>
                  <input type='email' name='email' placeholder='Email'>
                  <input type='password' name='password' placeholder='Password'>
                  <input type='submit' name='login-submit' value='ავტორიზაცია'>
              </form>
              </li>
              <li><a href='register.php'>რეგისტრაცია</a></li>
          </ul>";
          }
        ?>
      </nav>
    </div>