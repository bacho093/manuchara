<?php

class Users extends Dbh {
    function register () {
        $sql = "INSERT INTO users (firstname, lastname, email, phone, password) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([
            $firstname = $_POST['firstname'],
            $lastname = $_POST['lastname'],
            $email = $_POST['email'],
            $phone = $_POST['phone'],
            $password = md5($_POST['password'])
        ]);
    }

    public function login() {
        $LogEmail = $_POST['email'];
        $LogPass = md5($_POST['password']);
        $sql = "SELECT * FROM users WHERE email='$LogEmail' AND password='$LogPass'";
        $stmt= $this->connect()->query($sql);

        while($row = $stmt->fetch()) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['image'] = $row['image'];
        }
    }
}