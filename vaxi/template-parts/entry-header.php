<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

$entry_header_classes = '';

if ( is_singular() ) {
	$entry_header_classes .= ' header-footer-group';
}

?>
<header class="entry-header <?php echo esc_attr( $entry_header_classes ); ?>">
	<div class="entry-header-inner section-inner medium">
	  <div class="single-title">
      <div class="row">
        <div class="col-lg-12 col-12 mb-1">                   
        <?php
		    if ( is_singular() ) {
			  the_title( '<h1 class="entry-title">', '</h1>' );
		    } else {
			  the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
		    }
		    $intro_text_width = '';
		    if ( is_singular() ) {
			  $intro_text_width = ' small';
		    } else {
			  $intro_text_width = ' thin';
		    }
		  
		    ?>
        </div>   
      </div> 
    </div>
	</div><!-- .entry-header-inner -->
</header><!-- .entry-header -->