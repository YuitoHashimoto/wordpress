<?php
    function twpp_enqueue_scripts(){
        wp_enqueue_style(
            "category",
            get_template_directory_uri(). '/css/category.css',
            [],
            '1.0'
        );
        wp_enqueue_style(
            "single",
            get_template_directory_uri(). '/css/single.css',
            [],
            '1.0'
        );
        wp_enqueue_style(
            'child-single',
            get_stylesheet_directory_uri() . 'css//single-child.css',
            array('parent-style')
        );
        wp_enqueue_style(
            "page",
            get_template_directory_uri(). '/css/page.css',
            [],
            '1.0'
        );
        wp_enqueue_style(
            "contact",
            get_template_directory_uri(). '/css/contact.css',
            [],
            '1.0'
        );
        wp_enqueue_style(
            "style",
            get_stylesheet_uri(),
            [],
            '1.0'
        );
        wp_enqueue_script(
            'header-top',
            get_template_directory_uri(). '/js/header-top.js',
            array('jquery-script'),
            '1.0',
            true
        );
        wp_enqueue_script(
            'hamburger',
            get_template_directory_uri(). '/js/hamburger.js',
            array('jquery-script'),
            '1.0',
            true
        );
        wp_enqueue_script(
            'jquery-script',
            get_template_directory_uri(). '/js/jquery-3.4.1.min.js',
            array(),
            '3.4.1',
            true
        );
    }
    add_action( "wp_enqueue_scripts", "twpp_enqueue_scripts" );


    function post_has_archive($args, $post_type)
    {
        if ('post' == $post_type) {
            $args['rewrite'] = true; // リライトを有効にする
            $args['has_archive'] = 'allarticles'; // 任意のスラッグ名
        }
        return $args;
    }
    add_filter('register_post_type_args', 'post_has_archive', 10, 2);
    
    //フッターにウィジェット追加
    function twentyseventeen_widgets_init() {
        register_sidebar(
            array(
                'name'          => __( '記事詳細専用サイドバー'),
                'id'            => 'single-sidebar',
                'description'   => __( '記事詳細専用サイドバーに表示されるコンテンツ' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }
    add_action( 'widgets_init', 'twentyseventeen_widgets_init' );
    
    function get_post_number( $post_type = 'post', $op = '<=' ) {
        global $wpdb, $post;
        $post_type = is_array($post_type) ? implode("','", $post_type) : $post_type;
        $number = $wpdb->get_var("
            SELECT COUNT( * )
            FROM $wpdb->posts
            WHERE post_date {$op} '{$post->post_date}'
            AND post_status = 'publish'
            AND post_type = ('{$post_type}')
        ");
        return $number;
    }

    // アイキャッチ画像を有効化
    add_theme_support( 'post-thumbnails' );

    function custom_pagination_html( $template ) {
        $template = '
        <nav class="pagination" role="navigation">
            <h2 class="screen-reader-text">%2$s</h2>
            %3$s
        </nav>';
        return $template;
    }
    add_filter('navigation_markup_template','custom_pagination_html');
    function no_screen_reader_text($template){
        $template = '
            <nav class="navigation %1$s" role="navigation">
                <div class="nav-links">%3$s</div>
            </nav>';
    
            return $template;
        }
    add_action( 'navigation_markup_template', 'no_screen_reader_text' );
?>