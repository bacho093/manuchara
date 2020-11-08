<?php

        // Registration
    $sql = "INSERT INTO users (firstname, lastname, email, phone, password) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('sssss', $firstname, $lastname, $email, $phone, $password);
    $stmt->execute();

