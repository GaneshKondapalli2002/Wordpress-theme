<?php

/*Template Name: Page full width with title (for pagebuilder)
*/

get_header();

get_template_part( 'template-parts/title-background' );    
?>
<main>
	  <?php  
	  if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
      
			get_template_part( 'content', get_post_type() );
		}
	}
	?>
</main>
<?php       
      get_footer();
?>