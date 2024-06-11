<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <input type="search" placeholder="<?php echo esc_attr__('Enter keyword...', 'vaxi' );?>" value="<?php echo get_search_query(); ?>" name="s" id="s" />
  <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'vaxi' ); ?>" />
</form>
