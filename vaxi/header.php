<?php
/**
 * Header file 
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
	<div class="preloader">	
    <div class="loading">
      <div class="loading-item"></div>
      <div class="loading-item"></div>
      <div class="loading-item"></div>
      <div class="loading-item"></div>
      <div class="loading-item"></div>
    </div>
	</div>  
  <?php       
    get_template_part( 'template-parts/nav' );