<?php

$sidebar_posts = PostController::get_sidebar_posts();
$current_post = PostController::get_current_post();
render_twig('single.html', [
    'current_post' => $current_post,
    'sidebar_posts' => $sidebar_posts,
]);
?>