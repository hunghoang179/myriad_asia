<?php
define('ENVATO_PHASE_2', false);

// framework location
define('PE_FRAMEWORK', dirname(dirname(__FILE__)));
define('PE_THEME_META', 'pe_theme_meta');

if (defined('PE_THEME_PLUGIN_MODE')) {
    define('PE_THEME_URL', plugins_url() . "/pe-theme-framework");
} else {
    define('PE_THEME_URL', get_bloginfo("template_url"));
    define('PE_THEME_PLUGIN_MODE', false);
}

if (!defined('PE_THEME_PLUGIN')) {
    define('PE_THEME_PLUGIN', !ENVATO_PHASE_2);
}

if (!defined('PE_META_REVISIONED')) {
    define('PE_META_REVISIONED', true);
}

if (!defined('PE_SAVE_BUILDER_IN_POST_CONTENT')) {
    define('PE_SAVE_BUILDER_IN_POST_CONTENT', true);
}

define('PE_THEME_MODE', !PE_THEME_PLUGIN_MODE);

function __pe($text) {
    return $text;
}

function e__pe($text) {
    echo $text;
}

require(PE_FRAMEWORK . "/php/PeGlobal.php");

PeGlobal::$config["classPath"] = apply_filters('pe_theme_class_paths', array(
    PE_THEME_PATH . "/theme/php/PeTheme",
    PE_FRAMEWORK . "/php/PeTheme"
        ));

PeGlobal::$config["libPath"] = apply_filters('pe_theme_lib_paths', array(
    PE_FRAMEWORK . "/php/libs"
        ));

PeGlobal::init();

// instantiate the controller
if (!function_exists("peTheme")) {
    $peThemeClassName = apply_filters('pe_theme_controller_classname', 'PeTheme' . PE_THEME_NAME);

    PeGlobal::$controller = new $peThemeClassName();

    function &peTheme() {
        return PeGlobal::$controller;
    }

    peTheme()->boot();
}

if (!isset($content_width)) {
    $content_width = PeGlobal::$config["content-width"];
}

add_action("init", array(peTheme(), "init"));

if (has_action("after_switch_theme")) {
    // 3.3 and upper
    add_action("after_switch_theme", array(peTheme(), "after_switch_theme"));
} else if (is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php') {
    // below 3.3
    peTheme()->after_switch_theme('pe_theme');
}

add_action("after_setup_theme", array(peTheme(), "after_setup_theme"));
//add_action("template_redirect", array(peTheme(),"enqueueAssets"),1);
add_action("wp_enqueue_scripts", array(peTheme(), "enqueueAssets"), 1);

add_action("add_meta_boxes", array(peTheme(), "add_meta_boxes"), 10, 2);
add_action("save_post", array(peTheme(), "save_post"), 10, 2);

if (PE_THEME_MODE && PE_SAVE_BUILDER_IN_POST_CONTENT && peTheme()->options->get("builderInContent") === 'yes') {
    add_filter("wp_insert_post_data", array(peTheme(), "wp_insert_post_data_filter"), 10, 2);
}

// revision stuff
if (PE_THEME_PLUGIN && PE_META_REVISIONED) {
    add_action("save_post_revision", array(peTheme(), "save_post_revision"), 10, 2);
    add_action("admin_action_editpost", array(peTheme(), "admin_action_editpost"));
    add_action("wp_restore_post_revision", array(peTheme(), "wp_restore_post_revision"), 10, 2);
    add_filter("wp_save_post_revision_check_for_changes", array(peTheme(), "wp_save_post_revision_check_for_changes"), 10, 3);
    add_filter("_wp_post_revision_field_post_content", array(peTheme(), "_wp_post_revision_field_post_content"), 10, 4);
    add_filter("_wp_post_revision_field_post_title", array(peTheme(), "_wp_post_revision_field_post_title"), 10, 4);
    add_filter("the_preview", array(peTheme(), "the_preview_filter"), 99, 1);
}

if (PE_THEME_PLUGIN_MODE) {
    add_action("pre_post_update", array(peTheme(), "save_post"), 10, 2);
}

add_action("edit_attachment", array(peTheme(), "edit_attachment"), 10, 2);

add_action("admin_menu", array(peTheme(), "admin_menu"));
add_action("admin_init", array(peTheme(), "admin_init"));
add_action("widgets_init", array(peTheme(), "widgets_init"));
add_action("dbx_post_advanced", array(peTheme(), "dbx_post_advanced"));
add_action("sidebar_admin_setup", array(peTheme(), "sidebar_admin_setup"));

add_action("export_wp", array(peTheme(), "export_wp"));
add_action("rss2_head", array(peTheme(), "rss2_head"));

add_action("wp_ajax_nopriv_peThemeContactForm", array(peTheme(), "contactForm"));
add_action("wp_ajax_peThemeContactForm", array(peTheme(), "contactForm"));

add_action("wp_ajax_nopriv_peThemeNewsletter", array(peTheme(), "newsletter"));
add_action("wp_ajax_peThemeNewsletter", array(peTheme(), "newsletter"));



if ((defined('PE_DEBUG_THEME') || defined('PE_DEBUG_FRAMEWORK'))) {
    peTheme()->debug->init();
}
// REMOVE THE WORDPRESS UPDATE NOTIFICATION FOR ALL USERS EXCEPT SYSADMIN
global $user_login;
get_currentuserinfo();
if (!current_user_can('update_plugins')) {
    // checks to see if current user can update plugins
    add_action('init', create_function('$a', "remove_action( 'init', 'wp_version_check' );"), 2);
    add_filter('pre_option_update_core', create_function('$a', "return null;"));
}
add_filter('wpseo_use_page_analysis', '__return_false');

//action add class for category
function wmpudev_enqueue_icon_stylesheet() {
    wp_register_style('fontawesome', 'bootstrap/3.3.4/font-awesome.css');
    wp_enqueue_style('fontawesome');
}

add_action('wp_enqueue_scripts', 'wmpudev_enqueue_icon_stylesheet');

function medex__widgets_init() {
    register_sidebar(array(
        'name' => 'Show Favorite User',
        'id' => 'showfavoriteuser',
        'description' => 'Display favorite user',
        'before_widget' => '<div class="innersidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

add_action('widgets_init', 'medex__widgets_init');


add_action('pre_get_posts', 'filter_by_category');

//add breadcrumb in single page
function the_breadcrumb() {

    // Settings
    $separator = '&gt;';
    $id = 'breadcrumbs';
    $class = 'breadcrumbs';
    $home_title = 'Homepage';

    // Get the query & post information
    global $post, $wp_query;
    $category = get_the_category();

    // Build the breadcrums
    echo '<ul id="' . $id . '" class="' . $class . '">';

    // Do not display on the homepage
    if (!is_front_page()) {

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if (is_single()) {

            // Single post (Only display the first category)
            echo '<li class="item-cat item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><a class="bread-cat bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '" href="' . get_category_link($category[0]->term_id) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a></li>';
            echo '<li class="separator separator-' . $category[0]->term_id . '"> ' . $separator . ' </li>';
            echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
        } else if (is_category()) {

            // Category page
            echo '<li class="item-current item-cat-' . $category[0]->term_id . ' item-cat-' . $category[0]->category_nicename . '"><strong class="bread-current bread-cat-' . $category[0]->term_id . ' bread-cat-' . $category[0]->category_nicename . '">' . $category[0]->cat_name . '</strong></li>';
        } else if (is_page()) {

            // Standard page
            if ($post->post_parent) {

                // If child page, get parents 
                $anc = get_post_ancestors($post->ID);

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                foreach ($anc as $ancestor) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
            }
        } else if (is_tag()) {

            // Tag page
            // Get tag information
            $term_id = get_query_var('tag_id');
            $taxonomy = 'post_tag';
            $args = 'include=' . $term_id;
            $terms = get_terms($taxonomy, $args);

            // Display the tag name
            echo '<li class="item-current item-tag-' . $terms[0]->term_id . ' item-tag-' . $terms[0]->slug . '"><strong class="bread-current bread-tag-' . $terms[0]->term_id . ' bread-tag-' . $terms[0]->slug . '">' . $terms[0]->name . '</strong></li>';
        } elseif (is_day()) {

            // Day archive
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
        } else if (is_month()) {

            // Month Archive
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
        } else if (is_year()) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
        } else if (is_author()) {

            // Auhor archive
            // Get the author information
            global $author;
            $userdata = get_userdata($author);

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
        } else if (get_query_var('paged')) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">' . __('Page') . ' ' . get_query_var('paged') . '</strong></li>';
        } else if (is_search()) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
        } elseif (is_404()) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
    }

    echo '</ul>';
}

//function filter_by_category($query) {
//    if ($query->is_home() && $query->is_main_query() && isset($_GET['cat_select'])) {
//        $query->set('cat', implode(',', $_GET['cat_select']));
//    }
//}

//search multiple categories
function category_search_logic( $query ) {
    if ( ! isset( $_GET['cat'] ) )
        return $query;

    // split cat query on a space to get IDs separated by ',' in URL
    $cats = explode(',', $_GET['cat'] );

    if ( count( $cats ) > 1 ) {
        unset($_GET['cat']);
        $query->query_vars[ 'cat' ] = $cats;
    }

    return $query;
}
?>

