<?php

include 'partials/head.php';
include 'functions.php';
$id = $_GET['id'];
// var_dump(getPostById(1));

// afficher l'article de l'id 1
$post = getPostById($id);
echo '<h2>' . $post['titre'] . '</h2>';
echo '<p>' . $post['content'] . '</p>';
echo '<img src="' . $post['image'] . '" alt="">';
echo '<p>' . $post['date'] . '</p>';
echo '<p>' . $post['pseudo'] . '</p>';


include 'partials/footer.php';