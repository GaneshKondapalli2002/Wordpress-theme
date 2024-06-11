<?php

/***********************
 * Register and Enqueue Styles.
 ******************/
function rtvaxi_register_styles2() {

wp_enqueue_style( 'rtvaxi-style', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' ); 
wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css' ); 

/** add main1.css file from parent theme **/
wp_enqueue_style( 'rtvaxi-main-style', get_template_directory_uri() . '/main1.css' );		

/** add fontawesome file **/
wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.css' );

/*** dequeue ultimate plugin font awesome style ***/
wp_dequeue_style( 'font_awesome_solid' );
wp_dequeue_style( 'font_awese_solid' );  

/** add main2-globalcolors.css when activate color options in customizer and remove main1.css and main.less file from theme **/
if ( 'on' == get_theme_mod( 'mainglobal' )){
  wp_enqueue_style( 'rtvaxi-main2-globalcolors-style', get_template_directory_uri() . '/main2-globalcolors.css' );
  wp_dequeue_style( 'rtvaxi-less-style', get_template_directory_uri() . '/main.less' );
	wp_dequeue_style( 'rtvaxi-main-style', get_template_directory_uri() . '/main1.css' );	
}
else; 

}
add_action( 'wp_enqueue_scripts', 'rtvaxi_register_styles2', 11 );



function rtvaxi_register_styles21() {
/** remove main.less file from parent theme **/
if ( 'on' == get_theme_mod( 'stylelessfile' ))
  wp_dequeue_style( 'rtvaxi-less-style', get_template_directory_uri() . '/main.less' );
else;

/** add main.less file from child theme **/
if ( 'on' == get_theme_mod( 'stylelessfile' ))
  wp_enqueue_style( 'rtvaxi-less-style-child', get_stylesheet_directory_uri() . '/main.less' );
else;

/** add style.css file from child theme **/
wp_enqueue_style( 'rtvaxi-main-style-child', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'rtvaxi_register_styles21', 12 );