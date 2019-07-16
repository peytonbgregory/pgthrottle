<?php get_header(); ?>
<div class="container py-5" id="homecontent">
	<div class="row">
        <div class="col">
        	<?php get_template_part ('includes/content'); ?> 
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<div class="container-fluid text-center" id="btnbar">
    <div class="row">
        <div class="col-12 col-sm-6 bg-primary"><a class="p-5 text-dark d-block w-100 h-100 m-0 h4" href="/schedule-an-appointment/">Book Appointment</a></div>
        <div class="col-12 col-sm-6 bg-secondary"><a class="p-5 text-dark d-block w-100 h-100 m-0 h4" href="/services/">View Services</a></div>
    </div>
</div>
<div class="w-100 text-center" id="homeservices">
    <div class="row no-gutters">
        <div class="col-12 col-sm-6 d-none d-md-block">
            <div class="d-flex h-100 flex-column justify-content-end" style="background:url(/wp-content/uploads/2019/04/new-medical-spa-wrinkles-2.jpg) no-repeat; background-size:cover" id="treatyourself">
                <span class="h1 display-1 text-white">Treat Yourself</span>
            </div>
        </div>
        <div class="col-12 col-md-6">
            
            <div class="row no-gutters">

                <?php
                $args = array( 'posts_per_page' => 9, 'offset'=> 1, 'category' => 2 );

                $services = get_posts( $args );
                foreach ( $services as $post ) : setup_postdata( $post ); ?>
                    <div class="col-6 col-sm-4">
                        <div class="service-item">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title()?>">
                            <?php the_post_thumbnail('large-square', array('class' => 'img-fluid service-img')); ?>
                                <h5 class="m-0 py-3 post-title service-title"><?php the_title(); ?></h5>
                            </a> 
                        </div>
                    </div>
                <?php endforeach; 
                wp_reset_postdata();?>

            </div>

        </div> 
    </div>
</div>

<div class="container-fluid bg-white  py-5" id="homepromos">
    <div class="row">
        <div class="col-12 text-center mb-3">
            <h2 class="mb-3">Specials & Promotions</h2>
        </div>
         <?php
                $args = array( 
                    'posts_per_page' => 1, 
                    'category' => 27,
                    'orderby' => 'rand' 
                );

                $reviews = get_posts( $args );
                foreach ( $reviews as $post ) : setup_postdata( $post ); ?>
                    <div class="col-12 col-sm-6 text-right">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', array('class' => 'img-fluid specials-thumbnail')); ?></a>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="specials-content">
                         <a class="h3 d-block" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                         <?php the_content();?>
                         <a href="<?php the_permalink()?>" title="<?php the_title()?>" target="_self" class="btn btn-lg btn-primary">Learn More</a>
                            </div>
                    </div>
                <?php endforeach; 
                wp_reset_postdata();?>
    </div>
</div>

<div class="container-fluid text-center bg-primary py-5" id="homereviews">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-3 text-white">Patient Reviews</h2>
            <div class="star-rating text-white mb-3">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
       
        <div class="container">
        <div class="row">
           
                <?php
                $args = array( 
                    'posts_per_page' => 1, 
                    'category' => 28, 
                    'orderby' => 'rand' );

                $reviews = get_posts( $args );
                foreach ( $reviews as $post ) : setup_postdata( $post ); ?>
                    <div class="col-12 text-white">
                       <?php the_content();?>
                      <small>- <?php the_title(); ?></small>
                    </div>
                <?php endforeach; 
                wp_reset_postdata();?>
        <div class="col-12">
        <a href="https://search.google.com/local/writereview?placeid=ChIJ85Y3JGoUsYkRyUYRVRViT5I" target="_blank" class="btn btn-sm mt-3 btn-primary text-muted">Submit a Review</a>
        </div>
              </div>
        </div>
      
    </div>
</div>

<div class="container text-center bg-white py-5" id="homeproducts">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-3">Products Available</h2>
        </div>
         <div class="col-6 col-sm-4 col-md-2">
        <img class="img-fluid" src="https://www.newmedicalspausa.com/wp-content/uploads/2019/04/45834.jpg" alt="45834">
        </div>
        <div class="col-6 col-sm-4 col-md-2">
        <img class="img-fluid" src="https://www.newmedicalspausa.com/wp-content/uploads/2019/04/45835.jpg" alt="45835">
        </div>
         <div class="col-6 col-sm-4 col-md-2">
        <img class="img-fluid" src="https://www.newmedicalspausa.com/wp-content/uploads/2019/04/45836.jpg" alt="45835">
        </div>
         <div class="col-6 col-sm-4 col-md-2">
        <img class="img-fluid" src="https://www.newmedicalspausa.com/wp-content/uploads/2019/04/45837.jpg" alt="45835">
        </div>
         <div class="col-6 col-sm-4 col-md-2">
        <img class="img-fluid" src="https://www.newmedicalspausa.com/wp-content/uploads/2019/04/45838.jpg" alt="45835">
        </div>
         <div class="col-6 col-sm-4 col-md-2">
        <img class="img-fluid" src="https://www.newmedicalspausa.com/wp-content/uploads/2019/04/45839.jpg" alt="45835">
        </div>
        <div class="col-12">
            <a href="https://newmedicalspausa.brilliantconnections.com/home?lang=en_US" target="_blank" class="btn btn-lg btn-primary">Shop Now</a>
        </div>
    </div>
</div>
<?php get_footer();?>