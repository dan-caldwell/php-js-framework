<?php

import('/components/sidebar/SidebarArea.php');
import('/components/post/PostBody.php');

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
            </div>
        <?php

    }

}
$output = new SingleTemplate();
$output->output();