<?php
/*
 */
?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
  <?php if ( has_post_thumbnail()) { ?>
		<?php the_post_thumbnail('full', array('class'=>'img-responsive img-thumbnail')); ?>
	<?php } else {?> 
    <?php }?>
    <h1 class="entry-title">
      <?php the_title(); ?>
      </h1>
  </header>
  <!-- .entry-header -->
  <?php if ( is_search() || is_home() ) : // Only display Excerpts for Search ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <!-- .entry-summary -->
  <?php else : ?>
  <div class="entry-content">
  
    <?php the_content(); ?>
  </div>
  <!-- .entry-content -->
  <?php endif; ?>
  <div class="entry-meta">
    <?php if ('post' == get_post_type()) : // Hide category and tag text for pages on Search ?>
    <span class="cat-links"> <?php // printf( __( 'Posted in %1$s'), $categories_list ); ?> </span>
    <?php endif; // End if categories ?>
    <?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ') );
				if ( $tags_list ) :
			?>
    <span class="tags-links"> <?php printf( __( 'Tagged %1$s'), $tags_list ); ?> </span>
    <?php endif; // End if 'post' == get_post_type() ?>
  </div>
  <!-- .entry-meta --> 
</article>
<!-- #post-## -->
<?php endwhile; ?>
<?php else : ?>
<?php get_template_part( 'no-results', 'index' ); ?>
<?php endif; ?>