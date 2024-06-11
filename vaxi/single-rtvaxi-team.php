<?php
/**
 * Template team filter posts
 */
get_header();
?>
<div class="breadcrumb2-wrapper"> 
  <div class="container">
    <div class="row"> 
      <div class="col"> 
        <?php if( ( function_exists('bcn_display') ) and ( is_singular() ) ){ 
        echo '<div class="breadcrumb2">';      
        bcn_display();            
        echo '</div>'; }?>
			</div>
	  </div>
  </div>
</div>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div class="container">
  <div class="row pagespace">
    <div class="col-md-7 teambox-single mb-1">
      <h1 class="team-single-title"><?php the_title(); ?></h1>
			<h2 class="team-single-subtitle"><?php  
		  if (function_exists( 'acf_add_local_field_group' )){
      echo get_field('field_text1');
      }
      ?></h2>
			<div class="team-single-icon">
			<?php  
		  if (function_exists( 'acf_add_local_field_group' )){
      echo get_field('field_1b');
      }
      ?>
			</div>
 			<?php  
		  if (function_exists( 'acf_add_local_field_group' )){
      echo get_field('field_1c');
      }
      ?>     
    </div>	
		<div class="col-md-5 team-single-image">
      <?php the_post_thumbnail('post-large'); ?>
    </div>	
    <?php endwhile; else : 
    endif; ?>		
  </div>
	<div class="row">
    <div>
		  <?php  the_content(); ?>
		</div>
	</div>	
</div> 
<?php get_footer(); ?>