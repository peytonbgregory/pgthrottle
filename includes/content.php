<?php
if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
  yoast_breadcrumb( '<p class="small" id="breadcrumbs">','</p>' );
}
?>


<?php if ( have_posts() ) : 
// Get page options from theme
$meta = get_post_meta( $post->ID, 'pgthrottle_fields', true );

	echo '<header class="page-header">';

		if(is_archive()) {
			$postType = get_post_type_object(get_post_type());
			if ($postType) {
				echo '<h1 class="page-title">';
				echo esc_html($postType->labels->name);
				echo '</h1>';
			}
		}

		elseif(is_home()) {
			the_archive_title('<h1 class="page-title">', '</h1>');
		}

	echo '</header>';

if(is_archive() && is_active_sidebar('archive-header')) { ?>

	<div class="col-12">
		<?php dynamic_sidebar('archive-header'); ?>
	</div>

<?php } ?>
				

<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_search() || is_home() || is_archive() ) : // Only display Excerpts for Search ?>
		
		<header class="entry-header">

			<h3 class="entry-title">

				<a href="<?php the_permalink();?>"><?php the_title(); ?></a>

			</h3>

		</header>
			
		<div class="entry-summary">
			
			<?php if ( has_post_thumbnail()) { ?>

				<a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail', array('class'=>'img-responsive img-thumbnail img-fluid alignleft')); ?></a>

			<?php }?> 

			<?php the_excerpt(); ?>

		</div>

	  <?php else : ?>
		
	 <?php if(!is_front_page() && !is_archive()) { ?>
		
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

	</article>

<?php endwhile; ?>
<?php else : ?>
<?php get_template_part( 'no-results', 'index' ); ?>
<?php endif; ?>