<?php

include 'partials/head.php';
include 'functions.php';

?>

<form action="index.php" method="post">
    <fieldset>
        <legend>Formulaire d'inscription</legend>
        <label for="pseudo">pseudo :</label>
        <input type="text" name="pseudo" placeholder="pseudo">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="submit" value="Connexion">
        <input type="image" src="" alt="">
    </fieldset>
</form>

<?php

$allPosts = getAllPosts();
foreach ($allPosts as $post) {
    echo '<h2>' . $post['titre'] . '</h2>';
    echo '<p>' . $post['content'] . '</p>';
}

include 'partials/footer.php';

?>