<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
add_theme_support( 'woocommerce' );
global $content_width;
if ( !isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
}
add_action( 'admin_notices', 'blankslate_notice' );
function blankslate_notice() {
$user_id = get_current_user_id();
$admin_url = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$param = ( count( $_GET ) ) ? '&' : '?';
if ( !get_user_meta( $user_id, 'blankslate_notice_dismissed_8' ) && current_user_can( 'manage_options' ) )
echo '<div class="notice notice-info"><p><a href="' . esc_url( $admin_url ), esc_html( $param ) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__( 'Ⓧ', 'blankslate' ) . '</big></a>' . wp_kses_post( __( '<big><strong>📝 Thank you for using BlankSlate!</strong></big>', 'blankslate' ) ) . '<br /><br /><a href="https://wordpress.org/support/theme/blankslate/reviews/#new-post" class="button-primary" target="_blank">' . esc_html__( 'Review', 'blankslate' ) . '</a> <a href="https://github.com/tidythemes/blankslate/issues" class="button-primary" target="_blank">' . esc_html__( 'Feature Requests & Support', 'blankslate' ) . '</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">' . esc_html__( 'Donate', 'blankslate' ) . '</a></p></div>';
}
add_action( 'admin_init', 'blankslate_notice_dismissed' );
function blankslate_notice_dismissed() {
$user_id = get_current_user_id();
if ( isset( $_GET['dismiss'] ) )
add_user_meta( $user_id, 'blankslate_notice_dismissed_8', 'true', true );
}
add_action( 'wp_enqueue_scripts', 'blankslate_enqueue' );
function blankslate_enqueue() {
wp_enqueue_style( 'blankslate-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'blankslate_footer' );
function blankslate_footer() {
?>
<script>
    jQuery(document).ready(function ($) {
        var deviceAgent = navigator.userAgent.toLowerCase();
        if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
            $("html").addClass("ios");
            $("html").addClass("mobile");
        }
        if (deviceAgent.match(/(Android)/)) {
            $("html").addClass("android");
            $("html").addClass("mobile");
        }
        if (navigator.userAgent.search("MSIE") >= 0) {
            $("html").addClass("ie");
        } else if (navigator.userAgent.search("Chrome") >= 0) {
            $("html").addClass("chrome");
        } else if (navigator.userAgent.search("Firefox") >= 0) {
            $("html").addClass("firefox");
        } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
            $("html").addClass("safari");
        } else if (navigator.userAgent.search("Opera") >= 0) {
            $("html").addClass("opera");
        }
    });
</script>
<?php
}
add_filter( 'document_title_separator', 'blankslate_document_title_separator' );
function blankslate_document_title_separator( $sep ) {
$sep = esc_html( '|' );
return $sep;
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return esc_html( '...' );
} else {
return wp_kses_post( $title );
}
}
function blankslate_schema_type() {
$schema = 'https://schema.org/';
if ( is_single() ) {
$type = "Article";
} elseif ( is_author() ) {
$type = 'ProfilePage';
} elseif ( is_search() ) {
$type = 'SearchResultsPage';
} else {
$type = 'WebPage';
}
echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}
add_filter( 'nav_menu_link_attributes', 'blankslate_schema_url', 10 );
function blankslate_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'blankslate_wp_body_open' ) ) {
function blankslate_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'blankslate_skip_link', 5 );
function blankslate_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'blankslate' ) . '</a>';
}
add_filter( 'the_content_more_link', 'blankslate_read_more_link' );
function blankslate_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'blankslate' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'excerpt_more', 'blankslate_excerpt_read_more_link' );
function blankslate_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'blankslate' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'blankslate_image_insert_override' );
function blankslate_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
unset( $sizes['1536x1536'] );
unset( $sizes['2048x2048'] );
return $sizes;
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'blankslate_pingback_header' );
function blankslate_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function blankslate_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?>
</li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comment_count', 0 );
function blankslate_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}


/* Configuración personalizada del tema */
function theme_settings($wp_customize)
{
    /* Sección de redes sociales */
    $wp_customize->add_section('redes_sociales_section', [
        'title' => 'Redes sociales',
    ]);

    /* Configuración y control de Instagram */
    $wp_customize->add_setting('instagram_setting', [
        'default' => '',
    ]);
    $wp_customize->add_control('instagram_control', [
        'type' => 'text',
        'label' => 'Instagram',
        'section' => 'redes_sociales_section',
        'settings' => 'instagram_setting',
    ]);

    /* Configuración y control de Facebook */
    $wp_customize->add_setting('facebook_setting', [
        'default' => '',
    ]);
    $wp_customize->add_control('facebook_control', [
        'type' => 'text',
        'label' => 'Facebook',
        'section' => 'redes_sociales_section',
        'settings' => 'facebook_setting',
    ]);

    /* Configuración y control de Twitter */
    $wp_customize->add_setting('twitter_setting', [
        'default' => '',
    ]);
    $wp_customize->add_control('twitter_control', [
        'type' => 'text',
        'label' => 'Twitter',
        'section' => 'redes_sociales_section',
        'settings' => 'twitter_setting',
    ]);

    /* Configuración y control de YouTube */
    $wp_customize->add_setting('youtube_setting', [
        'default' => '',
    ]);
    $wp_customize->add_control('youtube_control', [
        'type' => 'text',
        'label' => 'YouTube',
        'section' => 'redes_sociales_section',
        'settings' => 'youtube_setting',
    ]);
}

/* Enlace la función a la acción customize_register */
add_action('customize_register', 'theme_settings');


/* Hook the function to the customize_register action */
add_action('customize_register', 'theme_settings');


/* Disable Emojis */
add_filter('option_use_smilies', '__return_false');

/* Custom palette */
function add_custom_gutenberg_color_palette()
{
    add_theme_support('disable-custom-colors');

    add_theme_support('editor-color-palette', [
        [
            'name' => __('White', 'giosviews'),
            'slug' => 'white',
            'color' => '#ffff',
        ],
        [
            'name' => __('Lightergrey', 'giosviews'),
            'slug' => 'lightergrey',
            'color' => '#f4f4f4',
        ],
        [
            'name' => __('Lightgrey', 'giosviews'),
            'slug' => 'lightgrey',
            'color' => '#cccccc',
        ],
        [
            'name' => __('Grey', 'giosviews'),
            'slug' => 'grey',
            'color' => '#7e7e7e',
        ],
        [
            'name' => __('Black', 'giosviews'),
            'slug' => 'black',
            'color' => '#1D252C',
        ],
        [
            'name' => __('Red', 'giosviews'),
            'slug' => 'red',
            'color' => '#DE4B3C',
        ],
    ]);
}
add_action('after_setup_theme', 'add_custom_gutenberg_color_palette');

/* Custom Enqueues */
function customjs() {

	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/lib/slick/slick.css' );
    
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/lib/slick/slick.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'functions', get_template_directory_uri() . '/js/functions.js', array(), '1.0.0', true );

}
add_action('wp_enqueue_scripts', 'customjs', 999);


/*  Bloques reutilizables accessible in backend */
function be_reusable_blocks_admin_menu() {
    add_menu_page( 'Bloques reutilizables', 'Bloques reutilizables', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
}
add_action( 'admin_menu', 'be_reusable_blocks_admin_menu' );