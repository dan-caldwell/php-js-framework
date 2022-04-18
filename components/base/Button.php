<?php

function Button($props) {
    [
        'title' => $title,
        'attributes' => $attributes
    ] = $props;
    ?>
        <button
            class="rounded-md bg-blue-500 p-2 text-white hover:bg-blue-700"
            <?php foreach ($attributes as $attribute) echo $attribute ?>
        >
            <?= $title ?>
        </button>
    <?php
}