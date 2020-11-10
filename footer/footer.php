<section class="footer">
    <div class="container-sm">
        <div class="wrapper">
            <div class="logo">
                <a href="index.php"><?php echo $land['magison']; ?></a>
            </div>
            <div class="footer-list">
                <ul>
                    <?php
                        if(isset($_SESSION['user'])) {
                            $booking = "<li><a href='bookin.php'> " . $land['booking'] . " </a></li>";
                        }
                        else {
                            $booking = "";
                        }
                    ?>
                    <?php echo $booking; ?>
                    <li><a href="contact.php"><?php echo $land['contact'] ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>