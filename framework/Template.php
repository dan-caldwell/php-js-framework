<?php

class Template {

    function output() {
        $this->html_page_wrapper([
            'head' => $this->add_head(),
            'body' => $this->add_body()
        ]);
    }

    // Add items to the head
    function add_head() {
        // If we're in development mode, we can load the tailwind CDN
        // If we're not in development mode, we can load the bundled Tailwind CSS
        $server_address = $_SERVER['SERVER_ADDR'];
        $is_local = $server_address === '127.0.0.1';

        $framework_src = get_template_directory_uri() . '/js/framework.js';
        $framework_head_src = get_template_directory_uri() . '/js/framework-head.js';
        $turbo_src = get_template_directory_uri() . '/js/node_modules/@hotwired/turbo/dist/turbo.es2017-umd.js';
        $tailwind_src = get_template_directory_uri() . '/js/node_modules/tailwindcss/lib/index.js';
        $styles_src = get_template_directory_uri() . '/style.css';
        $elements_index_src = get_template_directory_uri() . '/js/components/index.js';
        $framework_dev_src = get_template_directory_uri() . '/js/components/framework-dev.js';

        ob_start();
        ?>

        <script src="<?= $framework_head_src ?>"></script>
        <script type="module" src="<?= $turbo_src ?>"></script>
        <script type="module" src="<?= $elements_index_src ?>"></script>
        <script defer src="<?= $framework_dev_src ?>"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        
        <?php
        return ob_get_clean();
    }

    function add_body() {
        ob_start();
        $this->render();
        $output = ob_get_clean();
        return apply_data_attributes($output);
    }

    function html_page_wrapper($props) {
        [
            'head' => $head,
            'body' => $body
        ] = $props;

        ?>

            <html>
                <head>
                    <?= $head ?>
                </head>
                <body style="display: none;">
                    <?= $body ?>
                </body>
            </html>

        <?php

    }

}