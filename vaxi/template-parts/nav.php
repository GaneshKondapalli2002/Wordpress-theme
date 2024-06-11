<?php 
$has_sidebar_top1 = is_active_sidebar( 'sidebar-top1' );
$has_sidebar_top2 = is_active_sidebar( 'sidebar-top2' );
$has_sidebar_menu = is_active_sidebar( 'sidebar-menu' );
?>
<div class="top-widgets">  
<div class="container">
  <div class="row pr-3 pl-3">    
			<?php if ( $has_sidebar_top1 || $has_sidebar_top2 ) { ?>
			<div class="col-lg-12 col-md-12 p-0">
      <div class="row">
		  <?php if ( $has_sidebar_top1 ) { ?>
				<div class="col-lg-6 col-12">
					<?php dynamic_sidebar( 'sidebar-top1' ); ?>
				</div>
				<?php } ?>
				<?php if ( $has_sidebar_top2 ) { ?>
				<div class="col-lg-6 col-12">
					<?php dynamic_sidebar( 'sidebar-top2' ); ?>
				</div>
        <?php } ?> 
			</div>
      </div>
			<?php } ?> 
  </div>  
	</div>
</div>
<div class="white-nav
<?php 
	if ( 'sticky' == get_theme_mod( 'stickymenu' )) echo ' sticky-top'; 
	elseif ( 'static' == get_theme_mod( 'stickymenu' )) echo ''; 
	elseif ( 'fixed' == get_theme_mod( 'stickymenu' )) echo ' fixed-top';
	else echo ' sticky-top'; ?>">  
  <div class="container">
    <div class="row">
      <!-- nav -->
      <div class="col paddingfirstnav1">
        <nav class="navbar paddingfirstnav2 navbar-expand-lg">
          <!-- logo1 --> 
          <?php if ( get_theme_mod( 'custom_logo' ) ) { ?>
            <a class="navbar-brand p-0" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
              <img src='<?php echo esc_url( get_theme_mod( 'custom_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
            </a>          
          <?php } else {?>
            <a class="navbar-brand pl-0 navbar-brand-text" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
              <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
							<span class="description"> <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?></span> 
            </a> <?php } ?>		
					<div class=" 
          <?php 
					if ( 'off' == get_theme_mod( 'menuright' )) echo 'justify-content-end'; 
					elseif ( 'offf' == get_theme_mod( 'menuright' )) echo 'justify-content-center'; 
					else echo 'justify-content-start';
					?> custom-mega-menu collapse navbar-collapse" id="main_nav">
          <?php wp_nav_menu( array( 
            'menu' => 'top_menu',
            'menu_class' => 'navbar-nav',
						'theme_location' => 'primary',
						'fallback_cb' => 'rtvaxi_menus1'
            )
          );
          ?>
         
          <?php if ( $has_sidebar_menu ) { ?>
				  <div class="widget-menu">
					  <?php dynamic_sidebar( 'sidebar-menu' ); ?>
				  </div> 
				  <?php } ?>
					</div>
					<button class="navbar-toggler pt-1 pr-0 first-button" type="button" data-toggle="collapse" data-target="#main_nav"
          aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="animated-icon1"><span></span><span></span><span></span></span>
          </button> 					
        </nav>     
      </div> 
    </div> 
  </div> 
</div>