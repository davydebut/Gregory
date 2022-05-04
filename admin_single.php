<?php
include 'functions.php';
$date = date('Y-m-d H:i:s');
$utilisateur = $_SESSION['id'];
if (isset($_POST["ajouter"])) {
    $maxSize = 500000;
    $validExtensions = array('jpg', 'jpeg', 'gif', 'png');
    if ($_FILES["image"]["error"] > 0) {
        echo "Erreur lors du transfert";
        die;
    }
    if ($_FILES["image"]["size"] > $maxSize) {
        echo "Le fichier est trop gros";
        die;
    }
    $fileName = $_FILES["image"]["name"];
    var_dump($fileName); // image.jpg
    $extensionUpload = strtolower(substr(strrchr($fileName, '.'), 1));
    var_dump($extensionUpload);
    if (!in_array($extensionUpload, $validExtensions)) {
        echo "Extension non valide";
        die;
    }
    $tmpName = $_FILES["image"]["tmp_name"];
    $uniqueName = md5(uniqid(rand(), true));
    $destination = $uniqueName . "." . $extensionUpload;
    $fileName = "uploads/" . $destination;
    $resultat = move_uploaded_file($tmpName, $fileName);

    if ($resultat) {
        echo "Transfert réussi";
    } else {
        echo "Erreur lors du transfert";
    }

    // inser into db connect pdo
    $db = dbConnect();
    $query = $db->prepare("INSERT INTO posts (titre, content, date, image, category_id) VALUES (:titre, :content, :date, :image, :category_id)");
    $query->execute([
        "titre" => $_POST["titre"],
        "content" => $_POST["content"],
        "date" => $date,
        "image" => $destination,
        "category_id" => $_POST["category"]
    ]);
}

include 'partials/head.php';
?>
<!-- formulaire d'ajout d'article -->
<form action="admin_single.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Formulaire d'ajout d'article</legend>
        <label for="titre">Titre :</label>
        <input type="text" name="titre" placeholder="titre">
        <label for="content">Contenu :</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <label for="image">Image :</label>
        <input type="file" name="image">
        <label for="category">Catégorie :</label>
        <select name="category" id="category">
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <input type="submit" name="ajouter" value="Ajouter l'article">
    </fieldset>
</form>