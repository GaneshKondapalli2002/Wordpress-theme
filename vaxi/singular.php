<?php
/**
 * The template for displaying single posts and pages.
 */
get_header();
?>
<?php if( ( function_exists('bcn_display') ) and ( is_singular() ) ){ 
echo '
<div class="breadcrumb2-wrapper"> 
  <div class="container">
    <div class="row"> 
      <div class="col"> 
        <div class="breadcrumb2">';
				}?>     
        <?php 
				if( ( function_exists('bcn_display') ) and ( is_singular() ) ){
				bcn_display(); 
				}?>            
        <?php if( ( function_exists('bcn_display') ) and ( is_singular() ) ){ 
  echo '</div>
			</div>
	  </div>
  </div>
</div>';}?>	
<main id="site-content" class="single-post-wrapper pagespace pagespaceborder">
	<div class="container">
    <div class="row">
      <div class="
      <?php if ( class_exists('ACF') ){
      $choice = get_field('sidebars');
      }
      else {$choice = NULL;} ; 
			
      if (is_active_sidebar( 'page-sidebar' )
			and ( class_exists('ACF') )	
		  and ($choice == 'add')) 
      {
        echo 'col-lg-8';
      }
      else echo 'col-lg-8 offset-lg-2';
      ?>">
      <?php
	    if ( have_posts() ) {
		  while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content-nocomments', get_post_type() );
		  }
	    }
	    ?>
      </div>
      <div class="
      <?php if ( class_exists('ACF') ){
      $choice = get_field('sidebars');
      }
      else {$choice = NULL;};
			
			if (is_active_sidebar( 'page-sidebar' )
			and ( class_exists('ACF') )	
		  and ($choice == 'add')) 
        echo 'col-lg-4 sidebarpadding'; 
        else echo 'col-lg-12'; ?>">
				<div class="
          <?php if (is_active_sidebar( 'page-sidebar' )
			    and ( class_exists('ACF') )	
		      and ($choice == 'add'))
          echo 'sidebar'; 
          else echo ''; ?>">
      
        <?php if (is_active_sidebar( 'page-sidebar' )
			  and ( class_exists('ACF') )	
		    and ($choice == 'add')) : ?>
        <?php dynamic_sidebar( 'page-sidebar' ); ?>
        <?php endif; ?>
        </div>
			</div>
    </div>
    <div class="row">
      <div class="col">
      <?php
	    /**
	    *  Output comments wrapper if it's a post, or if comments are open,
	    * or if there's a comment number – and check for password.
	    * */
	    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		  ?>
		  <div class="comments-wrapper post-comments-wrapper">
		    <?php comments_template(); ?>
		  </div><!-- .comments-wrapper -->
		  <?php
	    }
	    ?> 
      </div>
    </div>
  </div>
</main><!-- #site-content -->
<?php get_footer(); ?>