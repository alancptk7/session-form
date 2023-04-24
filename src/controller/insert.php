<?php

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {

    require_once '../config/connection.php';
    require_once '../models/Usuario.class.php';

    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    $username = strtolower($username);
    $email = strtolower($email);

    $user = new Usuario(null, $username, $email, $password, $conn);

    if ($user->register() == true) {
        echo json_encode(array("erro" => 0, "mensagem" => "Successfully registered!"));
        exit();
    } else {
        echo json_encode(array("erro" => 1, "mensagem" => "User or email already exists."));
    }
}