<?php get_header(); ?><div class="container">	<div class="row">		<div class="col">            <div class="content-area">										<?php 					if ( have_posts() ) : 						while ( have_posts() ) : the_post();															the_title('<h1 class="entry-title">','</h1>');											the_content();											endwhile; else : 					endif; 					?>                           </div><!-- #primary -->        </div>        <?php get_sidebar();?>    </div></div><?php get_footer(); ?>