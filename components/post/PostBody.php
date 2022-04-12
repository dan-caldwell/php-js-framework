<?php

function PostBody($props) {
    [
        'title' => $title,
        'author' => $author,
        'content' => $content
    ] = $props;

    ?>
        <post-body>
            <h1 ref="title"><?= $title ?></h1>
            <div><?= $author ?></div>
            <div><?= $content ?></div>
        </post-body>
    <?php

}