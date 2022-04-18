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

        $turbo_src = get_template_directory_uri() . '/js/node_modules/@hotwired/turbo/dist/turbo.es2017-umd.js';
        $tailwind_src = get_template_directory_uri() . '/js/node_modules/tailwindcss/lib/index.js';
        $elements_index_src = get_template_directory_uri() . '/js/components/index.js';
        $framework_dev_src = get_template_directory_uri() . '/js/components/framework-dev.js';

        ob_start();
        ?>
        <style>
            [x-cloak] { display: none !important; }
        </style>
        <script type="module" src="<?= $turbo_src ?>"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'black-semi': 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            };
        </script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <?php
        return ob_get_clean();
    }

    function add_body() {
        ob_start();
        $this->render(); 
        return ob_get_clean();
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
                <body>
                    <?= $body ?>
                </body>
            </html>

        <?php

    }

}