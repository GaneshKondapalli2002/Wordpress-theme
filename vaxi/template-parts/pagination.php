<?php
/**
 * A template partial to output pagination for the Twenty Twenty default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

/**
 * Translators:
 * This text contains HTML to allow the text to be shorter on small screens.
 * The text inside the span with the class nav-short will be hidden on small screens.
 */

$prev_text = sprintf(
	'%s <span class="nav-prev-text">%s</span>',
	'<span class="fa fa-chevron-left"></span>',
	esc_html__( '', 'vaxi' )
);
$next_text = sprintf(
	'<span class="nav-next-text">%s</span> %s',
	esc_html__( '', 'vaxi' ),
	'<span class="fa fa-chevron-right"></span>'
);

$posts_pagination = get_the_posts_pagination(
	array(
		'mid_size'  => 1,
		'prev_text' => $prev_text,
		'next_text' => $next_text,
	)
);

if ( $posts_pagination ) { ?>

	<div class="pagination-wrapper section-inner">


		<?php 
        $allowed_html = wp_kses_allowed_html (array(
        'a' => array(
          'href' => array(),
          'class' => array(),
          'title' => array()
        ),
        'span' => array(
          'class' => array(),
          'id' => array()
        ),
        'nav' => array(
          'class' => array(),
          'aria-label' => array(),
          
        ),
        'h2' => array(
          'class' => array(),
          'id' => array()
        ),
        'div' => array(
          'class' => array(),
          'id' => array()
        )
        )
        );
    echo wp_kses($posts_pagination, $allowed_html);
    ?>

	</div><!-- .pagination-wrapper -->

	<?php
}