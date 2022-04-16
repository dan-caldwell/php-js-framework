<?php

import('/components/sidebar/SingleSidebarItem/SingleSidebarItem.php');

function SidebarArea($props) {
    ['posts' => $posts] = $props;
    ?>
        <sidebar-area>
            <?php foreach ($posts as $post) SingleSidebarItem($post); ?>
        </sidebar-area>
    <?php
}