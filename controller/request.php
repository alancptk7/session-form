<?php

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {

    require '../model/connection.php';
    require '../class/Usuario.class.php';

    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    $username = strtolower($username);

    $user = new Usuario(null, $username, null, $password);

    if ($user->login() == true) {
        echo json_encode(array("erro" => 0, "mensagem" => "Login successful!"));
    } else {
        echo json_encode(array("erro" => 1, "mensagem" => "Incorrect username or password."));
    }
}
?>