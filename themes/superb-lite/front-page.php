<?php
/**
 * 
 * Description: Displays a full-width front page. 
 * The content for front page can be added from various sections 
 * highlighted in the theme customizer. 
 * 
 *
 * @package Superb
 * @since Superb 1.0
 */
get_header();
?>


<div class="slider-wrapper clearfix">
    <div class="flexslider">
        <ul class="slides">
            <?php
            // check if the slider is blank.
            // if there are no slides by user then load default slides. 
            if ( get_theme_mod('slider_one') =='' ) {  ?>
                <li id="slider1">
                    <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/slide1.jpg" alt=""/>
                    <div class="flex-caption">
                        <div class="caption-content">
                        <div class="caption-inner">
                        <h2 class="slider-title"><a href="#"><?php esc_html_e('Perfect for your business website', 'superb') ?></a></h2>
                        <p><?php esc_html_e('Superb is a theme designed for your business website.', 'superb') ?> </p>
                        <a class="slider-button" href="#">
                            <?php esc_html_e('Start Building Your Website Now', 'superb') ?>
                        </a>
                        </div>
                        </div>
                 </div>
             </li>
            
             
            <li id="slider2"> 
                <img  src="<?php echo get_template_directory_uri(); ?>/assets/images/slide3.jpg" alt=""/>
                <div class="flex-caption">
                    <div class="caption-content">
                        <div class="caption-inner">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase your work and services', 'superb') ?></a></h2>
                     <p><?php esc_html_e('Use the home featured section to showcase your services.', 'superb') ?> </p>
                      
                    </div>
                    </div>
                 </div>
            </li>
            
           
            
            <?php } ?>
            
             <?php 
             // if user adds a cusotm slide then display the slides 
          // load first slide
            if ( get_theme_mod('slider_one') !='' ) {  ?>
                    <li id="slider1">
                    <img  src="<?php echo esc_url(get_theme_mod('slider_one')); ?>" alt=""/>
                 <?php if ( get_theme_mod('slider_title_one') !='' || get_theme_mod('slider_one_description') !='' ) {  ?>
                    <div class="flex-caption">
                        <div class="caption-content">
                            <div class="caption-inner">
                              <h2 class="slider-title"><?php echo esc_html(get_theme_mod('slider_title_one')); ?></h2>
                                <p><?php echo esc_html(get_theme_mod('slider_one_description')); ?></p>
                               
                          <?php if ( get_theme_mod('slider_one_link_url') !='' && get_theme_mod('slider_one_link_text') !=''  ) {  ?>
                           <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_one_link_url')); ?>">
                            <?php  echo esc_html(get_theme_mod('slider_one_link_text')); ?>
                            <?php } ?> 
                            </a>
                        </div>
                        </div>
                     </div>
                 <?php } ?>
                </li>
                
               
                  <?php
                   // load second slide 
                   if ( get_theme_mod('slider_two') !='' ) {  ?>
                <li id="slider2">
                    <img  src="<?php echo esc_url(get_theme_mod('slider_two')); ?>" alt=""/>
                    <?php if ( get_theme_mod('slider_title_two') !='' || get_theme_mod('slider_two_description') !='' ) {  ?>
                    <div class="flex-caption">
                        <div class="caption-content">
                            <div class="caption-inner">
                              <h2 class="slider-title"><?php echo esc_html(get_theme_mod('slider_title_two')); ?></h2>
                            <p><?php echo esc_html(get_theme_mod('slider_two_description')); ?></p>
                                
                           <?php if ( get_theme_mod('slider_two_link_url') !='' && get_theme_mod('slider_two_link_text') !=''  ) {  ?>
                            <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_two_link_url')); ?>">
                              <?php echo esc_html(get_theme_mod('slider_two_link_text')); ?>
                                <?php } ?>
                            </a>
                        </div>
                        </div>
                     </div>
                    <?php } ?>
                </li>
                   <?php } ?>
                
              
                <?php } ?>
            
        </ul>
    </div>
</div>

<div class="content-wrapper">
   <div class="content">
     <div class="content-container">
        <!-- Start home featured area -->
        <div class="home-featured-area">
            <div class="home-featured">
                <div class="home-featured-one grid_4_of_12 col">
                    <?php if ( get_theme_mod('home_featured_one') !='' ) {  ?>
                     <div class="featured-image"><img src="<?php echo esc_url(get_theme_mod('home_featured_one')); ?>" /></div>
                    <?php } else {  ?>
                     <div class="featured-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/feature1.jpg" /></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_one') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_one')); ?></h3>
                  <?php } else {  ?> <h3><a href="#"><?php esc_html_e('Excellent Services', 'superb') ?></a></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_one') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_one')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Describe your services using this featured section.', 'superb') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_one_link_url') !='' ) { echo esc_url(get_theme_mod('home_one_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_one_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_one_link_text')); ?>

                  <?php } else {  ?> <?php esc_html_e('Read More', 'superb') ?>
                           <?php } ?></a>
                </div>

                <div class="home-featured-two grid_4_of_12 col">
                    <?php if ( get_theme_mod('home_featured_two') !='' ) {  ?>
                     <div class="featured-image"><img src="<?php echo esc_url(get_theme_mod('home_featured_two')); ?>" /></div>
                    <?php } else {  ?>
                     <div class="featured-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/feature2.jpg" /></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_two') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_two')); ?></h3>
                  <?php } else {  ?> <h3><a href="#"><?php esc_html_e('Superb Products', 'superb') ?></a></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_two') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_two')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Feature your best products and add a link to the products page.', 'superb') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_two_link_url') !='' ) { echo esc_url(get_theme_mod('home_two_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_two_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_two_link_text')); ?>

                  <?php } else {  ?> <?php esc_html_e('Read More', 'superb') ?>
                           <?php } ?></a>
                </div>


                <div class="home-featured-three grid_4_of_12 col">
                    <?php if ( get_theme_mod('home_featured_three') !='' ) {  ?>
                     <div class="featured-image"><img src="<?php echo esc_url(get_theme_mod('home_featured_three')); ?>" /></div>
                    <?php } else {  ?>
                     <div class="featured-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/feature3.jpg" /></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_three') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_three')); ?></h3>
                  <?php } else {  ?> <h3><a href="#"><?php esc_html_e('Quick Support', 'superb') ?></a></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_three') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_three')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('We make sure that your questions are answered quickly.', 'superb') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_three_link_url') !='' ) { echo esc_url(get_theme_mod('home_three_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_three_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_three_link_text')); ?>

                    <?php } else {  ?> <?php esc_html_e('Read More', 'superb') ?>
                           <?php } ?></a>
                </div>
            </div>
        </div><!-- end home featured area -->


        <!-- Start business-tagline area -->
        <div class="business-tagline-area">
            <div class="business-tagline">
                <?php if ( get_theme_mod('tagline_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('tagline_title')); ?></h3>

                  <?php } else {  ?> <h3><?php esc_html_e('This is Home Page Tagline', 'superb') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('tagline_description') !='' ) {  ?>
                  <p><?php echo get_theme_mod('tagline_description'); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('This section can be easily edited from Theme Customizer. '
                                  . 'Look for Home Tagline section in theme customizer and start adding your content here. '
                                  . 'Click the blue Save & Publish button to save your changes. ', 'superb') ?> </p>
                                           <?php } ?>
            </div>
        </div><!-- end business tagline area -->

        <!-- Start home Video area -->
        <div class="home-video-area">
            <div class="home-video">
                
                <div class="home-intro-text-section grid_6_of_12 col">
                     <?php if ( get_theme_mod('superb_home_intro_text_title') ) {  ?>
                        <h3 class="home-intro-title"><?php echo esc_html(get_theme_mod('superb_home_intro_text_title')); ?></h3>

                    <?php } else {  ?> 
                        <h3 class="home-intro-title"><?php esc_html_e('Home Intro Text', 'superb') ?></h3>
                    <?php } ?>
                        <div class="home-intro-text">
                            <?php if (get_theme_mod('superb_home_textarea')) { ?> 
                                <?php echo get_theme_mod('superb_home_textarea'); ?>
                            <?php } else { ?>
                                <?php esc_html_e('This is home intro textarea. You can add your custom text or HTML here'
                                        . 'via Theme Customizer. ', 'superb')
                                ?>
                        <?php } ?>
                        </div>
                </div>

                <div class="home-video-two grid_6_of_12 col">
                      <?php if ( get_theme_mod('video_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('video_title')); ?></h3>

                  <?php } else {  ?> <h3><?php esc_html_e('Video Title', 'superb') ?></h3>
                           <?php } ?>
                    <div class="video-code">
                        <?php if ( get_theme_mod('home_video') !='' ) {  ?> 
                         <?php echo get_theme_mod('home_video'); ?>
                          <?php } else { ?>
                       <?php esc_html_e('You can add your video embed code here.','superb') ?>
                           <?php } ?>
                      </div>
                    
                </div>
            </div>
         </div><!-- end home video area -->
           <!-- start home page featured posts -->
           <?php get_template_part('content/content','frontposts'); ?>
           <!-- end featured posts -->
    
            <div class="home-cta-area">
                <div class="home-cta">
                    <div class="cta-wrapper">
                    <div class="home-cta-one">
                        <?php if ( get_theme_mod('cta_text') !='' ) {  ?>
                        <p><?php echo esc_html(get_theme_mod('cta_text')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('This is Home CTA section. It can be changed from Theme Customizer.', 'superb') ?> </p>
                                           <?php } ?>
                    </div>
                    <div class="home-cta-two">
                        <a class="cta-button" href="<?php if ( get_theme_mod('home_cta_link_url') !='' ) { echo esc_url(get_theme_mod('home_cta_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_cta_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_cta_link_text')); ?>

                    <?php } else {  ?> <?php esc_html_e('Read More', 'superb') ?>
                           <?php } ?></a>
                    </div>
                  </div>
                </div>
            </div>
         <div class="contact-area">
             <div class="contact-wrap">
                 <div class="home-contact">
                        <?php if ( get_theme_mod('contact_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('contact_title')); ?></h3>

                          <?php } else {  ?> <h3><?php esc_html_e('Contact', 'superb') ?></h3>
                                   <?php } ?>
                          <?php
                        if (get_theme_mod('social_icons_check')) { ?>
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
                        <?php } ?>
                       <?php  if (get_theme_mod('contact_details_check')) { ?>
                          <?php if ( get_theme_mod('address_detail') !='' ) {  ?>
                          <p id="address"><?php echo esc_html(get_theme_mod('address_detail')); ?></p>
                                   <?php } else { ?>
                                  <p id="address"><?php esc_html_e('205, Gitanjali Mansion
                                                        Above ICICI Bank, Sector 11
                                                        Udaipur, Rajasthan, India.', 'superb') ?> </p>
                                          <?php } ?>

                             <ul><?php if ( get_theme_mod('contact_email') !='' ) {  ?><li id="email"><?php echo esc_html(get_theme_mod('contact_email')); ?></li>

                          <?php } else {  ?> <li id="email"> <?php esc_html_e('hello@ideaboxcreations.com', 'superb') ?></li>
                                   <?php } ?>

                          <?php if ( get_theme_mod('contact_phone') !='' ) {  ?><li id="phone"><?php echo esc_html(get_theme_mod('contact_phone')); ?></li>

                          <?php } else {  ?> <li id="phone"><?php esc_html_e('0294-678456', 'superb') ?></li>
                                   <?php } ?>
                             </ul>
                       <?php } ?>

                </div>
                 
                 <?php  if (get_theme_mod('contact_form_check')) { ?>
                    <div class="home-contact-form">
                        <div class="contact-form-wrapper">
                        <?php if ( get_theme_mod('superb_contact_form') !='' ) {  ?> 
                         <?php echo do_shortcode((get_theme_mod('superb_contact_form'))); ?>
                        <?php } else { ?>
                        <?php esc_html_e('You can add contact form here with a contact form shortcode'
                                . 'from Gravity Forms or Contact Form7 or any other plugin of your choice.', 'superb'); ?> 
                          <?php } ?>
                        </div>
                </div>
                 <?php } ?>
             </div>
         </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>