<?php
if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
  yoast_breadcrumb( '<p class="small animate fadeIn delay-2" id="breadcrumbs">','</p>' );
}
?>


<?php if ( have_posts() ) : 
// Get page options from theme
$meta = get_post_meta( $post->ID, 'pgthrottle_fields', true );
  
	echo '<header class="page-header mb-3">';

		if(is_post_type_archive()) {
			$postType = get_post_type_object(get_post_type());
			if ($postType) {
				echo '<h2 class="page-title">';
				echo esc_html($postType->labels->name);
				echo '</h2>';
			} 
		} elseif(is_category() || is_archive() ) {
            echo '<h2 class="page-title">';
				echo single_cat_title();
				echo '</h2>';
        
        } elseif(is_home()) {
			//the_archive_title('<h2 class="page-title">', '</h2>');
		}

	echo '</header>';
 
if(is_archive() && is_active_sidebar('archive-header')) { ?>

<div class="col-12" role="banner">
    <?php dynamic_sidebar('archive-header'); ?>
</div>

<?php } ?>


<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix mb-3 container p-0'); ?> role="article">
    <div class="row">
        <?php if ( is_search() || is_home() || is_archive() ) : // Only display Excerpts for Search ?>

        <header class="entry-header col-12" role="heading">

            <h3 class="entry-title">

                <a href="<?php the_permalink();?>" title="<?php the_title(); ?>" target="_self"><?php the_title(); ?></a>

            </h3>
            <div class="post-date text-muted mb-1 small">Published: <?php the_date(); ?></div>
        </header>

        <div class="entry-summary col">
            <?php the_excerpt(); ?>
        </div>
        <div class="entry-footer col-12 mb-3 justify-content-between d-flex">

            <a href="<?php the_permalink(); ?>" title="Continue reading blog post" class="btn btn-sm btn-primary mr-3">Read More</a>
        </div>

        <?php else : ?>

        <?php if(!is_front_page() && !is_archive() && !has_post_thumbnail() ) { ?>

        <header class="entry-header col-12" role="heading">

            <h2 class="entry-title">

                <?php the_title(); ?>

            </h2>

        </header>

        <?php } ?>

        <div class="entry-content col-12" role="main">

            <?php the_content(); ?>

        </div>


        <?php endif; ?>
    </div>
</article>



<?php endwhile; ?>
<?php else : ?>
<?php get_template_part( 'no-results', 'index' ); ?>
<?php endif; ?>
<?php if(is_archive() || is_search()) { ?>
<section class="post-navigation border-top fade-opacity mb-3 pb-3 pt-4 d-flex justify-content-between">
    <?php previous_posts_link( $label ); ?>
    <?php next_posts_link( $label , $max_pages ); ?>
</section>
<?php } ?>
