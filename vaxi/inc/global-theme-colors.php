<?php

//Changing color in Customizer
function rtvaxi__customize2_register( $wp_customize ) {
	
//add main2-globalcolors file 
 $wp_customize->add_setting( 'mainglobal' , array(
  'default'     => 'off',
  'transport'   => 'refresh',
  'sanitize_callback' => 'rtvaxi_sanitize_radio2',
) );
$wp_customize->add_control( 'mainglobal', array(
  'label'        => esc_html__( 'Add global colors css file', 'vaxi' ),
  'section'    => 'rtvaxi_color_section',
  'settings'   => 'mainglobal',
  'type'   => 'radio',
  'choices'    => array(
    'off' => esc_html__('main2-globalcolors.css removed - default', 'vaxi' ),
    'on' => esc_html__('main2-globalcolors.css added - choose this to activate colors changing (details in documentation)', 'vaxi' )  
 ),
 ));	
	
	// Add New Section: Colors 
  $wp_customize->add_section( 'rtvaxi_color_section', array(
    'title' => esc_html('Global colors', 'vaxi' ),
    'description' => esc_html('Change global colors here', 'vaxi' ),
    'priority' => '40'                  
  )); 
	
  // Add Settings 
  $wp_customize->add_setting( 'theme_color1', array(
    'default' => '#0a083b',
		'sanitize_callback' => 'rtvaxi__sanitize_text2',	
  ));	
  $wp_customize->add_setting( 'theme_color2', array(
    'default' => '#387efa', 
		'sanitize_callback' => 'rtvaxi__sanitize_text2',
  ));
	$wp_customize->add_setting( 'theme_color3', array(
    'default' => '#2471fb', 
		'sanitize_callback' => 'rtvaxi__sanitize_text2',
  ));
	$wp_customize->add_setting( 'theme_color4', array(
    'default' => '#19B8AF', 
		'sanitize_callback' => 'rtvaxi__sanitize_text2',
  ));
	$wp_customize->add_setting( 'theme_color5', array(
    'default' => '#FE5858', 
		'sanitize_callback' => 'rtvaxi__sanitize_text2',
  ));
	$wp_customize->add_setting( 'theme_color6', array(
    'default' => '#4D9CFF', 
		'sanitize_callback' => 'rtvaxi__sanitize_text2',
  ));
	$wp_customize->add_setting( 'theme_color7', array(
    'default' => '#FFB71A', 
		'sanitize_callback' => 'rtvaxi__sanitize_text2',
  ));	
	$wp_customize->add_setting( 'theme_color8', array(
    'default' => '#E8F2FF', 
		'sanitize_callback' => 'rtvaxi__sanitize_text2',
  ));
	$wp_customize->add_setting( 'theme_color9', array(
    'default' => '#c5dcfa', 
		'sanitize_callback' => 'rtvaxi__sanitize_text2',
  ));	
 
  // Add Controls
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color1', array(
    'label' => 'Theme color 1',
    'section' => 'rtvaxi_color_section',
    'settings' => 'theme_color1'
  )));

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color2', array(
    'label' => 'Theme color 2',
    'section' => 'rtvaxi_color_section',
    'settings' => 'theme_color2'
  )));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color3', array(
    'label' => 'Theme color 3',
    'section' => 'rtvaxi_color_section',
    'settings' => 'theme_color3'
  )));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color4', array(
    'label' => 'Theme color 4',
    'section' => 'rtvaxi_color_section',
    'settings' => 'theme_color4'
  )));

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color5', array(
    'label' => 'Theme color 5',
    'section' => 'rtvaxi_color_section',
    'settings' => 'theme_color5'
  )));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color6', array(
    'label' => 'Theme color 6',
    'section' => 'rtvaxi_color_section',
    'settings' => 'theme_color6'
  )));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color7', array(
    'label' => 'Theme color 7',
    'section' => 'rtvaxi_color_section',
    'settings' => 'theme_color7'
  )));

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color8', array(
    'label' => 'Theme color 8',
    'section' => 'rtvaxi_color_section',
    'settings' => 'theme_color8'
  )));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color9', array(
    'label' => 'Theme color 9',
    'section' => 'rtvaxi_color_section',
    'settings' => 'theme_color9'
  )));	

}
add_action( 'customize_register', 'rtvaxi__customize2_register' );



// sanitize 
function rtvaxi__sanitize_text2( $input ) {
    	
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

function rtvaxi_sanitize_radio2( $input ) {
  $valid = array(
    'off' => esc_html__('main2-globalcolors.css removed - default', 'vaxi' ),
    'on' => esc_html__('main2-globalcolors.css added - choose this to activate colors changing (details in documentation)', 'vaxi' )   	
  );
  if ( array_key_exists( $input, $valid ) ) {
    return $input;
  } else {
    return '';
  }
}



//Classes to change color in Customizer

function rtvaxi__customizer2_css() {
$rtvaxi__theme_color1 = get_theme_mod( 'theme_color1' );
$rtvaxi__theme_color2 = get_theme_mod( 'theme_color2' ); 
$rtvaxi__theme_color3 = get_theme_mod( 'theme_color3' ); 
$rtvaxi__theme_color4 = get_theme_mod( 'theme_color4' );
$rtvaxi__theme_color5 = get_theme_mod( 'theme_color5' ); 
$rtvaxi__theme_color6 = get_theme_mod( 'theme_color6' ); 
$rtvaxi__theme_color7 = get_theme_mod( 'theme_color7' );
$rtvaxi__theme_color8 = get_theme_mod( 'theme_color8' ); 
$rtvaxi__theme_color9 = get_theme_mod( 'theme_color9' ); 
{ ?>
<style>

:root {
  --bs-primary: <?php echo esc_html($rtvaxi__theme_color1); ?>;
  --bs-secondary: <?php echo esc_html($rtvaxi__theme_color2); ?>;
  --bs-third: <?php echo esc_html($rtvaxi__theme_color3); ?>;
  --bs-fourth: <?php echo esc_html($rtvaxi__theme_color4); ?>;
  --bs-fifth: <?php echo esc_html($rtvaxi__theme_color5); ?>;
  --bs-sixth: <?php echo esc_html($rtvaxi__theme_color6); ?>;
  --bs-seventh: <?php echo esc_html($rtvaxi__theme_color7); ?>;
	--bs-eighth: <?php echo esc_html($rtvaxi__theme_color8); ?>;
	--bs-nineth: <?php echo esc_html($rtvaxi__theme_color9); ?>;
}
 
</style> 


<?php }}
add_action( 'wp_head', 'rtvaxi__customizer2_css');
