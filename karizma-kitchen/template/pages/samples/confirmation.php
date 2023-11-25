<?php

$user_id = $_GET['id'];
$token = $_GET['token'];
require 'db.php';

$req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$req->execute([$user_id]);
$user = $req->fetch();
session_start();
if ($user && $user->confirmation_token == $token) {
    
    $updateReq = $pdo->prepare('UPDATE user SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?');
    if ($updateReq->execute([$user_id])) {
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success']="Votre authenticité a bien été vérifié" ;
        header('Location: account1.php');
        exit(); 
    } else {
        die('Update failed');
    }
} else {
    $_SESSION['flash']['danger']="Ce token n'est plus valide" ;
    header('Location: login.php');
    
}
?>