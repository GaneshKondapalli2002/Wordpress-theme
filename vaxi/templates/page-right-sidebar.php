<?php

/*Template Name: Page Right Sidebar
*/

get_header();

get_template_part( 'template-parts/title-background' );    
?>
<main class="pagespace">
  <div class="container">
    <div class="row py-4">
      <div class="col-lg-8">
      <?php get_template_part( 'template-parts/featured-image' );

	    if ( have_posts() ) {

		  while ( have_posts() ) {
			the_post();
      
			get_template_part( 'content', get_post_type() );
		  }
	    }
	    ?>
      </div> 
      <div class="col-lg-4 sidebar">
        <?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'page-sidebar' ); ?>
        <?php endif; ?>
      </div> 
    </div>  
  </div>
</main>
<?php       
get_footer();
?>