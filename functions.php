<?php
require 'connection.php';
// récupération des données du formulaire
if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $db = dbconnect();
    // prepare la requête
    $query = $db->prepare('SELECT * FROM user WHERE pseudo = :pseudo AND password = :password');
    $user = $query->fetch(PDO::FETCH_ASSOC);
    // var_dump($user);
    $query = $db->prepare('INSERT INTO user (pseudo, password) VALUES (:pseudo, :password)');
    $query->execute(array(
        'pseudo' => $pseudo,
        'password' => $password
    ));
}

function getAllPosts()
{
    $db = dbconnect();
    $query = $db->prepare('SELECT * FROM posts');
    $query->execute();
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}