<?php get_header(); ?>
<section class="w-100 d-flex flex-column justify-content-end" id="homeslider">
    <div class="slider-wrapper py-3 py-md-5 w-100">
        <div class="container w-75">
            <div class="row no-gutters">
                <div class="col-4 col-sm-5 col-md-4 col-lg-3">

                    <div class="album-wrapper"><a href="<?php echo get_site_url(null, '/product/balls-preorder/'); ?>" title="Preorder Balls Now"><img src="<?php echo get_site_url(null, '/wp-content/uploads/2019/07/humungus-balls-ablum-cover-xsmall.jpg'); ?>" width="250" height="250" class="img-fluid album-cover shadow" /></a></div>

                </div>
                <div class="col-8 col-sm-7 col-md-8 col-lg-9 pl-5">
                    <div class="h1 display-4 text-warning mb-0">Preorder Now!</div>
                    <p class="text-light mb-3 d-none d-md-block">The latest Humungus album titled "Balls" is available to be preorder online! The first 100 preorders will include a limited edition t-shirt!</p>
                    <a class="btn btn-danger text-light mb-3" href="<?php echo get_site_url(null, '/product/balls-cd-preorder/'); ?>" title="Preorder Balls Now">Preorder Now!</a>

                </div>
            </div>
        </div>
    </div>
</section>
<div class="container py-5" id="homecontent">
	<div class="row">
        <div class="col">
        	<?php get_template_part ('includes/content'); ?> 
        </div>
        <?php // get_sidebar(); ?>
    </div>
</div>
<div class="container-fluid text-center" id="btnbar">
    <div class="row">
        <div class="col-12 col-sm-6 bg-primary" id="btnshows"><a class="p-5 d-block w-100 h-100 m-0" href="<?php echo get_site_url(nul,'/shows/'); ?>"><div class="text-light h1 display-3">Upcoming Shows</div><div class="small text-light">Click here to view all tour dates</div></a></div>
        <div class="col-12 col-sm-6 bg-warning" id="btnshop"><a class="p-5 d-block w-100 h-100 m-0" href="<?php echo get_site_url(null, '/shop/'); ?>"><div class="text-dark h1 display-3">Shop Online</div><div class="small text-dark">Click here to browse Humungus merchandise</div></a></div>
    </div>
</div>

<div class="container py-5" id="homenews">
    <div class="row">
        <div class="col-12  mb-3">
            <h2 class="text-center text-warning display-1">News &amp; Events</h2>
        </div>
    </div>
     <?php
        $args = array( 
            'posts_per_page' => 4, 
            //'category' => 97,
            //'orderby' => 'rand' 
        );

        $reviews = get_posts( $args );
        foreach ( $reviews as $post ) : setup_postdata( $post ); ?>
        <div class="row mb-3">            
            <div class="col-12 col-sm-4 col-md-3">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('woocommerce_thumbnail', array('class' => 'img-fluid img-thumbnail mb-3 bg-secondary border-primary news-thumbnail')); ?></a>
            </div>
            <div class="col-12 col-sm-8 col-md-9">
                <div class="specials-content">
                 <h4 class="post-title m-0 display-5 text-truncate"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_self"><?php the_title(); ?></a></h4>
                <div class="post-meta small text-primary">Date Published: <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time> </div>
                 <?php the_excerpt();?>
                 <a href="<?php the_permalink()?>" title="<?php the_title()?>" target="_self" class="btn btn-secondary btn-sm mb-3">Read More</a>
                </div>
            </div>
            <hr />
        </div>
        <?php endforeach; 
    wp_reset_postdata();?>
    <div class="row">
    <div class="col text-center">
     <a href="<?php get_site_url(null, '/news/'); ?>" title="View Humungus News" class="btn btn-lg mb-3 text-dark btn-primary">View all News</a>    
    </div>
    </div>
</div>
<section class="w-100 py-5 bg-primary" id="homelisten">
    <div class="container">
        <div class="row flex-row">
            <div class="col-12 col-sm-8">
                <span class="h2 text-warning display-3">Play some Heavy Metal!</span>
                <p class="text-light">Remember how great heavy metal was in the 80s? Neither do we. That's why we're re-writing heavy metal history, one riff at a time. Click the view discography button to see a complete list of our music.</p>
            </div>
            <div class="col-12 col-sm-4 align-items-center d-flex justify-content-center">
                <a href="<?php echo get_site_url(null, '/product-category/music/'); ?>" title="View Humungus Discography" class="btn btn-lg d-block text-dark btn-warning">View Discography</a>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>