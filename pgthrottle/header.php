<?php /* * The Header for our theme. */?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-control" content="public">
    <title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<?php global $pgoptions, $pgphonenumber, $pgphoneurl, $pgcustom_logo_id, $pglogo, $pgbodyclass, $pgnavclass, $pgheaderclass, $pgcontentclass, $pgfooterclass, $pgsitenotice, $pgnoticeclass, $pgresourceclass; ?>

<body <?php body_class($pgbodyclass); ?>>

    <header class="<?php echo $pgheaderclass ?> animate fadeIn" id="site-header" role="banner">

        <?php echo apply_filters('pgthrottile_sitenotice', ''); ?>

        <div class="<?php echo $pgresourceclass ?>" id="site-resources">

            <div class="container">

                <div class="row">

                    <div class="col pg-social-media">

                        <?php get_template_part ('includes/social'); ?>

                    </div>

                    <?php if (!$pgphonenumber == '') { ?>

                    <div class="col pg-phone-number">

                        <a class="phone-number btn-link btn" href="tel:<?php echo $pgphoneurl ?>"><?php echo $pgphonenumber ?></a>

                    </div>

                    <?php } ?>

                </div>

            </div>

        </div>

        <nav class="navbar <?php echo $pgnavclass ?> navbar-expand-lg p-0 navbar-light bg-light" role="navigation" id="site-navigation">

            <div class="container px-3">

                <?php echo apply_filters('pgthrottile_sitetitle', ''); ?>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
					wp_nav_menu( array(
					'menu'              => 'primary-menu',
					'theme_location'    => 'primary-menu',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse nav-wrap',
					'container_id'      => 'navbarSupportedContent',
					'menu_class'        => 'ml-auto navbar-nav group',
                    'menu_id'           => 'headerNav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker())
				);
				?>

            </div>

        </nav>

    </header>
    <?php if(is_active_sidebar('slideshow-1')) { ?>
    <section class="w-100 slideshow-widget-wrapper" role="banner">
        <?php dynamic_sidebar('slideshow-1'); ?>
    </section>
    <?php } ?>
    <!-- optional header banner with feature image -->
    <?php
    if(is_front_page()) { } else {
    $page_id = get_queried_object_id();
    if (has_post_thumbnail( $page_id ) ) :
    $image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'wide-banner' );
    $image = $image_array[0]; ?>

    <section class="feature-header feature-bg-img mb-3" style="background:url('<?php echo $image; ?>')" role="banner">

        <?php else : ?>

        <section class="feature-header mb-3" role="banner">

            <?php endif; ?>
            <div class="container py-5">
                <div class="row align-items-center py-5">
                    <div class="col-12">
                        <h2 class="page-title display-4 m-0 font-weight-bold text-light"><?php echo get_the_title($post->ID); ?></h2>
                    </div>
                </div>
            </div>
        </section>

        <?php } //!is_front_page() ?>

        <div class="<?php echo $pgcontentclass ?>" id="site-content">
