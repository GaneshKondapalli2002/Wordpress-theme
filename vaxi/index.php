<?php
/**
 * The main template file 
 *
 */
get_header();
?>
<main class="index-post-wrapper" id="site-content">
	<?php
	$archive_title    = '';
	$archive_subtitle = '';
	if ( is_search() ) {
		global $wp_query;
    
		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="searchtitle"><span class="color-accent">' . esc_html__( 'Search:', 'vaxi' ) . '</span></span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);


		if ( $wp_query->found_posts ) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results */
				_n(
					'We found %s result for your search.',
					'We found %s results for your search.',
					$wp_query->found_posts,
					'vaxi'
				),
				number_format_i18n( $wp_query->found_posts )
			);
		} else {
			$archive_subtitle = esc_html__( 'We could not find any results for your search. You can give it another try through the search form below.', 'vaxi' );
		}
	} else {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}

	if ( $archive_title || $archive_subtitle ) {
		?>
	<header class="bg-title-global2">
	  <div class="innerpages-title-wrapper bg-title-page text-center">  
      <div class="innerpages-title">    
        <div class="container"> 
          <div class="row"> 
		      <?php if ( $archive_title ) { ?>
		        <h1>
            <?php  
            $allowed_html = wp_kses_allowed_html (array(
            'div' => array(
            'class' => array(),
            'id' => array()
            ),
            'span' => array(
            'class' => array(),
            'id' => array()
            )
            )
            );
            echo wp_kses( $archive_title, $allowed_html ); 
            ?>
            </h1>
		        <?php } ?>
		        <?php if ( $archive_subtitle ) { ?>
		        <div class="archive-subtitle section-inner thin max-percentage intro-text">
            <?php 
            $allowed_html = wp_kses_allowed_html (array(
            'div' => array(
            'class' => array(),
            'id' => array()
            ),
            'span' => array(
            'class' => array(),
            'id' => array()
            )
            )
            );
            echo wp_kses( wpautop( $archive_subtitle ), $allowed_html ); ?>
            </div>
		        <?php } ?>
	        </div><!-- .archive-header-inner -->
        </div> 
      </div> 
    </div>
	</header><!-- .archive-header -->
	<?php
	}?>
  <div class="container pagespaceindex">
    <div class="row">
      <div class="
      <?php   
      if ((is_active_sidebar( 'page-sidebar' ))
      ){
        echo 'col-lg-8';
      }
      else echo 'col-lg-8 offset-lg-2';
      ?>">
      <?php
	    if ( have_posts() ) {
		  $i = 0;
		  while ( have_posts() ) {
			$i++;
			the_post();
			get_template_part( 'template-parts/content-index', get_post_type() );
		}
	} elseif ( is_search() ) {
		?>
		<div class="no-search-results-form section-inner thin">
      <div>
        <div class="row">
          <div class="col-12 mb-1">         
			    <?php
			    get_search_form(
				  array(
					'label' => esc_html__( 'search again', 'vaxi' ),
				  )
			    );?>
          </div>
        </div>
		  </div>
    </div><!-- .no-search-results -->
		<?php
	}?>
	<div>
	<?php get_template_part( 'template-parts/pagination' ); ?>
	</div>
  </div>
  <div class="
    <?php if (is_active_sidebar( 'page-sidebar' )) 
    echo 'col-lg-4 sidebarpadding'; 
    else echo 'col-lg-12'; ?>">
			<div class="
      <?php if (is_active_sidebar( 'page-sidebar' )) 
      echo 'sidebar'; 
      else echo ''; ?>">
      <?php if ((is_active_sidebar( 'page-sidebar' ))
      )
        : ?>
      <?php dynamic_sidebar( 'page-sidebar' ); ?>
      <?php endif; ?>
      </div> 
  </div>
  </div>
</div>
</main><!-- #site-content -->
<?php
get_footer();