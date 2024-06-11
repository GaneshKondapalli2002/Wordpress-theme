<?php
/**
 * meta tags
 *
 */
 ?>

					<div class="blog-meta-inner"> 
            <div class="blog-post-category">    <?php the_category(', '); ?>  </div> 
						<ul class="blog-meta-author">           
							<li> <i class="fa fa-user"></i>   <?php the_author_posts_link(); ?>  </li>  
              <li> <i class="fa fa-comment"></i>   
							  <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>  
							</li>  
						</ul>
					</div>