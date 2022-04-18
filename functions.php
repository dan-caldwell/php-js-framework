<?php
// Helper function to import cleaner
function import($path) {
    require_once get_template_directory() . $path;
}

import('/vendor/autoload.php');

function render_twig($view_name, $values) {
    $loader = new \Twig\Loader\FilesystemLoader(get_template_directory() . '/templates');
    $twig = new \Twig\Environment($loader, [
        //'cache' => get_template_directory() . '/cache',
    ]);
    $turbo_src = get_template_directory_uri() . '/js/node_modules/@hotwired/turbo/dist/turbo.es2017-umd.js';
    echo $twig->render($view_name, array_merge([
        'turbo_src' => $turbo_src
    ], $values));
}


require_once get_template_directory() . '/framework/Template.php';
require_once get_template_directory() . '/controllers/PostController.php';

add_filter('rest_pre_echo_response', function($result, $rest_server, $request) {
    $route = (fn() => $this->route)->call($request);
    if (str_starts_with($route, '/php_js_theme_html')) {
        return;
    }
    return $request;
}, 10, 3);

// Return text/html content type for HTML endpoints
add_filter('rest_post_dispatch', function($result) {
    $route = (fn() => $this->matched_route)->call($result);
    if (str_starts_with($route, '/php_js_theme_html')) {
        $result->header('Content-Type', 'text/html; charset=UTF-8');
    }
    return $result;
}, 10, 4);

function get_latest_post_html() {
    $post = PostController::get_sidebar_posts([
        'num_posts' => 1
    ])[0];
    render_twig('components/ui/modal/ModalContent.html', [
        'title' => $post['title'],
        'content' => $post['content']
    ]);
    return null;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'php_js_theme_html', '/latest_post', array(
      'methods' => 'GET',
      'callback' => 'get_latest_post_html',
    ));
});