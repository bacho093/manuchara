<?php
    session_start();
    include_once "includes/autoloader.inc.php";
    include "languages/config.php";

    $userprofile = new Profile();

    if(isset($_POST['updateproinfo'])) {
    $Updatevalidate = new Updatevalidate($_POST);
    $errors = $Updatevalidate->validateForm();
        if(!$errors) {
            $userprofile->updateselectproinfo();
        }
    }

    if(!isset($_SESSION['firstname']) || !isset($_SESSION['email']))
    {
        header("Location: index.php");
    }

    if(isset($_POST['logout']))
    {
      $_SESSION = [];
      header("Location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title><?php echo $land['profile']; ?></title>
</head>
<body>
    <div class="profile-navigation">
        <nav class="nav">
            <ul class="pro-list">
                <li><a href="index.php"><?php echo $land["home"]; ?></a></li>
                <li><a href="about.php"><?php echo $land['about']; ?></a></li>
                <li><a href="contact.php"><?php echo $land['contact']; ?></a></li>
            </ul>
        </nav>
    </div>

    <div class="profilepage">
        <div class="profile-wrapper">
            <div class="form-wrapper">
                <div class="container-lg">
                    <div class="top-info">
                        <div class="info">
                            <div class="profile-image">
                                <a href="profile.php">
                                    <img src="images/<?php echo $_SESSION['image']; ?>" alt="პროფილის სურათი">
                                </a>
                            </div>
                            <div class="info-list">
                                <?php
                                    $userprofile->infolist();
                                ?>
                            </div>
                        </div>
                        <div class="edit-profile">
                                <div class="logout">
                                    <form action="" method="post">
                                        <button type="submit" name="logout">Logout</button>
                                    </form>
                                </div>
                            <div class="languages">
                            <ul>
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
                            </div>
                            <div class="burger">
                                <div class="line1"></div>
                                <div class="line2"></div>
                                <div class="line3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'about')" id="defaultOpen"><?php echo $land['profile'] ?></button>
        <button class="tablinks" onclick="openCity(event, 'transaction')"><?php echo $land['transaction'] ?></button>
    </div>

<div id="about" class="tabcontent">
    <div class="boxes">
        <div class="left-box">
            <ul class='box-list'>
                <li class='box-title'><?php echo $land['info'] ?>
                    <span>
                        <form action="" method="post">
                            <button type="submit" name='updateinfo'><span><i class="fas fa-pencil-alt"></i></span></button>
                        </form>
                    </span>
                </li>
                      
                <div class="error"><p><?php echo $errors['firstname'] ?? ''; ?></p></div>
                <div class="error"><p><?php echo $errors['lastname'] ?? ''; ?></p></div>
                <div class="error"><p><?php echo $errors['email'] ?? ''; ?></p></div>
                <div class="error"><p><?php echo $errors['phone'] ?? ''; ?></p></div>

                <?php
                    $userprofile->selectproinfo();
                ?>
                <li class='box-li'><?php echo $land['caraddress']; ?>:
                <ul>
                    <?php
                        $userprofile->joininfo();
                        $userprofile->addaddress();
                    ?>
                </ul>
                </li>
                </ul>

            <!-- CAR LIST -->
            <div class='box-title carlistdiv'><?php echo $land['cars'] ?>
                <span>
                    <form action="" method="post">
                        <button type="submit" name='updatecars'><span><i class="fas fa-pencil-alt"></i></span></button>
                    </form>
                </span>
            </div>

            <ul class='box-list carList'>
                <li class='car-li'><?php echo $land['manufacturer']; ?>: <span>bmw</span></li>
                <li class='car-li'><?php echo $land['model']; ?>: <span>M6</span></li>
                <li class='car-li'><?php echo $land['color']; ?>: <span>თეთრი</span></li>
                <li class='car-li'><?php echo $land['CarNumber'];?>: <span>aa-111-aa</span></li>
            </ul>

        </div>
        <div class="right-box">
            <ul class='box-list'>
                <li class='box-title'><?php echo $land['card'] ?>
                    <span>
                        <form action="" method="post">
                            <button type="submit" name='updatecard'><span><i class="fas fa-pencil-alt"></i></span></button>
                        </form>
                    </span>
                </li>
                <li class='box-li'><?php echo $land['firstname']; ?>:
                    <ul>
                        <li>car1</li>
                    </ul>
                </li>
                <li class='box-li'><?php echo $land['lastname']; ?>:
                    <ul>
                        <li>card2</li>
                    </ul>
                </li>
            </ul>
            <ul class='box-list transaction'>
                <li class='box-title'><?php echo $land['transaction'] ?>
                    <span>
                        <form action="" method="post">
                            <button type="submit" name='updatetransac'><span><i class="fas fa-pencil-alt"></i></span></button>
                        </form>
                    </span>
                </li>
                <li class='box-li'><?php echo $land['firstname']; ?>:
                    <ul>
                        <li>car1</li>
                    </ul>
                </li>
                <li class='box-li'><?php echo $land['lastname']; ?>:
                    <ul>
                        <li>card2</li>
                    </ul>
                </li>
                <li class='box-li'><?php echo $land['lastname']; ?>:
                    <ul>
                        <li>card2</li>
                    </ul>
                </li>
                <li class='box-li'><?php echo $land['lastname']; ?>:
                    <ul>
                        <li>card2</li>
                    </ul>
                </li>
                <li class='box-li'><?php echo $land['lastname']; ?>:
                    <ul>
                        <li>card2</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- TRANSACTIONS -->
<div id="transaction" class="tabcontent">
</div>



<script src="js/script.js"></script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>