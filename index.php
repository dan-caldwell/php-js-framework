<?php
$sidebar_posts = PostController::getSidebarPosts();

ob_start();
?>
<body style="display: none">
<?php
$result = ob_get_clean();
// Apply data attributes to the elements
echo apply_data_attributes($result);

?>
</body>