<?php

/*Template Name: Blog archive sidebar
*/
get_header(); 
get_template_part( 'template-parts/title-background' ); 
?>
<div class="container blog-archive-page">
  <div class="row">
    <div class="col-lg-8"> 
      <div class="row pagespace-archive">
			<?php 
		  $args = array( 'post_type' => 'post', 'posts_per_page' => 5,  ); $loop = new WP_Query( $args ); 
		  while ( $loop->have_posts() ) : $loop->the_post();
      ?>
			<article class="col-md-12 p-0">
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
          <?php echo esc_attr(get_theme_mod('buttontext_detailstext')); ?>
        </a>        
				</div>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>	
      </div> 
      </div>
      <div class="
      <?php if (is_active_sidebar( 'page-sidebar' )) 
        echo 'col-lg-4 sidebarpadding archivesidebar'; 
        else echo 'col-lg-12'; ?>">
				<div class="
          <?php if (is_active_sidebar( 'page-sidebar' )) 
          echo 'sidebar'; 
          else echo ''; ?>">
          <?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
          <?php dynamic_sidebar( 'page-sidebar' ); ?>
          <?php endif; ?>
        </div> 
			</div> 
    </div> 
  </div> 
<?php       
get_footer();
?>