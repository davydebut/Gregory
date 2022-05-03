<?php
include 'partials/head.php';
require 'functions.php';
?>

<form action="index.php" method="post">
    <fieldset>
        <legend>Formulaire de connection</legend>
        <label for="pseudo">pseudo :</label>
        <input type="text" name="pseudo" placeholder="pseudo">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="connect" value="Connexion">
        <input type="image" src="" alt="">
        <!-- Button trigger modal -->
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            S'inscrire
        </button>
    </fieldset>
    <p class="thank-you" style="display:<?php if ($isSuccess) echo 'block';
                                        else echo 'none'; ?>;">Vous êtes bien inscrit !</p>
    <p class="thank-you" style="display:<?php if ($connect) echo 'block';
                                        else echo 'none'; ?>;">Vous êtes connecté <?php echo $pseudo; ?> !</p>
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulaire d'inscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post">
                    <label for="pseudo">pseudo :</label>
                    <input type="text" name="pseudo" placeholder="pseudo"><br>
                    <label for="emailInscription">Email:</label>
                    <input type="email" name="email" placeholder="email"><br>
                    <label for="passwordInscription">Mot de passe :</label>
                    <input type="password" name="password" placeholder="password"><br>
                    <input type="submit" name="submit" value="Inscription">
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<?php
include 'partials/nav.php';
$allPosts = getAllPosts();
foreach ($allPosts as $post) {
    echo '<h2>' . $post['titre'] . '</h2>';
    echo '<p>' . $post['content'] . '</p>';
    echo '<img src="' . $post['image'] . '" alt="">';
    echo '<p>' . $post['date'] . '</p>';
    echo '<p>' . $post['pseudo'] . '</p>';
    echo '<a href="single.php?id='.$post['id'].'">Voir l\'article</a>';
}
include 'partials/footer.php';

?>