<?php

        // Login
        if(isset($_POST['login-submit']))
        {
                $userEmail = $_POST['email'];
                $userPwd = md5($_POST['password']);

                $sql = "SELECT * FROM users WHERE email='$userEmail' AND password='$userPwd'";
                $stmt = $conn->query($sql);

                if($stmt->num_rows > 0) {
                        while($row = $stmt->fetch_assoc())
                        {
                                $_SESSION['user'] = $row['firstname'];
                                $_SESSION['email'] = $row['email'];
                        }
                }
        }