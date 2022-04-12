<?php

// Helper function to import cleaner
function import($path) {
    require_once get_template_directory() . $path;
}

require_once get_template_directory() . '/framework/Template.php';
require_once get_template_directory() . '/framework/framework.php';
require_once get_template_directory() . '/controllers/PostController.php';