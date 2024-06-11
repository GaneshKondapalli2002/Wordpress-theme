<?php

/*Template Name: Page boxed width no title
*/

get_header();   
?>
<main class="pagespace">
  <div class="container">
    <div class="row">
      <div class="col">
	  <?php  
	  if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
      
			get_template_part( 'content', get_post_type() );
		}
	}
	?>
      </div> 
    </div>  
  </div>
</main>

 <?php       

      get_footer();


?>