<?php
require 'connection.php';
session_start(); // On démarre la session AVANT toute enregistremenet de données
// récupération des données du formulaire
$isSuccess = false; // variable paragraphe qui modifie le style selon la connection
$connect = false;

if (isset($_POST['connect'])) { // si le formulaire a été soumis
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $db = dbconnect();
    if (empty($pseudo) || empty($password)) {
        echo 'Veuillez remplir tous les champs';
    } else {
        // verifier si le mot de passe correspond à celui enregistré en base de données
        $passwordBdd = $db->query("SELECT * FROM user WHERE pseudo = '$pseudo'")->fetch(PDO::FETCH_ASSOC);
        // var_dump($passwordBdd);
        if (!password_verify($password, $passwordBdd["password"])) {
            // si le pseudo n'existe pas
            echo '<p>Veuillez-vous inscrire en cliquant sur le bouton s\'inscrire</p>';
        } // si le pseudo existe déjà
        else {
            // echo '<p>Ce pseudo est déjà utilisé</p>';
            $connect = true;
            $_SESSION['pseudo'] = $pseudo;
        }
    }
}

if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $db = dbconnect();
    if (empty($pseudo) || empty($password) || empty($email)) {
        echo '<p>Veuillez remplir tous les champs</p>';
    } else {
    $prepare = $db->prepare("SELECT COUNT(*) AS nbre FROM user WHERE pseudo = :pseudo AND password = :password");
    $prepare->execute(['pseudo' => $pseudo, 'password' => $password]);
    $result = $prepare->fetch(PDO::FETCH_ASSOC);
    // si le pseudo n'existe pas
    if ($result['nbre'] == 0) {
        $email = $_POST['email'];
        $isSuccess = true;
        $prepare = $db->prepare("INSERT INTO user (pseudo, password, email) VALUES (:pseudo, :password, :email)");
        $prepare->execute([
            'pseudo' => $pseudo,
            'password' => $password,
            'email' => $email
        ]);
        // si le pseudo existe déjà
    } else {
        // echo '<p>Ce pseudo est déjà utilisé</p>';
        $connect = true;
        $_SESSION['pseudo'] = $pseudo;
    }
}
}

function getAllPosts()
{
    $db = dbconnect();
    $query = $db->prepare('SELECT * FROM posts INNER JOIN user ON posts.author_id = user.id');
    $query->execute();
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}

function getPostById($id)
{
    $db = dbconnect();
    $query = $db->prepare('SELECT * FROM posts INNER JOIN user ON posts.author_id = user.id WHERE posts.id = :id');
    $query->execute(['id' => $id]);
    $post = $query->fetch(PDO::FETCH_ASSOC);
    return $post;
}

// fonction ajouter un post
function addPost()
{   
    if(isset($_POST['submit'])) {
        $db = dbconnect();
        $titre = $_POST['titre'];
        $content = $_POST['content'];
        $image = $_FILES['image'];
        $date = date('Y-m-d H:i:s');
        $author_id = $_SESSION['pseudo'];
        $prepare = $db->prepare("INSERT INTO posts (titre, content, image, date, author_id) VALUES (:titre, :content, :image, :date, :author_id)");
        $prepare->execute([
            'titre' => $titre,
            'content' => $content,
            'image' => $image,
            'date' => $date,
            'author_id' => $author_id
        ]);
    }
}
