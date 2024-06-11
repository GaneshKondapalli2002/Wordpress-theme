<?php
/**
 * Custom part of custom page template (custom footer)
 */

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
$has_sidebar_3 = is_active_sidebar( 'sidebar-3' );
$has_footertop = is_active_sidebar( 'footer-top' );
	?>
<div class="footer1-wrapper 
<?php if ( $has_sidebar_1 || $has_sidebar_2 || $has_sidebar_3 || $has_footertop || get_theme_mod ('copyright_detailstext') )
	echo ' footer1-wrapper-bg '; ?>
<?php if ( $has_footertop ) echo 'footer1-wrapper50'; ?>">
	<?php

// Only output the container if there are elements to display.
if ( $has_sidebar_1 || $has_sidebar_2 || $has_sidebar_3 || $has_footertop ) {
	?>
  <div class="footer">
	  <div class="container footer-content"><!-- footer content -->
      <?php if ( $has_footertop ) { ?>
			<div class="footer-top-widget">     
				<div class="col-12">
					<?php dynamic_sidebar( 'footer-top' ); ?>
				</div>
			</div>
				<?php } ?> 
			<div class="row footer-widgets">
      <div class="col-lg-12">
			<?php if ( $has_sidebar_1 || $has_sidebar_2 || $has_sidebar_3  || $has_footertop ) { ?>
					<div class="row footer-widgets-wrapper"><!-- footer-widgets-wrapper -->
            <div class="col-lg-6">
						  <?php if ( $has_sidebar_1 ) { ?>
							<div class="footer-widgets">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</div>
						  <?php } ?> 
            </div> 
            <div class="col-lg-6">       
              <?php if ( $has_sidebar_2 ) { ?>
							<div class="footer-widgets">
							 <?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div>
						  <?php } ?>                          
            </div>
					</div><!-- .footer-widgets-wrapper -->
          <div class="col-lg-12">
						  <?php if ( $has_sidebar_3 ) { ?>
							<div class="footer-widgets footer-widgets-bottom">
								<?php dynamic_sidebar( 'sidebar-3' ); ?>
							</div>
						  <?php } ?> 
          </div> 
			  <?php } ?>
      </div>
    </div>  
	</div>  
</div>
<?php } ?>
<div class="container-fluid"><!-- copyright and top button -->
  <div class="row">
	<div class="col-md-12">
		<div class="<?php
      if ( get_theme_mod ('copyright_detailstext')){
      echo 'copyright';
      }?>">
			<?php
      if ( get_theme_mod ('copyright_detailstext')){
			echo date_i18n(
			esc_html_x( 'Y', 'copyright date format', 'vaxi' )
			);
      }
			?>
			<?php 
      /* copyright text */
			$allowed_html = wp_kses_allowed_html (array(
      'a' => array(
      'target' => array(),
      'href' => array(),
      'title' => array()
      )
      )
      );
      echo wp_kses( get_theme_mod ('copyright_detailstext'), $allowed_html); ?>
		</div>
	</div>
	</div>
	<div class="row">
    <div class="col-12 text-right to-the-top">
	    <div id="toTopBtn" class="fa fa-chevron-up button-top">
	    </div>
	  </div>	
  </div> 
</div><!-- .copyright and top button -->
</div>
<?php wp_footer(); ?>
</body>
</html>