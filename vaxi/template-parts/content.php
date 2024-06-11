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

      <article class="col-md-12 pb-2">
        <div class="text-center">
        <?php 
        if (has_post_thumbnail())
        {the_post_thumbnail('rtvaxi_one_row_img');}
				else{ }
				?>
        </div> 
        <div class="blog-archive-page-inner">
				<div class="blog-meta">
          <div class="blog-meta-date">  
						<?php echo get_the_date(get_option('date_format'))?>  
					</div>                  
					<div class="blog-meta-inner"> 
            <ul class="blog-meta-author">
              <li> <i class="fa fa-user"></i>   <?php the_author_posts_link(); ?>  </li>  
              <li> <i class="fa fa-comment"></i>   <?php comments_number(); ?>  </li>  
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
        </div>
				<a class="custom-button2 custom-button2a mb-1half" href="<?php the_permalink(); ?>">
          <?php echo esc_attr(get_theme_mod('buttontext_detailstext')); ?>
        </a>        
				</div>
      </article>
 
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

		if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

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

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</div><!-- .post -->
