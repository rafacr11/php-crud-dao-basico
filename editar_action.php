<?php
require 'config.php';
require 'dao/UsuarioDAOMySQL.php';

$usuarioDAO = new UsuarioDAOMySQL($pdo);

$id = filter_input(INPUT_POST,'id');
$name =  filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);

if($name && $email && $id){

    $usuario = $usuarioDAO->findById($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);

    $usuarioDAO->update($usuario);

    header('Location:index.php');
    exit;

} else {
    header("Location: editar.php?id=".$id);
    exit;
}