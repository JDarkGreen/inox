<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="maincontentcontainer">
 *
 * @package Superb
 * @since Superb 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
            
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>

        <body <?php body_class('superb-red'); ?>>

            <div id="wrapper" class="hfeed site">

                <div class="visuallyhidden skip-link"><a href="#primary" title="<?php esc_attr_e('Skip to main content', 'superb'); ?>"><?php esc_html_e('Skip to main content', 'superb'); ?></a></div>

                <div id="headercontainer">

                    <header id="masthead" class="site-header row" role="banner">
                        <div id="header-left" class="col grid_4_of_12">
                            <div class="header-contact">
                            <?php if (get_theme_mod('header_contact') != '') { ?>
                                <p><?php echo get_theme_mod('header_contact'); ?></p>
                            <?php } else { ?>
                                <p><?php esc_html_e('Call us on  24x7: 800-555-0101', 'superb') ?> </p>
                            <?php } ?>
                        </div>
                        </div>
                        <div id="header-mid" class="col grid_4_of_12">
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">
                                    <?php echo get_bloginfo('name'); ?>	
                                </a>
                            </h1>
                            <p class="site-description"> 
                                <?php echo get_bloginfo('description'); ?>
                            </p>

                            <?php if (get_header_image()) : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
                            <?php endif; ?>
                        </div> <!-- /.col.grid_6_of_12 -->

                        <div id="header-right" class="col grid_4_of_12 header-extras last"> 
                            <div class="social-links">
                                <ul>
                                    <?php if (get_theme_mod('facebook_link_url')) { ?>
                                        <li class="superb-fb"><a href="<?php echo esc_url(get_theme_mod('facebook_link_url')); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('twitter_link_url')) { ?>
                                        <li class="superb-twitter"><a href="<?php echo  esc_url(get_theme_mod('twitter_link_url')); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('googleplus_link_url')) { ?>
                                        <li class="superb-gplus"><a href="<?php echo esc_url(get_theme_mod('googleplus_link_url')); ?>"></a></li>
                                    <?php } ?>
                                    <?php if( get_theme_mod('pinterest_link_url')) { ?>
                                        <li class="superb-pinterest"><a href="<?php echo esc_url(get_theme_mod('pinterest_link_url')); ?>"></a></li>
                                    <?php } ?>
                                    <?php if (get_theme_mod('github_link_url')) { ?>
                                        <li class="superb-github"><a href="<?php echo esc_url(get_theme_mod('github_link_url')); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('youtube_link_url')) { ?>
                                        <li class="superb-youtube"><a href="<?php echo esc_url(get_theme_mod('youtube_link_url')); ?>"></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            
                        </div><!-- /.header-extras -->
                    </header> <!-- /#masthead.site-header.row -->

                    <div class="nav-container">
                        <nav id="site-navigation" class="main-navigation" role="navigation">
                            <div class="col grid_12_of_12">
                                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'primary-menu', 'container_class' => 'menu' )); ?>
                            </div>
                            <div id="mobile-menu"></div>
                        </nav> <!-- /.site-navigation.main-navigation -->
                    </div><!-- /.nav-container -->
                </div> <!-- /#headercontainer -->
