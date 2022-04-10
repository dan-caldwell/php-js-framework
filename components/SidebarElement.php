<?php

function SingleSidebarItem($props) {
    [
        'title' => $title,
        'author' => $author,
        'category' => $category,
        'thumbnail' => $thumbnail,
    ] = $props;
    ?>
        <single-sidebar-item ref="container">
            <div ref="title"><?= $title ?></div>
            <div ref="author"><?= $author ?></div>
            <div ref="category"><?= $category ?></div>
            <img ref='thumbnail' data-id="<?= $id ?>" src="<?= $thumbnail ?>" />
        </single-sidebar-item>
    <?php
}

function SidebarElement($props) {
    ['posts' => $posts] = $props;
    ?>
        <sidebar-element>
            <?php foreach ($posts as $post) SingleSidebarItem($post); ?>
        </sidebar-element>
    <?php
}