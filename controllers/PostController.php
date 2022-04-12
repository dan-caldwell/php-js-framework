<?php

class PostController {

    static function get_sidebar_posts() {
        $query = new WP_Query([
            'posts_per_page' => 5
        ]);
        if ($query->have_posts()) {
            return array_map(function($post) {
                return [
                    'title' => $post->post_title,
                    'author' => get_the_author_meta('display_name', $post->post_author),
                    'category' => get_the_category($post->ID)[0]->name,
                    'thumbnail' => get_the_post_thumbnail_url($post->ID, 'thumbnail'),
                    'date' => get_the_date('F j, Y', $post->ID),
                    'link' => $post->guid,
                    'id' => $post->ID
                ];
            }, $query->posts);
        }
        return [];
    }

    static function get_current_post() {
        return [
            'title' => get_the_title(),
            'author' =>  get_the_author(),
            'content' => get_the_content()
        ];
    }

}