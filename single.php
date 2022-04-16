<?php

import('/components/sidebar/SidebarArea.php');
import('/components/post/PostBody/PostBody.php');
import('/components/post-navigator/NextPreviousPost/NextPreviousPost.php');

class SingleTemplate extends Template {

    function __construct() {
        $this->sidebar_posts = PostController::get_sidebar_posts();
        $this->current_post = PostController::get_current_post();
    }

    function render() {

        ?>
            <div>
                <?= SidebarArea([ 'posts' => $this->sidebar_posts ]) ?>
                <?= PostBody($this->current_post) ?>
                <?= NextPreviousPost() ?>
            </div>
        <?php

    }

}
$output = new SingleTemplate();
$output->output();