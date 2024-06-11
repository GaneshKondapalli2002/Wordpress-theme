<?php
/**
 * 404 error page
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
  <div class="h-100">	
    <div class="error404">
      <div>
      <?php if ( get_theme_mod( 'titlebg' ));  ?>
			<img src="<?php echo get_theme_mod( 'titlebg' ) ?>" alt="404"> 
      </div>      
			<div>
			<div class="error404-2">
        <h1><?php esc_html_e( 'We are sorry but the page is not found', 'vaxi' ); ?></h1>
        <h2><?php esc_html_e( '404', 'vaxi' ); ?></h2>
        <h3><?php esc_html_e( 'Stay Safe! Use Protective Equipment', 'vaxi' ); ?></h3>
        <div class="row mt-2">
          <div class="col-12">
            <?php
		        get_search_form(
			      array(
			  	  'label' => esc_html__( '404 not found', 'vaxi' ),
			      )
		        );
		        ?>
          </div>
          <div class="col-12 mt-1 mb-2">
            <a class="custom-button1" href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e( 'go to homepage', 'vaxi' ); ?></a>
        	</div>
        </div>
				</div>	
       </div>
    </div>
  </div>
<?php wp_footer(); ?>