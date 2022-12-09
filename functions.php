<?php
function stamet_files(){
    wp_enqueue_script('jquery-main-js', "//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js", NULL, "1.0", true);
    wp_enqueue_script('carousel-main-js', "//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js", NULL, "1.0", true);
    wp_enqueue_script('stamet-main-js', get_theme_file_uri('/assets/js/script.js'), NULL, "1.0", true);
    wp_enqueue_script('stamet-peta-js', get_theme_file_uri('/assets/js/peta.js'), NULL, "1.0", true);
    wp_enqueue_script( 'leaflet_styles', '//unpkg.com/leaflet@1.7.1/dist/leaflet.js');

    wp_enqueue_style('owl_carousel_style',"//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css");
    wp_enqueue_style('owl_carousel_def_theme',"//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css");
    wp_enqueue_style('google_fonts',"//fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap");
    wp_enqueue_style( 'leaflet_styles', '//unpkg.com/leaflet@1.7.1/dist/leaflet.css');
    
    wp_enqueue_style('stamet_peta_syles',get_stylesheet_directory_uri().'/assets/styles/peta.css','1.0', 'all' );
    wp_enqueue_style('stamet_menu_syles',get_stylesheet_directory_uri().'/assets/styles/menu.css','1.0', 'all' );
    wp_enqueue_style( 'stamet_main_styles', get_stylesheet_uri());
}

// function widgetInit(){
//     register_sidebar( array(
//         'name' => 'Sidebar',
//         'id' => 'sidebar1'
//     ) );
// }

the_post_thumbnail( 'thumbnail' ); // Thumbnail (default 150px x 150px max)
the_post_thumbnail( 'medium'); // Medium resolution (default 300px x 300px max)
the_post_thumbnail( 'large' ); // Large resolution (default 640px x 640px max)
the_post_thumbnail( 'full'); // Full resolution (original size uploaded)
// Image size for single posts




add_action('wp_enqueue_scripts','stamet_files');
add_theme_support( 'post-thumbnails' );
add_image_size( 'single-post-thumbnail', 500, 9999 );
add_image_size( 'buletin-thumbnail', 300, 430, true );
// add_action('widgets_init', 'widgetInit');


register_nav_menus( array(
    'primary' => __('Primary Menu'),
));

/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function stamet_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Media Sosial', 'stamet' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Tambahkan widget di sini.', 'stamet' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'stamet_widgets_init' );