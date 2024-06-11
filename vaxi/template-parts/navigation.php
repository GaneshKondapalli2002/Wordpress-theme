<?php
/**
 * Displays the next and previous post navigation in single posts.

 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ( $next_post || $prev_post ) {

	$pagination_classes = '';

	if ( ! $next_post ) {
		$pagination_classes = ' only-one only-prev';
	} elseif ( ! $prev_post ) {
		$pagination_classes = ' only-one only-next';
	}

	?>

	<nav class="pagination-single section-inner<?php echo esc_attr( $pagination_classes ); ?>" aria-label="<?php esc_html_e( 'Post', 'vaxi' ); ?>">

		<div class="pagination-single-inner">

			<?php
			if ( $prev_post ) {
				?>
        <div class="previous-post">
        <a class="previous-post-inner" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
          <div class="iconwrapper">
            <span class="fa fa-chevron-left"></span>
          </div>
					<div class="title"><span class="title-inner"><?php echo esc_attr( get_the_title( $prev_post->ID ) ); ?></span></div>
				</a>
        </div>

				<?php
			}

			if ( $next_post ) {
				?>
        <div class="next-post">
        <a class="next-post-inner" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"> 
          <div class="title"><span class="title-inner"><?php echo esc_attr( get_the_title( $next_post->ID ) ); ?></span></div>			    
        	<div class="iconwrapper">
            <span class="fa fa-chevron-right"></span>
          </div> 
        </a>
        </div>
				<?php
			}
			?>

		</div><!-- .pagination-single-inner -->

	
	</nav><!-- .pagination-single -->

	<?php
}