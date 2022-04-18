<?php
import('/components/base/Button.php');

function Modal($props) {
    [
        'button_title' => $button_title,
        'modal_content' => $modal_content
    ] = $props;

    ?>

    <div x-data="{ open: false }">
        <?= Button([
            'title' => $button_title,
            'attributes' => [
                '@click="open = !open"'
            ]
        ]) ?>
        <div 
            x-show="open"
            x-cloak
            class="bg-black-semi absolute top-0 left-0 w-full h-full flex items-center justify-center"
        >
            <div 
                class="bg-white p-4 shadow-lg"
                @click.outside="open = !open"
            >
                <?= $modal_content ?>
            </div>
        </div>
    </div>

    <?php
}