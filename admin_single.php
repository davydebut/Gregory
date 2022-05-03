<?php
include 'functions.php';
include 'partials/head.php';

?>
<!-- formulaire d'ajout d'article -->
<form action="admin_single.php" method="post">
    <fieldset>
        <legend>Formulaire d'ajout d'article</legend>
        <label for="titre">Titre :</label>
        <input type="text" name="titre" placeholder="titre">
        <label for="content">Contenu :</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <label for="image">Image :</label>
        <input type="file" name="image" placeholder="image">
        <label for="category">Catégorie :</label>
        <select name="category" id="category">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <input type="submit" name="submit" value="Ajouter l'article">
    </fieldset>
</form>
<?php
$ajouterUnPost = addPost();
var_dump($ajouterUnPost);
include 'partials/footer.php';
?>