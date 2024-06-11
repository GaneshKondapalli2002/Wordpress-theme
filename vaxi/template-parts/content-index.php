<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<div class="blog-archive-page">
  <div class="row">

      <article class="col-md-12 mb-1">
        <div class="text-center">
        <div class="blog-post-image">
			  <?php
        if ( ! is_search() ) {
		    the_post_thumbnail('rtvaxi_one_row_img');
	      }?>
			  </div> 
        </div> 
        <div class="blog-archive-page-inner">
				<div class="blog-meta <?php  
        if ((has_post_thumbnail()))
        {
          echo ' hasimage ';
        }
        elseif ((!has_post_thumbnail()))
        {
        echo ' ';
        }
        ?>">
          <div class="blog-meta-date">  
						<?php echo get_the_date(get_option('date_format'))?>  
					</div>                  
					<div class="blog-meta-inner"> 
						<ul class="blog-meta-author">
              <li> <i class="fa fa-user"></i>   <?php the_author_posts_link(); ?>  </li>  
              <li> <i class="fa fa-comment"></i>   
							  <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>  
							</li>  
						</ul>
					</div>
				</div>
				<h2>
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
        </h2>
				<div>
        <p>
				  <?php 
          $content = get_the_excerpt();
          $trimmed_content = wp_trim_words( $content, 25 );
          echo esc_html($trimmed_content);
          ?>
				</p> 
				<div class="blog-post-category">    
				<?php the_category(', '); ?>  
				</div> 						
        </div>
				<a class="custom-button2 custom-button2a mb-1half" href="<?php the_permalink(); ?>">
          <?php 
					if (get_theme_mod('buttontext_detailstext'))
					echo esc_attr(get_theme_mod('buttontext_detailstext')); 
				  else echo 'Read more';
				  ?>
        </a>        
				</div>
      </article>
 
    </div> 
  </div> 


	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/*
	 * Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>
		<?php
	}
	?>
</div><!-- .post -->
