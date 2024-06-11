<?php
/**
 * Page default
 *
 */

get_header();

get_template_part( 'template-parts/title-background' );    
?>
<main class="pagespace">
  <div class="container">
    <div class="row 
    <?php if ( has_post_thumbnail() ){
      echo 'pt-1 pb-1';} ?> ">
      <div class="col">
      <?php get_template_part( 'template-parts/featured-image' )?>
      </div>
    </div>

	    <?php  
	    if ( have_posts() ) {
		  while ( have_posts() ) {
			  the_post();      
			  get_template_part( 'content', get_post_type() );
		  }
	    }?> 
  </div>
</main>
 <?php       
 get_footer();

?>