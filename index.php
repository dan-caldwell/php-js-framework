<?php
require_once get_template_directory() . '/framework.php';
require_once get_template_directory() . '/components/PostController.php';
require_once get_template_directory() . '/components/SidebarElement.php';

$server_address = $_SERVER['SERVER_ADDR'];
$is_local = $server_address === '127.0.0.1';
// If we're in development mode, we can load the tailwind CDN
// If we're not in development mode, we can load the bundled Tailwind CSS

$framework_src = get_template_directory_uri() . '/js/framework.js';
$framework_head_src = get_template_directory_uri() . '/js/framework-head.js';
$turbo_src = get_template_directory_uri() . '/js/node_modules/@hotwired/turbo/dist/turbo.es2017-umd.js';
$tailwind_src = get_template_directory_uri() . '/js/node_modules/tailwindcss/lib/index.js';
$styles_src = get_template_directory_uri() . '/style.css';
$elements_index_src = get_template_directory_uri() . '/js/components/index.js';
$framework_dev_src = get_template_directory_uri() . '/js/components/framework-dev.js';

?>

<script src="<?= $framework_head_src ?>"></script>
<script type="module" src="<?= $turbo_src ?>"></script>
<script type="module" src="<?= $elements_index_src ?>"></script>
<script defer src="<?= $framework_dev_src ?>"></script>
<script src="https://cdn.tailwindcss.com"></script>
<?php

$sidebar_posts = PostController::getSidebarPosts();

ob_start();
?>
<body style="display: none">
    <?= SidebarElement([
        'posts' => $sidebar_posts
    ]) ?>
    <a href='/menu-element'>Go to menu element page</a>
<?php
$result = ob_get_clean();
// Apply data attributes to the elements
echo apply_data_attributes($result);

?>
</body>