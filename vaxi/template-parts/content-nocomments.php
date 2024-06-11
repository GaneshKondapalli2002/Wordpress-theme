<?php
/**
 * Part of singular single blog page and blog pages 
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <div class="blog-post">
	  <div>	 
	  <?php
	  get_template_part( 'template-parts/entry-header' );
    ?>
    </div> 
    <div class="blog-post-image-wrapper">
      <div class="blog-meta-date
			<?php  
      if ((has_post_thumbnail()))
        {
          echo ' hasimage ';
        }
        elseif ((!has_post_thumbnail()))
        {
        echo ' ';
        }
        ?>">			  
				<?php echo get_the_date(get_option('date_format'))?>  
			</div>   	  
      <div>
			<?php
      if ( ! is_search() ) {
		    the_post_thumbnail('rtvaxi_one_row_img');
	    }?>
			</div> 			
	  </div>  	   
	  <?php // Default to displaying the post meta.
		get_template_part( 'template-parts/meta' );?>

   </div>
   <div class="row">
     <div class="col-lg-12 col-12">
	     <div class="blog-grid post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">
		     <div class="entry-content mt-1half">
			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( esc_html__( 'Continue reading', 'vaxi' ) );
			}
			?>
		     </div>
	     </div>
	     <div class="section-inner">
		   <?php
		   wp_link_pages(
			 array(
				 'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'vaxi' ) . '"><span class="label">' . esc_html__( 'Pages:', 'vaxi' ) . '</span>',
				 'after'       => '</nav>',
				 'link_before' => '<span class="page-number">',
				 'link_after'  => '</span>',
			 )
		   );
		   edit_post_link();
		   // Single bottom post meta.
		   twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );
		   if ( is_single() ) {
			 get_template_part( 'template-parts/entry-author-bio' );
		   }
		   ?>
	     </div> 
  	   <?php
	     if ( is_single() ) {
		   get_template_part( 'template-parts/navigation' );
	     }?>
      </div>
    </div> 
</article>