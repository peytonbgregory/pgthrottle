
 <?php query_posts('category_name=CATEGORYNAME&showposts=4'); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="recent-post-thumbnail">
                	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium', array('class' => 'img-recent img-responsive')); ?></a>
                </div>
                <h2 class="recent-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <div class="recent-post-excerpt"><?php the_excerpt(); ?></div>
            </div>  
            <?php endwhile; endif; ?> 
            <?php wp_reset_query();?> 
   