<?php
/**
 * Sidebar
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}?>

<div class="col-lg-4">
  <div class="sidebar">
  <?php if ( is_active_sidebar( 'shop' ) ) : ?>
  <?php dynamic_sidebar( 'shop' ); ?>
  <?php endif; ?>
  </div>
</div>	
