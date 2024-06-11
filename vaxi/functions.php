<?php
/**********************
 * Include the TGM_Plugin_Activation class.
 **********************/
require_once(trailingslashit( get_template_directory() ) . 'class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'rtvaxi_register_required_plugins' );

function rtvaxi_register_required_plugins() {

	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
        
    array(
			'name'     				=> esc_html__('Rt Vaxi Theme Functions', 'vaxi'), // The plugin name
			'slug'     				=> 'rtvaxi-theme-functions', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/plugins/rtvaxi-theme-functions.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
      'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name' 		=> esc_html__('Elementor Page Builder', 'vaxi'),
			'slug' 		=> 'elementor',
			'required' 	=> true,
		),

    array(
			'name' 		=> esc_html__('Advanced custom fields', 'vaxi'),
			'slug' 		=> 'advanced-custom-fields',
			'required' 	=> true,
		),
		
		array(
			'name' 		=> esc_html__('Smart slider', 'vaxi'),
			'slug' 		=> 'smart-slider-3',
			'required' 	=> true,
		),
		
    array(
			'name' 		=> esc_html__('Contact Form', 'vaxi'),
			'slug' 		=> 'contact-form-7',
			'required' 	=> true,
		),

		 array(
			'name' 		=> esc_html__('Breadcrumbs', 'vaxi'),
			'slug' 		=> 'breadcrumb-navxt',
			'required' 	=> false,
		),	
		
		 array(
			'name' 		=> esc_html__('Popup anything on click', 'vaxi'),
			'slug' 		=> 'popup-anything-on-click',
			'required' 	=> false,
		),
		
		array(
			'name' 		=> esc_html__('Latest posts', 'vaxi'),
			'slug' 		=> 'latest-posts',
			'required' 	=> false,
		),
		array(
			'name' 		=> esc_html__('WooCommerce', 'vaxi'),
			'slug' 		=> 'woocommerce',
			'required' 	=> false,
		),

	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}

/***********************
 * Add custom field from acf plugin to body class
 *******************/
add_filter( 'body_class', 'rtvaxi_body_class' );
function rtvaxi_body_class( array $classes ) {
	$new_class = is_page() ? get_post_meta( get_the_ID(), 'body_class', true ) : null;
	if ( $new_class ) {
		$classes[] = $new_class;
	}
	return $classes;
}


/**********************************************************
* woocommerce support
***********************************************************/
add_action( 'after_setup_theme', 'rtvaxi_woocommerce_support' );
function rtvaxi_woocommerce_support() {
    add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}


/************************
 * Register global theme colors
 ************************/
require get_template_directory() . '/inc/global-theme-colors.php';


/***********************
 * Register and Enqueue Styles.
 ******************/
function rtvaxi_register_styles() {

wp_enqueue_style( 'rtvaxi-style', get_stylesheet_uri(), array() );
wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css' ); 
wp_enqueue_style( 'magnific-popup', get_stylesheet_directory_uri() . '/assets/css/magnific-popup.css' ); 
wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/assets/css/slick.css' ); 
wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css' ); 
 
/** add/remove main.less file **/
if ( 'on' == get_theme_mod( 'stylelessfile' ))
  wp_enqueue_style( 'rtvaxi-less-style', get_stylesheet_directory_uri() . '/main.less' );
else;

/** add/remove main1.css file **/
wp_enqueue_style( 'rtvaxi-main-style', get_stylesheet_directory_uri() . '/main1.css' );		
if ( 'on' == get_theme_mod( 'stylelessfile' ))
  wp_dequeue_style( 'rtvaxi-main-style', get_stylesheet_directory_uri() . '/main1.css' );
else;  


/** add main2-globalcolors.css when activate color options in customizer and remove main1.css and main.less file **/
if ( 'on' == get_theme_mod( 'mainglobal' )){
  wp_enqueue_style( 'rtvaxi-main2-globalcolors-style', get_stylesheet_directory_uri() . '/main2-globalcolors.css' );
  wp_dequeue_style( 'rtvaxi-less-style', get_stylesheet_directory_uri() . '/main.less' );
	wp_dequeue_style( 'rtvaxi-main-style', get_stylesheet_directory_uri() . '/main1.css' );	
}
else; 


/** add fontawesome file **/
wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/css/fontawesome.css' );
 

/*** dequeue ultimate plugin font awesome style ***/
wp_dequeue_style( 'font_awesome_solid' );
wp_dequeue_style( 'font_awese_solid' );  

}
add_action( 'wp_enqueue_scripts', 'rtvaxi_register_styles', 11 );

/*** dequeue ultimate plugin font awesome style from footer and print ***/
function rtvaxi_register_styles1() {  
  wp_dequeue_style( 'font_awesome_solid' );
  wp_dequeue_style( 'font_awese_solid' );  
} 
add_action( 'wp_footer', 'rtvaxi_register_styles1', 11);
add_action( 'wp_print_scripts', 'rtvaxi_register_styles1', 11 );


/************************
 * Register and Enqueue Scripts.
 ************************/
function rtvaxi_register_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
 	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.js', array('jquery') );   
 
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') );
  wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array('jquery') );
  wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery') );
	
  wp_enqueue_script( 'rtvaxi-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery', 'masonry', 'imagesloaded'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'rtvaxi_register_scripts' );


/************************
 * Register menus places
 ************************/
function rtvaxi_menus() {

	$locations = array(
		'primary'  => esc_html__( 'Desktop horizontal menu (default)', 'vaxi' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'rtvaxi_menus' );


/************************
 * Register fallback menu
 ************************/
function rtvaxi_menus1() {
  require get_template_directory() . '/wp_page_menu.php';
}


/**********************************************************
* google fonts support
***********************************************************/
function rtvaxi_fonts_url() {
  $font_url = '';

  if ( 'off' !== esc_attr_x( 'on', 'Google font: on or off', 'vaxi' ) ) {
    $font_url = add_query_arg( 'family', urlencode( 'Manrope:200,300,400,500,600,700,800,900&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
  }  
  
  return esc_url_raw( $font_url );
}
function rtvaxi_scripts2() {
  wp_enqueue_style( 'rtvaxi-fonts', rtvaxi_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'rtvaxi_scripts2' );


/**********************************************************
* Logo
***********************************************************/
add_action( 'customize_register', 'rtvaxi_custom_logo_uploader' );
function rtvaxi_custom_logo_uploader($wp_customize) {

    $wp_customize->add_section( 'upload_custom_logo', array(
        'title'          => esc_html__('Logo', 'vaxi'),
        'description'    => esc_html__('Display a custom logo', 'vaxi'),
        'priority'       => 25,
    ) );

    $wp_customize->add_setting( 'custom_logo', array(
        'default'        => '',
        'sanitize_callback' => 'rtvaxi_sanitize_image',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_logo', array(
        'label'   => esc_html__('Custom logo', 'vaxi'),
        'section' => 'upload_custom_logo',
        'settings'   => 'custom_logo',
    ) ) );

}
/* custom logo */
function rtvaxi_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}
	return $html;
}
add_filter( 'get_custom_logo', 'rtvaxi_get_custom_logo' );



/************************************************************************
* customize theme in customizer
*************************************************************************/

function rtvaxi_customize_register( $wp_customize ) {

// LOGO
$wp_customize->add_setting('retina_logo',array(
	'capability'        => 'edit_theme_options',
	'transport'         => 'postMessage',
  'sanitize_callback' => 'rtvaxi_sanitize_checkbox',
)
);
$wp_customize->add_control('retina_logo', array(
	'type'        => 'checkbox',
	'section'     => 'upload_custom_logo',
	'priority'    => 10,
	'label'       => esc_html__( 'Retina logo', 'vaxi' ),
	'description' => esc_html__( 'Scales the logo to half its uploaded size, making it sharp on high-res screens.', 'vaxi' ),
  'settings'   => 'retina_logo',
)
);
$wp_customize->add_section( 'retina' , array(
  'title'      => esc_html__( 'Regina logo', 'vaxi' ),  
) );

//COPYRIGHT DETAILS
 $wp_customize->add_setting( 'copyright_detailstext' , array(
  'default'     => 'Copyright text',
  'transport'   => 'refresh',
  'sanitize_callback' => 'rtvaxi_sanitize_text',
) );

$wp_customize->add_control( 'copyright_detailstext', array(
  'type' => 'textarea',
	'label'        => esc_html__( 'Copyright text', 'vaxi' ),
	'section'    => 'rtvaxi_copyrighturl',
	'settings'   => 'copyright_detailstext',
 ));

$wp_customize->add_section( 'rtvaxi_copyrighturl' , array(
  'title'      => esc_html__( 'Copyright Details', 'vaxi' ),  
) );


//ALIGN MENU
 $wp_customize->add_setting( 'menuright' , array(
  'default'     => 'on',
  'transport'   => 'refresh',
  'sanitize_callback' => 'rtvaxi_sanitize_radio',
) );
$wp_customize->add_control( 'menuright', array(
	'label'        => esc_html__( 'Align menu', 'vaxi' ),
	'section'    => 'rtvaxi_menuright_section',
	'settings'   => 'menuright',
    'type'   => 'radio',
    'choices'    => array(
    'on' => esc_html__('Left default', 'vaxi' ),
    'offf' => esc_html__('Center', 'vaxi' ),  
		'off' => esc_html__('Right - recommended when having menu widgets', 'vaxi' ),
		
 ),
 ));
$wp_customize->add_section( 'rtvaxi_menuright_section' , array(
  'title'      => esc_html__( 'Align menu', 'vaxi' ),  
) );


//STICKY FIXED STATIC MENU
 $wp_customize->add_setting( 'stickymenu' , array(
  'default'     => 'sticky',
  'transport'   => 'refresh',
  'sanitize_callback' => 'rtvaxi_sanitize_radio',
) );
$wp_customize->add_control( 'stickymenu', array(
	'label'        => esc_html__( 'Sticky fixed or static menu', 'vaxi' ),
	'section'    => 'rtvaxi_stickymenu_section',
	'settings'   => 'stickymenu',
    'type'   => 'radio',
    'choices'    => array(
    'sticky' => esc_html__('Sticky default', 'vaxi' ),
    'static' => esc_html__('Static', 'vaxi' ),  
		'fixed' => esc_html__('Fixed - use this only if there is no top widgets added', 'vaxi' ),		
 ),
 ));
$wp_customize->add_section( 'rtvaxi_stickymenu_section' , array(
  'title'      => esc_html__( 'Sticky fixed or static menu', 'vaxi' ),  
) );


//404 error page background image
$wp_customize->add_setting( 'titlebg', array(
  'transport'   => 'refresh',
  'sanitize_callback' => 'rtvaxi_sanitize_image',
) );
$wp_customize->add_section( 'titlebg_section' , array(
  'title'       => esc_html__( '404 error page background images', 'vaxi' ),
  'priority'    => 30,
  'description' => esc_html__('Upload image for 404 error page background in jpg or png format only. Recommended size at least 2000px wide.', 'vaxi' ),
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'titlebg', array(
  'label'    => esc_html__( '404 error page background image', 'vaxi' ),
  'section'  => 'titlebg_section',
  'settings' => 'titlebg',
) ) );

//Background image for footer
$wp_customize->add_setting( 'footerbg', array(
  'transport'   => 'refresh',
  'sanitize_callback' => 'rtvaxi_sanitize_image',
) );
$wp_customize->add_section( 'footerbg_section' , array(
  'title'       => esc_html__( 'Background images for footer', 'vaxi' ),
  'priority'    => 30,
  'description' => esc_html__('Upload image for title background for footer in jpg or png format only. Recommended size at least 2000px wide.', 'vaxi' ),
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footerbg', array(
  'label'    => esc_html__( 'Background image for footer', 'vaxi' ),
  'section'  => 'footerbg_section',
  'settings' => 'footerbg',
) ) );

//Background image for archive pages
$wp_customize->add_setting( 'titlebgi', array(
  'transport'   => 'refresh',
  'sanitize_callback' => 'rtvaxi_sanitize_image',
) );
$wp_customize->add_section( 'titlebgi_section' , array(
  'title'       => esc_html__( 'Background images for archive pages', 'vaxi' ),
  'priority'    => 30,
  'description' => esc_html__('Upload image for title background in archive pages in jpg or png format only. Recommended size at least 2000px wide.', 'vaxi' ),
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'titlebgi', array(
  'label'    => esc_html__( 'Background image for archive pages', 'vaxi' ),
  'section'  => 'titlebgi_section',
  'settings' => 'titlebgi',
) ) );

//SIDEBAR IN WOOCOMMERCE ARCHIVE PAGES
 $wp_customize->add_setting( 'woocommercesidebar' , array(
  'default'     => 'on',
  'transport'   => 'refresh',
  'sanitize_callback' => 'rtvaxi_sanitize_radio',
) );
$wp_customize->add_control( 'woocommercesidebar', array(
	'label'        => esc_html__( 'WooCommerce sidebar', 'vaxi' ),
	'section'    => 'rtvaxi_woocommercesidebar_section',
	'settings'   => 'woocommercesidebar',
    'type'   => 'radio',
    'choices'    => array(
    'on' => esc_html__('Add sidebar in WooCommerce archive pages (category, tag, etc) - default', 'vaxi' ),
    'off' => esc_html__('Remove sidebar in WooCommerce archive pages (category, tag, etc)', 'vaxi' )  
 ),
 ));
$wp_customize->add_section( 'rtvaxi_woocommercesidebar_section' , array(
  'title'      => esc_html__( 'WooCommerce archive pages sidebar', 'vaxi' ),  
) );


//ADD MAIN.LESS FILE 
 $wp_customize->add_setting( 'stylelessfile' , array(
  'default'     => 'off',
  'transport'   => 'refresh',
  'sanitize_callback' => 'rtvaxi_sanitize_radio',
) );
$wp_customize->add_control( 'stylelessfile', array(
  'label'        => esc_html__( 'Add main.less file', 'vaxi' ),
  'section'    => 'rtstylelessfile_section',
  'settings'   => 'stylelessfile',
  'type'   => 'radio',
  'choices'    => array(
    'off' => esc_html__('main.less file removed from theme - default', 'vaxi' ),
    'on' => esc_html__('add main.less file in theme if lessify plugin is activated and you want to make custom changes in main.less file', 'vaxi' )  
 ),
 ));
$wp_customize->add_section( 'rtstylelessfile_section' , array(
  'title'      => esc_html__( 'Add main.less file', 'vaxi' ),  
) );


//BUTTON TEXT IN BLOG PAGE TEMPLATE
 $wp_customize->add_setting( 'buttontext_detailstext' , array(
  'default'     => 'Read more',
  'transport'   => 'refresh',
  'sanitize_callback' => 'rtvaxi_sanitize_text',
) );

$wp_customize->add_control( 'buttontext_detailstext', array(
  'type' => 'text',
	'label'        => esc_html__( 'Button text', 'vaxi' ),
	'section'    => 'rtvaxi_buttontext',
	'settings'   => 'buttontext_detailstext',
 ));

$wp_customize->add_section( 'rtvaxi_buttontext' , array(
  'title'      => esc_html__( 'Button text in blog page template', 'vaxi' ),  
) );


}
add_action( 'customize_register', 'rtvaxi_customize_register' );

/*** sanitize text and image and radio button inputs/choices ****/
function rtvaxi_sanitize_text( $input ) {
    	
			$allowed_html = wp_kses_allowed_html (array(
        'a' => array(
          'href' => array(),
          'title' => array(),
          'target' => array()
        )
        )
        );
    return wp_kses( $input, $allowed_html );
}
function rtvaxi_sanitize_image( $image, $setting ) {
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'png'          => 'image/png',
    'svg'          => 'image/svg',
	);
	$file = wp_check_filetype( $image, $mimes );
	return ( $file['ext'] ? $image : $setting->default );
}
function rtvaxi_sanitize_checkbox( $input ){
  return ( isset( $input ) ? true : false );
}
function rtvaxi_sanitize_radio( $input ) {
  $valid = array(

    'off' => esc_html__('main.less file removed from theme - default', 'vaxi' ),
    'on' => esc_html__('add main.less file in theme if lessify plugin is activated and you want to make custom changes in main.less file', 'vaxi' ),  
    'on' => esc_html__('Left default', 'vaxi' ),
    'offf' => esc_html__('Center', 'vaxi' ),  
		'off' => esc_html__('Right', 'vaxi' ),
    'on' => esc_html__('Add sidebar - default', 'vaxi' ),
    'off' => esc_html__('Remove sidebar', 'vaxi' ),
    'sticky' => esc_html__('Sticky default', 'vaxi' ),
    'static' => esc_html__('Static', 'vaxi' ),  
		'fixed' => esc_html__('Fixed - use this only if there is no top widgets added', 'vaxi' ),	
	  'on' => esc_html__('Add sidebar in WooCommerce archive pages (category, tag, etc) - default', 'vaxi' ),
    'off' => esc_html__('Remove sidebar in WooCommerce archive pages (category, tag, etc)', 'vaxi' )  	
  );
  if ( array_key_exists( $input, $valid ) ) {
    return $input;
  } else {
    return '';
  }
}
/*** sanitize end ***/


//CUSTOMIZE TITLE BACKGROUND IMAGES FUNCTIONS FOR FRONTEND
function rtvaxi_customizer_css() {
?>

<?php //404 error page background image in Customizer ?>
<?php if  ( $rtvaxi_title_background_image_url1 = get_theme_mod( 'titlebg' ) )  { ?>
<style> .bg-title-global {
		background-image: url( <?php echo esc_html($rtvaxi_title_background_image_url1); ?> );
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
  }</style> 
<?php } ?>


<?php //Background image for archive pages ?>
<?php if  ( $rtvaxi_title_background_image_url1i = get_theme_mod( 'titlebgi' ) )  { ?>
<style> .bg-title-global2 {
		background-image: url( <?php echo esc_html($rtvaxi_title_background_image_url1i); ?> );
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
  }</style> 
<?php } ?>


<?php //Footer background image ?>
<?php if  ( $rtvaxi_footer_background_image = get_theme_mod( 'footerbg' ) )  { ?>
<style> .footer1-wrapper {
		background-image: url( <?php echo esc_html($rtvaxi_footer_background_image); ?> );
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
  }</style> 
<?php } ?>


<?php //ACF plugin metabox title background image for and pages ?>
<?php if( class_exists('ACF') ) {?>
<style>
   .bg-title-page {
		background-image: url( 
    <?php if (function_exists( 'acf_add_local_field_group' )){
    $choice = get_field('bg1');}
    if ($choice = get_field('bg1')){ 
    echo esc_url($choice['url']);}
    ?>
    );
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;   
  }
</style>  
<?php } ?>


 <?php }
add_action( 'wp_head', 'rtvaxi_customizer_css');


/** set woocommerce sidebar functions **/
function rtvaxi_woocommercesidebar1(){
if ( 'on' == get_theme_mod( 'woocommercesidebar' ))
  return 'col-lg-8';
elseif ( 'off' == get_theme_mod( 'woocommercesidebar' ))
  return 'col-lg-12';
else 
  return 'col-lg-8';
}

function rtvaxi_woocommercesidebar2(){
if ( 'on' == get_theme_mod( 'woocommercesidebar' ))
  return;
elseif ( 'off' == get_theme_mod( 'woocommercesidebar' ))
  remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);  
else
  return;
}

function rtvaxi_sideb($sideb1){
  if($sideb1 == "col-md-12") 
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}
/** set woocommerce sidebar functions end **/


/**********************************************************
* Widget areas
***********************************************************/

function rtvaxi_sidebar_registration() {

	$shared_args = array(
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);
  
 $shared_args2 = array(
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
	);

  // Header top widget1
	register_sidebar(
		array_merge(
    $shared_args,
			array(
				'name'        => esc_html__( 'Header column 1', 'vaxi' ),
				'id'          => 'sidebar-top1',
				'description' => esc_html__( 'Widgets in this widget area will be displayed in default header - column 1.', 'vaxi' ),
			)
		)
	);
  
  
  // Header top widget2
	register_sidebar(
		array_merge(
    $shared_args,
			array(
				'name'        => esc_html__( 'Header column 2', 'vaxi' ),
				'id'          => 'sidebar-top2',
				'description' => esc_html__( 'Widgets in this widget area will be displayed in default header - column 2.', 'vaxi' ),
			)
		)
	);
  
  // Search icon for second navigation
	register_sidebar(
		array_merge(
    $shared_args,
			array(
				'name'        => esc_html__( 'Header menu', 'vaxi' ),
				'id'          => 'sidebar-menu',
				'description' => esc_html__( 'Widgets in this widget area will be displayed in header on right side of menu', 'vaxi' ),
			)
		)
	);
  

 // Page sidebar
	register_sidebar(
		array_merge(
    $shared_args,
			array(
				'name'        => esc_html__( 'Archive and index blog pages sidebar', 'vaxi' ),
				'id'          => 'page-sidebar',
				'description' => esc_html__( 'Widgets in this area will be displayed in archive and index blog pages by default.', 'vaxi' ),
			)
		)
	);
	
 // Footer top
	register_sidebar(
		array_merge(
    $shared_args,
			array(
				'name'        => esc_html__( 'Footer top', 'vaxi' ),
				'id'          => 'footer-top',
				'description' => esc_html__( 'Widgets in this area will be displayed in footer top bar above main footer (subscribe form in theme demo).', 'vaxi' ),
			)
		)
	);	
  
  // Footer1 widget1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => esc_html__( 'Footer column 1', 'vaxi' ),
				'id'          => 'sidebar-1',
				'description' => esc_html__( 'Widgets in this widget area will be displayed in default footer - column 1', 'vaxi' ),
			)
		)
	);
  
  // Footer1 widget2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => esc_html__( 'Footer column 2', 'vaxi' ),
				'id'          => 'sidebar-2',
				'description' => esc_html__( 'Widgets in this widget area will be displayed in default footer - column 2', 'vaxi' ),
			)
		)
	);
	
	// Footer1 widget3.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => esc_html__( 'Footer bottom', 'vaxi' ),
				'id'          => 'sidebar-3',
				'description' => esc_html__( 'Widgets in this widget area will be displayed below main footer', 'vaxi' ),
			)
		)
	);
  // woocommerce shop sidebar
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => esc_html__( 'WooCommerce sidebar', 'vaxi' ),
				'id'          => 'shop',
				'description' => esc_html__( 'Widgets in this widget area will be displayed in WooCommerce pages', 'vaxi' ),
			)
		)
	);

}
add_action( 'widgets_init', 'rtvaxi_sidebar_registration' );


/************************************************************************
* Comment fields order
*************************************************************************/
add_filter( 'comment_form_fields', 'rtvaxi_comment_fields_custom_order' );
function rtvaxi_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field; 
    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}


/**********************************************************
* language support
***********************************************************/
function rtvaxi_load_theme_textdomain() {
  load_theme_textdomain( 'vaxi', get_template_directory().'/languages' );
}
add_action( 'after_setup_theme', 'rtvaxi_load_theme_textdomain' );



/**********************************************************
* Gutenberg
***********************************************************/
function rtvaxi_gutenberg_styles() {
	wp_enqueue_style( 'rtvaxi-fonts', rtvaxi_fonts_url(), array(), '1.0.0' );
  wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css'  );
  wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css'  );
}
add_action( 'enqueue_block_editor_assets', 'rtvaxi_gutenberg_styles' );

function rtvaxi_gsetup() { 
  add_editor_style(); /*this will add editor-style.css */
  add_theme_support( 'align-wide' );
  add_theme_support( 'align-full' );
  add_theme_support( 'wp-block-styles' );
  add_theme_support( 'editor-styles' );
  add_theme_support( 'responsive-embeds' );

		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Small', 'vaxi' ),
					'shortName' => esc_html__( 'S', 'vaxi' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'vaxi' ),
					'shortName' => esc_html__( 'M', 'vaxi' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'vaxi' ),
					'shortName' => esc_html__( 'L', 'vaxi' ),
					'size'      => 30,
					'slug'      => 'large',
				),

			)
		);

    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'first-color', 'vaxi' ),
            'slug' => 'first-color',
            'color' => '#0a083b',
        ),
        array(
            'name' => esc_html__( 'second-color', 'vaxi' ),
            'slug' => 'second-color',
            'color' => '#387efa',
        ),
        
        array(
            'name' => esc_html__( 'third-color', 'vaxi' ),
            'slug' => 'third-color',
            'color' => '#2471fb',
        ),
        array(
            'name' => esc_html__( 'fourth-color', 'vaxi' ),
            'slug' => 'fourth-color',
            'color' => '#19B8AF',
        ),

    ) );
}
add_action( 'after_setup_theme', 'rtvaxi_gsetup' );



/***************************************************************/
/***************************************************************/


/*** twentytwenty theme + vaxi theme *******/

function rtvaxi_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	*/
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size
  if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'rtvaxi_one_row_img', 1200, 600, array( 'center', 'center' ) );
add_image_size( 'rtvaxi_blog1column', 800, 450, array( 'center', 'center' ) );

}

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom_logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);


	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.*/
	load_theme_textdomain( 'vaxi' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'rtvaxi_theme_support' );


/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';

// Custom comment walker.
require get_template_directory() . '/classes/class-twentytwenty-walker-comment.php';

// Custom page walker.
require get_template_directory() . '/classes/class-twentytwenty-walker-page.php';



if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}


/**
 * Overwrite default more tag with styling and screen reader markup.
 *
 * @param string $html The default output HTML for the more tag.
 *
 * @return string $html
 */
function rtvaxi_read_more_tag( $html ) {
	return preg_replace( '/<a(.*)>(.*)<\/a>/iU', sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) ), $html );
}

add_filter( 'the_content_more_link', 'rtvaxi_read_more_tag' );