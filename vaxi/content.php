<?php
/**
 * Part of page default and page templates
 */

?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="post-inner">
		<div class="entry-content">
			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( esc_html__( 'Continue reading', 'vaxi' ) );
			}
      wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vaxi' ),
				'after'  => '</div>',
			)
		  );
			?>
		</div><!-- .entry-content -->
	</div><!-- .post-inner -->
		<?php
		edit_post_link();
		?>
	<?php
	if ( is_single() ) {
		get_template_part( 'template-parts/navigation' );
	}?>
  <?php

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>
		<div class="row">
      <div class="col-12 comments-wrapper section-inner">
			<?php comments_template(); ?>
		  </div>
    </div><!-- .comments-wrapper -->
		<?php
	}
	?>  
</div>