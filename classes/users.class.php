<?php

class Users extends Dbh {
    function register()
    {
        $sql = "INSERT INTO users (firstname, lastname, email, phone, password) VALUE (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            $firstname = $_POST['firstname'],
            $lastname = $_POST['lastname'],
            $email = $_POST['email'],
            $phone = $_POST['phone'],
            $password = md5($_POST['password'])
        ]);
    }

    function login() {
        $user_email = $_POST['email'];
        $user_pwd = md5($_POST['password']);
        $sql = "SELECT * FROM users WHERE email='$user_email' AND password='$user_pwd'";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()) {
            $_SESSION['info'] = $row['email'];
        }
    }
}