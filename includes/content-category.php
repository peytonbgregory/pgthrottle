<?php
/*
 */
?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <?php if ( has_post_thumbnail()) { ?>
    <div class="thumb-wrapper row">
        <div class="col-md-2"><?php the_post_thumbnail('thumbnail', array('class'=>'img-responsive img-thumbnail')); ?></div>
        <div class="col-md-10">
            <header class="entry-header">
            	<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            </header>
            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
<?php } else {?> 
	<div class="thumb-wrapper row">
        <div class="col-md-12">
            <header class="entry-header">
            	<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            </header>
            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
<?php }?>
</article>
<!-- #post-## -->
<?php endwhile; ?>
<?php else : ?>
<?php get_template_part( 'no-results', 'index' ); ?>
<?php endif; ?>



