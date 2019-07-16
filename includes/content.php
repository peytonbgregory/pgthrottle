<?php
if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
  yoast_breadcrumb( '<p class="small" id="breadcrumbs">','</p>' );
}
?>


<?php if ( have_posts() ) : 
// Get page options from theme
$meta = get_post_meta( $post->ID, 'pgthrottle_fields', true );
  
	echo '<header class="page-header mb-3">';

		if(is_post_type_archive()) {
			$postType = get_post_type_object(get_post_type());
			if ($postType) {
				echo '<h1 class="page-title">';
				echo esc_html($postType->labels->name);
				echo '</h1>';
			} 
		} elseif(is_category() || is_archive() ) {
            echo '<h1 class="page-title">';
				echo single_cat_title();
				echo '</h1>';
        
        } elseif(is_home()) {
			the_archive_title('<h1 class="page-title">', '</h1>');
		}

	echo '</header>';
 
if(is_archive() && is_active_sidebar('archive-header')) { ?>

	<div class="col-12">
		<?php dynamic_sidebar('archive-header'); ?>
	</div>

<?php } ?>
				

<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix mb-3 container border-bottom'); ?>>
        <div class="row">
		<?php if ( is_search() || is_home() || is_archive() ) : // Only display Excerpts for Search ?>
	
            <header class="entry-header col-12">

                <h3 class="entry-title">

                    <a href="<?php the_permalink();?>"><?php the_title(); ?></a>

                </h3>

            </header>
            <?php if ( has_post_thumbnail()) { ?>
                <div class="col-12 col-sm-2">
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail', array('class'=>'img-responsive img-thumbnail img-fluid alignleft float-left mr-1 mb-1')); ?></a>
                </div>
            <?php }?> 
            <div class="entry-summary col">
                <?php the_excerpt(); ?>
            </div>
            <div class="entry-footer col-12 mb-3 justify-content-between d-flex">
              
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-sm btn-primary mr-3">Read More</a> 
            </div>

	  <?php else : ?>
		
	 <?php if(!is_front_page() && !is_archive() && !has_post_thumbnail() ) { ?>
		
	  	<header class="entry-header">

			<h1 class="entry-title">

				<?php the_title(); ?>

			</h1>

		</header>
		
	<?php } ?>
		
	  <div class="entry-content">

		<?php the_content(); ?>

	  </div>

	  <?php endif; ?>
        </div>     
	</article>

<?php endwhile; ?>
<?php else : ?>
<?php get_template_part( 'no-results', 'index' ); ?>
<?php endif; ?>