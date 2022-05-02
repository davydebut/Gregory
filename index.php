<?php

$db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
// récupération des données du formulaire
if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
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

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <fieldset>
            <legend>Formulaire d'inscription</legend>
            <label for="pseudo">pseudo :</label>
            <input type="text" name="pseudo" placeholder="pseudo">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="submit" value="Connexion">
            <input type="image" src="img/wordpress-module.png" alt="">
        </fieldset>
    </form>
</body>

</html>