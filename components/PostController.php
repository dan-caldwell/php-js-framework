<?php

class PostController {

    function __construct() {

    }

    static function getSidebarPosts() {
        $thumbnail_url = get_template_directory_uri() . '/thumbnail.png';
        return [
            [
                'title' => 'Post 1',
                'author' => 'Bob Jones',
                'category' => 'Blog',
                'thumbnail' => $thumbnail_url
            ],
            [
                'title' => 'Post 2',
                'author' => 'Bob Jones',
                'category' => 'Blog',
                'thumbnail' => $thumbnail_url
            ],
            [
                'title' => 'Post 3',
                'author' => 'Bob Jones',
                'category' => 'Blog',
                'thumbnail' => $thumbnail_url
            ],
            [
                'title' => 'Post 4',
                'author' => 'Bob Jones',
                'category' => 'Blog',
                'thumbnail' => $thumbnail_url
            ],
            [
                'title' => 'Post 5',
                'author' => 'Bob Jones',
                'category' => 'Blog',
                'thumbnail' => $thumbnail_url
            ]
        ];
    }

}