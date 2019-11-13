<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p class="small animate fadeIn delay-2" id="breadcrumbs">','</p>' );
}
?></div>
        <?php if( have_posts()) : while (have_posts()) : the_post() ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
            <div class="card project-item hide">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <div class="hover-text">Click to view Project</div>
                    <?php
                    $image = get_field('project_featured_image');
                    $size = 'large-wide'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                    echo wp_get_attachment_image( $image, $size, "", ["class" => "card-img-top acf-thumbnail img-fluid hover-zoom"] );
                    } else { ?>
                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/enteros-default-image.jpg" title="Project Image Unavailable" class="card-img-top default-thumbnail img-fluid hover-zoom" />
                    <?php  }?>




                </a>
                <div class="card-body bg-light text-center">
                    <h6 class="card-title text-truncate mb-0"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
                </div>
            </div>
        </div>
        <?php endwhile; endif; ?>
        <?php get_sidebar();?>
    </div>
</div>
<?php get_footer();?>
