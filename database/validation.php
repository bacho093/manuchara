<?php
                $firstnameErr = "";
                $lastnameErr = "";
                $emailErr = "";
                $phoneErr = "";
                $emailErr = "";
                $passwordErr = "";
               
                // Validate Firstname
                $firstname = trim($_POST['firstname']);
                if(empty($firstname)) {
                        $firstnameErr = "<p>Firstname can not be empty!</p>";
                }
                elseif(!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
                        $firstnameErr = "<p>Firstname must be 6-12 chars & alphanumeric</p>";
                }

                // Validate Lastname
                $lastname = trim($_POST['lastname']);
                if(empty($lastname)) {
                        $lastnameErr = "<p>Lastname can not be empty!</p>";
                }
                elseif(!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
                        $lastnameErr = "<p>Lastname must be 6-12 chars & alphanumeric</p>";
                }
                
                // Validate Email
                $email = trim($_POST['email']);
                if(empty($email)) {
                        $emailErr = "<p>Email can not be empty!</p>";
                }
                $validSql = "SELECT * FROM users";
                $result = $conn->query($validSql);
                if($result->num_rows > 0)
                {
                        while($row = $result->fetch_assoc())
                        {
                                $validateEmail = $row['email'];
                        }
                }
                if($email == $validateEmail)
                {
                        $emailErr = "<p>Email already exist!</p>";
                }
                elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                        $emailErr = "<p>Email must be a valid email!</p>";
                }

                // Validate Phone Number
                $phone = trim($_POST['phone']);
                if(empty($phone)) {
                        $phoneErr = "<p>Phone number can not be empty!</p>";
                }
                elseif(preg_match("/^[a-zA-Z-']*$/",$phone)) {
                        $phoneErr = "<p>Incorrect Phone Number</p>";
                }
                // Validate Password
                $password = trim(md5($_POST['password']));
                $repassword = trim(md5($_POST['re-password']));

                $uppercase = preg_match('#[A-Z]#', $password);
                $lowercase = preg_match('#[a-z]#', $password);
                $number    = preg_match('#[0-9]#', $password);
                $specialChars = preg_match('#[^\w]#', $password);

                if(empty($password)) {
                        $passwordErr = "<p>Password can not be empty</p>";
                }
                if(empty($repassword)) {
                    $passwordErr = "<p>Password can not be empty</p>";
                }
                if($repassword != $password)
                {
                        $passwordErr = "<p>Passwords must be the same!</p>";
                }
                if(!($uppercase || $lowercase || $number || $specialChars || strlen($password) < 8))
                {
                        $passwordErr = "<p>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>";
                }
