<?php

include 'functions.php';
$posts = getAllPosts();
include 'partials/head.php';
// $id = $_GET['id'];
// var_dump($posts);
// var_dump(getPostById(1));
// $db = dbConnect();
// $query = $db->prepare('SELECT image FROM posts');
// $query->execute();
// $posts = $query->fetchAll(PDO::FETCH_ASSOC);
// echo '<img src="uploads/' . $posts[0]['image'] . '" alt="">';

// afficher les posts
foreach ($posts as $post) {
    // var_dump($post[0]['image']);
    // echo '<h2>' . $post['titre'] . '</h2>';
    // echo '<p>' . $post['content'] . '</p>';
    echo '<img src="uploads/' . $post['image'] . '" alt="">';
    // echo '<p>' . $post['date'] . '</p>';
    // echo '<p>' . $post['pseudo'] . '</p>';
}

include 'partials/footer.php';