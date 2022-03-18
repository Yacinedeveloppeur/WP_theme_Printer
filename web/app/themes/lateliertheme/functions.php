<?php

require_once('walker/CommentWalker.php');

function lateliertheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('html5');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer-1', 'Pied de page (Emplacement 1)');
    register_nav_menu('footer-2', 'Pied de page (Emplacement 2)');
    add_image_size('post-thumbnail', 350, 215, true);
}

function lateliertheme_register_assets()
{
    wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', []);
    wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', [], false, true);
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', [], false, true);
    wp_register_style('autoComplete', 'https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.6/dist/css/autoComplete.min.css', []);
    wp_register_script('autoComplete', 'https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.6/dist/autoComplete.min.js', [], false, true);
    wp_register_style('tinySlider', "https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css", []);
    wp_register_script('tinySlider', "https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js", [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
    if (is_front_page()) {
        wp_enqueue_style('autoComplete');
        wp_enqueue_script('autoComplete');
        wp_enqueue_style('tinySlider');
        wp_enqueue_script('tinySlider');
        wp_enqueue_script('data', get_template_directory_uri() . '/js/data.js', array(), '1.0', true);
        wp_enqueue_script('helpForm', get_template_directory_uri() . '/js/helpForm.js', array('data'), '1.0', true);
        wp_enqueue_script('autoCompleteJS', get_template_directory_uri() . '/js/autoComplete.js', array('data'), '1.0', true);
        wp_enqueue_script('slider', get_template_directory_uri() . '/js/slider.js', array(), '1.0', true);
    }
    wp_enqueue_script('header', get_template_directory_uri() . '/js/header.js', array(), '1.0', true);
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('sass', get_template_directory_uri() . '/sass.min.css', array(), '1.0');
}

function lateliertheme_title_separator()
{
    return '|';
}

function lateliertheme_pagination()
{
    $pages = paginate_links(['type' => 'array']);
    if ($pages === null) {
        return;
    }
    echo '<nav aria-label="Pagination my-4">';
    echo '<ul class="pagination">';
    foreach ($pages as $page) {
        $active = strpos($page, 'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class .= ' active';
        }
        echo '<li class="' . $class . '">';
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }
    echo '</nav>';
}

add_action('after_setup_theme', 'lateliertheme_supports');
add_action('wp_enqueue_scripts', 'lateliertheme_register_assets');
add_filter('document_title_separator', 'lateliertheme_title_separator');


// **********************MENU***********************



function lateliertheme_wp_nav_menu_items($items, $args)
{
    $menu = wp_get_nav_menu_object($args->menu);
    // modify primary only
    if ($args->theme_location == 'header') {
        $bg_section_1 = get_field('background_section_1');
        // vars
        $logo = get_field('logo', $menu);
        // prepend logo
        $html_logo = '<a navbar-brand href="' . home_url() . '">
        <div class="header-logo" style="-webkit-mask: url(' . $logo['url'] . ') center/contain;   mask: url(' . $logo['url'] . ') center/contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat"> </div>
        </a>';
        // append html
        $items =  $html_logo . '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>' . '<div class="collapse navbar-collapse" id="navbarCollapse"><ul class="navbar-nav ml-auto">' . $items . '</ul></div>';
    } elseif ($args->theme_location == 'footer-1') {
        // vars
        $logo = get_field('logo', $menu);
        $text = get_field('text', $menu);
        // prepend logo
        $html_logo = '<img src="' . $logo['url'] . '" alt="' . $logo['alt'] . '" />';
        // prepend text
        $html_text = '<p>' . $text . '</p>';
        // append html
        $items = '<div class="footer-1-logo-container">' . $html_logo . $html_text . '</div>' . '<div class="footer-1-nav-links-container">' . $items . '</div>';
    } elseif ($args->theme_location == 'footer-2') {
        // vars
        $logo = get_field('logo', $menu);
        $text = get_field('text', $menu);
        // prepend logo
        $html_logo = '<img src="' . $logo['url'] . '" alt="' . $logo['alt'] . '" />';
        // append style
        $html_text = '<p>' . $text . '</p>';
        // append html
        $items = '<div class="footer-2-logo-container">' . $html_logo . $html_text .  '<div>' . $items . '</div>' . '</div>';
    }
    // return
    return $items;
}



function lateliertheme_menu_class($classes)
{
    $classes[] = '';
    return $classes;
}

function lateliertheme_menu_link_class($attrs)
{
    $attrs['class'] = 'nav-item nav-item-link';
    return $attrs;
}


add_filter('nav_menu_css_class', 'lateliertheme_menu_class');
add_filter('nav_menu_link_attributes', 'lateliertheme_menu_link_class');
add_filter('wp_nav_menu_items', 'lateliertheme_wp_nav_menu_items', 10, 2);

add_action('after_switch_theme', 'flush_rewrite_rules');
add_action('switch_theme', 'flush_rewrite_rules');

// https://developer.wordpress.org/apis/handbook/internationalization/
add_action('after_setup_theme', function () {
    load_theme_textdomain('lateliertheme', get_template_directory() . '/languages');
});


add_action(
    'rest_api_init',
    function () {
        register_rest_route(
            'lateliertheme/v1',
            '/demo/(?P<id>\d+)',
            [
                'method' => 'GET',
                'callback' => function (WP_REST_Request $request) {
                    $postID = (int)$request->get_param('id');
                    $post = get_post($postID);
                    if ($post === null) {
                        return new WP_Error('rien', 'Nous n\'avons rien à dire', ['status' => 404]);
                    }
                    return $post->post_title;
                },
                'permission_callback' => function () {
                    return current_user_can('edit_posts');
                }
            ]
        );
    }
);


add_filter('rest_authentication_errors', function ($result) {
    if (true === $result || is_wp_error($result)) {
        return $result;
    }
    /** @var WP $wp */
    global $wp;
    if (strpos($wp->query_vars['rest_route'], 'lateliertheme/v1') !== false) {
        return true;
    }
    return $result;
}, 9);



add_filter(
    'block_categories',
    function ($categories) {
        $categories[] = [
            'slug' => 'theme',
            'title' => 'Theme',
            'icon' => null
        ];
        return $categories;
    }
);


if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type(
            [
                'name' => 'recent_posts',
                'title' => 'Derniers articles',
                'icon' => 'media-document',
                'render_template' => 'blocs/recent_posts.php',
                'enqueue_style' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
                'category' => 'theme',
                'supports' => [
                    'align' => false,
                    'mode' => true,
                    'multiple' => false,
                ]
            ],

        );
        acf_register_block_type(
            [
                'name' => 'question_list',
                'title' => 'Liste de questions',
                'icon' => 'list-view',
                'render_template' => 'blocs/question_list.php',
                'enqueue_style' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
                'category' => 'theme',
                'supports' => [
                    'align' => false,
                    'mode' => true,
                    'multiple' => false,
                ]
            ],

        );
    });
};



/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
    while (@ob_end_flush());
});




// Fix issue : "Update to WP 5.9.1 breaks media selection"

function acf_filter_rest_api_preload_paths( $preload_paths ) {
	global $post;
	$rest_path    = rest_get_route_for_post( $post );
	$remove_paths = array(
		add_query_arg( 'context', 'edit', $rest_path ),
		sprintf( '%s/autosaves?context=edit', $rest_path ),
	);

	return array_filter(
		$preload_paths,
		function( $url ) use ( $remove_paths ) {
			return ! in_array( $url, $remove_paths, true );
		}
	);
}
add_filter( 'block_editor_rest_api_preload_paths', 'acf_filter_rest_api_preload_paths', 10, 1 );