<?php

function SingleSidebarItem($props) {
    [
        'title' => $title,
        'author' => $author,
        'category' => $category,
        'thumbnail' => $thumbnail,
        'date' => $date,
        'id' => $id
    ] = $props;
    
    ?>
        <single-sidebar-item ref="container" data-post-id="<?= $id ?>">
            <div ref="title"><?= $title ?></div>
            <div ref="author"><?= $author ?></div>
            <?= $category ? "<div ref='category'>{$category}</div>" : '' ?>
            <div ref="date"><?= $date ?></div>
            <?= $thumbnail ? "<img ref='thumbnail' src='{$thumbnail}'>" : '' ?>
        </single-sidebar-item>
    <?php
}