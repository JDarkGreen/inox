<?php
/**
 * Superb Theme Customizer support
 *
 * @package WordPress
 * @subpackage Superb
 * @since Superb 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Superb 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function superb_customize_register($wp_customize) {
    $wp_customize->get_section('header_image')->priority = 26;
    $wp_customize->get_section('static_front_page')->priority = 27;
    $wp_customize->get_section('nav')->priority = 28;

    /** ===============
     * Extends CONTROLS class to add textarea
     */
    class superb_customize_textarea_control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>

            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>

            <?php
        }

    }

    // Displays a list of categories in dropdown
    class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {

        public $type = 'dropdown-categories';

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                    array(
                        'name' => '_customize-dropdown-categories-' . $this->id,
                        'echo' => 0,
                        'hide_empty' => false,
                        'show_option_none' => '&mdash; ' . __('Select', 'superb') . ' &mdash;',
                        'hide_if_empty' => false,
                        'selected' => $this->value(),
                    )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown);

            printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>', $this->label, $dropdown
            );
        }

    }

    // Add new section for theme layout and color schemes
    $wp_customize->add_section('superb_theme_layout_settings', array(
        'title' => __('Color Scheme', 'superb'),
        'priority' => 30,
    ));


    // Add color scheme options

    $wp_customize->add_setting('superb_color_scheme', array(
        'default' => 'red',
        'sanitize_callback' => 'superb_sanitize_color_scheme_option',
    ));

    $wp_customize->add_control('superb_color_scheme', array(
        'label' => 'Color Schemes',
        'section' => 'superb_theme_layout_settings',
        'default' => 'red',
        'type' => 'radio',
        'choices' => array(
            'red' => __('Red', 'superb'),
            'green' => __('Green', 'superb')
        ),
    ));


    // Add new section for Header Contact settings
    $wp_customize->add_section('header_contact_setting', array(
        'title' => __('Header Contact', 'superb'),
        'priority' => 36,
    ));

    $wp_customize->add_setting('header_contact', array('default' => '',
        'sanitize_callback' => 'superb_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'header_contact', array(
        'label' => __('Contact Detail', 'superb'),
        'section' => 'header_contact_setting',
        'settings' => 'header_contact',
        'priority' => 2,
    )));

    // Add new section for slider settings
    $wp_customize->add_section('home_slider_setting', array(
        'title' => __('Home Slider', 'superb'),
        'priority' => 37,
    ));

    $wp_customize->add_setting('slider_one', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_one', array(
        'label' => 'Slider 1',
        'section' => 'home_slider_setting',
        'settings' => 'slider_one',
        'priority' => 1,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_one', array(
        'label' => __('Slider One Title', 'superb'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_one',
        'priority' => 2,
    ));

    $wp_customize->add_setting('slider_one_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'slider_one_description', array(
        'label' => __('Description', 'superb'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_description',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('slider_one_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_link_text', array(
        'label' => __('Slider One Link Text', 'superb'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('slider_one_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_link_url', array(
        'label' => __('Slider One Link URL', 'superb'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_link_url',
        'priority' => 5,
    ));

    $wp_customize->add_setting('slider_two', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_two', array(
        'label' => 'Slider 2',
        'section' => 'home_slider_setting',
        'settings' => 'slider_two',
        'priority' => 6,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_two', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_two', array(
        'label' => __('Slider Two Title', 'superb'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_two',
        'priority' => 7,
    ));

    $wp_customize->add_setting('slider_two_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'slider_two_description', array(
        'label' => __('Description', 'superb'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_description',
        'priority' => 8,
    )));

    // link text
    $wp_customize->add_setting('slider_two_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_link_text', array(
        'label' => __('Slider Two Link Text', 'superb'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_link_text',
        'priority' => 9,
    ));

    // link url
    $wp_customize->add_setting('slider_two_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_link_url', array(
        'label' => __('Slider Two Link URL', 'superb'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_link_url',
        'priority' => 10,
    ));
   
    // Add new section for Social Icons
    $wp_customize->add_section('social_icon_setting', array(
        'title' => __('Social Icons', 'superb'),
        'priority' => 35,
    ));

    // link url
    $wp_customize->add_setting('facebook_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('facebook_link_url', array(
        'label' => __('Facebook URL', 'superb'),
        'section' => 'social_icon_setting',
        'settings' => 'facebook_link_url',
        'priority' => 1,
    ));

    // link url
    $wp_customize->add_setting('twitter_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('twitter_link_url', array(
        'label' => __('Twitter URL', 'superb'),
        'section' => 'social_icon_setting',
        'settings' => 'twitter_link_url',
        'priority' => 2,
    ));

    // link url
    $wp_customize->add_setting('googleplus_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('googleplus_link_url', array(
        'label' => __('Google Plus URL', 'superb'),
        'section' => 'social_icon_setting',
        'settings' => 'googleplus_link_url',
        'priority' => 3,
    ));

    // link url
    $wp_customize->add_setting('pinterest_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('pinterest_link_url', array(
        'label' => __('Pinterest URL', 'superb'),
        'section' => 'social_icon_setting',
        'settings' => 'pinterest_link_url',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('github_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('github_link_url', array(
        'label' => __('Github URL', 'superb'),
        'section' => 'social_icon_setting',
        'settings' => 'github_link_url',
        'priority' => 5,
    ));

    // link url
    $wp_customize->add_setting('youtube_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('youtube_link_url', array(
        'label' => __('Youtube URL', 'superb'),
        'section' => 'social_icon_setting',
        'settings' => 'youtube_link_url',
        'priority' => 6,
    ));


    // Add new section for Home Featured One settings
    $wp_customize->add_section('home_featured_one_setting', array(
        'title' => __('Home Featured #1', 'superb'),
        'priority' => 40,
    ));


    $wp_customize->add_setting('home_featured_one');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'home_featured_one', array(
        'label' => 'Featured Image',
        'section' => 'home_featured_one_setting',
        'settings' => 'home_featured_one',
        'priority' => 1,
            )
            )
    );

    // home Title
    $wp_customize->add_setting('home_title_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_one', array(
        'label' => __('Title', 'superb'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_title_one',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_one', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'home_description_one', array(
        'label' => __('Description', 'superb'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_description_one',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_one_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_one_link_text', array(
        'label' => __('Link Text', 'superb'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_one_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_one_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_one_link_url', array(
        'label' => __('Link URL', 'superb'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_one_link_url',
        'priority' => 5,
    ));

    // Add new section for Home Featured Two settings
    $wp_customize->add_section('home_featured_two_setting', array(
        'title' => __('Home Featured #2', 'superb'),
        'priority' => 45,
    ));


    $wp_customize->add_setting('home_featured_two');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'home_featured_two', array(
        'label' => 'Featured Image',
        'section' => 'home_featured_two_setting',
        'settings' => 'home_featured_two',
        'priority' => 1,
            )
            )
    );

    // home Title
    $wp_customize->add_setting('home_title_two', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_two', array(
        'label' => __('Title', 'superb'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_title_two',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_two', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'home_description_two', array(
        'label' => __('Description', 'superb'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_description_two',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_two_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_two_link_text', array(
        'label' => __('Link Text', 'superb'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_two_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_two_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_two_link_url', array(
        'label' => __('Link URL', 'superb'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_two_link_url',
        'priority' => 5,
    ));



    // Add new section for Home Featured Three settings
    $wp_customize->add_section('home_featured_three_setting', array(
        'title' => __('Home Featured #3', 'superb'),
        'priority' => 50,
    ));


    $wp_customize->add_setting('home_featured_three');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'home_featured_three', array(
        'label' => 'Featured Image',
        'section' => 'home_featured_three_setting',
        'settings' => 'home_featured_three',
        'priority' => 1,
            )
            )
    );

    // home Title
    $wp_customize->add_setting('home_title_three', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_three', array(
        'label' => __('Title', 'superb'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_title_three',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_three', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'home_description_three', array(
        'label' => __('Description', 'superb'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_description_three',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_three_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_three_link_text', array(
        'label' => __('Link Text', 'superb'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_three_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_three_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_three_link_url', array(
        'label' => __('Link URL', 'superb'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_three_link_url',
        'priority' => 5,
    ));



    // Add new section for Home Tagline settings
    $wp_customize->add_section('tagline_setting', array(
        'title' => __('Home Tagline', 'superb'),
        'priority' => 55,
    ));


    // Tagline Title
    $wp_customize->add_setting('tagline_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('tagline_title', array(
        'label' => __('Tagline', 'superb'),
        'section' => 'tagline_setting',
        'settings' => 'tagline_title',
    ));

    $wp_customize->add_setting('tagline_description', array('default' => '',
        'sanitize_callback' => 'superb_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'tagline_description', array(
        'label' => __('Description', 'superb'),
        'section' => 'tagline_setting',
        'settings' => 'tagline_description',
        'priority' => 20,
    )));
    
    
    // Add new section for Home Intro Text 
    $wp_customize->add_section('superb_home_intro', array(
        'title' => __('Home Intro Text', 'superb'),
        'priority' => 57,
    ));

    
    // video Title
    $wp_customize->add_setting('superb_home_intro_text_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('superb_home_intro_text_title', array(
        'label' => __('Section Title', 'superb'),
        'section' => 'superb_home_intro',
        'settings' => 'superb_home_intro_text_title',
        'priority' => 3,
    ));


    $wp_customize->add_setting('superb_home_textarea', array('default' => '',
        'sanitize_js_callback' => 'superb_sanitize_escaping',
        'sanitize_callback' => 'superb_sanitize_text',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'superb_home_textarea', array(
        'label' => __('Text/HTML', 'superb'),
        'section' => 'superb_home_intro',
        'settings' => 'superb_home_textarea',
        'priority' => 4,
    )));


    // Add new section for Home Video settings
    $wp_customize->add_section('video_setting', array(
        'title' => __('Home Video', 'superb'),
        'priority' => 58,
    ));

    
    // video Title
    $wp_customize->add_setting('video_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('video_title', array(
        'label' => __('Section Title', 'superb'),
        'section' => 'video_setting',
        'settings' => 'video_title',
        'priority' => 3,
    ));


    $wp_customize->add_setting('home_video', array('default' => '',
        'sanitize_js_callback' => 'superb_sanitize_escaping',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'home_video', array(
        'label' => __('Video Code', 'superb'),
        'section' => 'video_setting',
        'settings' => 'home_video',
        'priority' => 4,
    )));

    

    // Add new section for displaying Featured Posts on Front Page
    $wp_customize->add_section('superb_front_page_post_options', array(
        'title' => __('Featured Posts', 'superb'),
        'description' => __('Settings for displaying featured posts on Front Page', 'superb'),
        'priority' => 60,
    ));

    // enable featured posts on front page?
    $wp_customize->add_setting('superb_front_featured_posts_check', array(
        'default' => 1,
        'sanitize_callback' => 'superb_sanitize_checkbox',
    ));
    $wp_customize->add_control('superb_front_featured_posts_check', array(
        'label' => __('Show featured posts on Front Page', 'superb'),
        'section' => 'superb_front_page_post_options',
        'priority' => 1,
        'type' => 'checkbox',
    ));


    // post Title
    $wp_customize->add_setting('superb_post_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('superb_post_title', array(
        'label' => __('Section Title', 'superb'),
        'section' => 'superb_front_page_post_options',
        'settings' => 'superb_post_title',
        'priority' => 2,
    ));

    // select category for featured posts 
    $wp_customize->add_setting('superb_front_featured_posts_cat', array('default' => 0,));
    $wp_customize->add_control(new WP_Customize_Dropdown_Categories_Control($wp_customize, 'superb_front_featured_posts_cat', array(
        'label' => __('Post Category', 'superb'),
        'section' => 'superb_front_page_post_options',
        'type' => 'dropdown-categories',
        'settings' => 'superb_front_featured_posts_cat',
        'priority' => 30,
    )));


    // Add new section for Home CTA settings
    $wp_customize->add_section('home_cta_setting', array(
        'title' => __('Home CTA', 'superb'),
        'priority' => 62,
    ));

    $wp_customize->add_setting('cta_text', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'cta_text', array(
        'label' => __('CTA Text', 'superb'),
        'section' => 'home_cta_setting',
        'settings' => 'cta_text',
        'priority' => 1,
    )));


    // link text
    $wp_customize->add_setting('home_cta_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_cta_link_text', array(
        'label' => __('Link Text', 'superb'),
        'section' => 'home_cta_setting',
        'settings' => 'home_cta_link_text',
        'priority' => 2,
    ));

    // link url
    $wp_customize->add_setting('home_cta_link_url', array('default' => __('', 'superb'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_cta_link_url', array(
        'label' => __('Link URL', 'superb'),
        'section' => 'home_cta_setting',
        'settings' => 'home_cta_link_url',
        'priority' => 3,
    ));

    // Add new section for Contact Details settings
    $wp_customize->add_section('contact_setting', array(
        'title' => __('Contact Details', 'superb'),
        'priority' => 64,
    ));
    
    // contact Title
    $wp_customize->add_setting('contact_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('contact_title', array(
        'label' => __('Section Title', 'superb'),
        'section' => 'contact_setting',
        'settings' => 'contact_title',
        'priority' => 1,
    ));

    
    $wp_customize->add_setting('social_icons_check', array('default' => 0,
        'sanitize_callback' => 'superb_sanitize_checkbox',
    ));

    $wp_customize->add_control('social_icons_check', array(
        'label' => __('Show Social Icons', 'superb'),
        'section' => 'contact_setting',
        'priority' => 2,
        'type' => 'checkbox',
    ));

    
    $wp_customize->add_setting('contact_details_check', array('default' => 0,
        'sanitize_callback' => 'superb_sanitize_checkbox',
    ));

    $wp_customize->add_control('contact_details_check', array(
        'label' => __('Show Contact Details', 'superb'),
        'section' => 'contact_setting',
        'priority' => 3,
        'type' => 'checkbox',
    ));

    
    $wp_customize->add_setting('contact_email', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('contact_email', array(
        'label' => __('Email', 'superb'),
        'section' => 'contact_setting',
        'settings' => 'contact_email',
        'priority' => 4,
    ));

    $wp_customize->add_setting('contact_phone', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label' => __('Phone', 'superb'),
        'section' => 'contact_setting',
        'settings' => 'contact_phone',
        'priority' => 5,
    ));

    $wp_customize->add_setting('address_detail', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'address_detail', array(
        'label' => __('Address', 'superb'),
        'section' => 'contact_setting',
        'settings' => 'address_detail',
        'priority' => 6,
    )));



    // Add new section for Home Contact settings
    $wp_customize->add_section('superb_contact_form_setting', array(
        'title' => __('Contact Form', 'superb'),
        'priority' => 67,
    ));

    $wp_customize->add_setting('contact_form_check', array('default' => 0,
        'sanitize_callback' => 'superb_sanitize_checkbox',
    ));

    $wp_customize->add_control('contact_form_check', array(
        'label' => __('Show Contact form', 'superb'),
        'section' => 'superb_contact_form_setting',
        'priority' => 1,
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('superb_contact_form', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('superb_contact_form', array(
        'label' => __('Contact Form Short Code', 'superb'),
        'section' => 'superb_contact_form_setting',
        'settings' => 'superb_contact_form',
        'priority' => 2,
    ));


    // Add footer text section
    $wp_customize->add_section('superb_footer', array(
        'title' => 'Footer Text', // The title of section
        'priority' => 75,
    ));

    $wp_customize->add_setting('superb_footer_footer_text', array(
        'default' => null,
        'sanitize_callback' => 'sanitize_text_field',
        'sanitize_js_callback' => 'superb_sanitize_escaping',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'superb_footer_footer_text', array(
        'section' => 'superb_footer', // id of section to which the setting belongs
        'settings' => 'superb_footer_footer_text',
    )));


    // Add custom CSS section
    $wp_customize->add_section('superb_custom_css', array(
        'title' => 'Custom CSS', // The title of section
        'priority' => 80,
    ));

    $wp_customize->add_setting('superb_custom_css', array(
        'default' => '',
        'sanitize_callback' => 'superb_sanitize_custom_css',
        'sanitize_js_callback' => 'superb_sanitize_escaping',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new superb_customize_textarea_control($wp_customize, 'superb_custom_css', array(
        'section' => 'superb_custom_css', // id of section to which the setting belongs
        'settings' => 'superb_custom_css',
    )));



    //remove default customizer sections
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('colors');

    // add post message for various customizer settings 
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
}

add_action('customize_register', 'superb_customize_register');


/* Sanitize text area 
 * 
 * @since Superb 1.0 
 */

function superb_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/*
 * Sanitize numeric values 
 * 
 * @since Superb 1.0
 */

function superb_sanitize_integer($input) {
    if (is_numeric($input)) {
        return intval($input);
    }
}

/*
 * Escaping for input values
 * 
 * @since Superb 1.0
 */

function superb_sanitize_escaping($input) {
    $input = esc_attr($input);
    return $input;
}

/*
 * Sanitize Custom CSS 
 * 
 * @since Superb 1.0
 */

function superb_sanitize_custom_css($input) {
    $input = wp_kses_stripslashes($input);
    return $input;
}

/*
 * Sanitize Checkbox input values
 * 
 * @since Superb 1.0
 */

function superb_sanitize_checkbox($input) {
    if ($input) {
        $output = '1';
    } else {
        $output = false;
    }
    return $output;
}

/*
 * Sanitize layout options 
 * 
 * @since Superb 1.0
 */

function superb_sanitize_layout_option($layout_option) {
    if (!in_array($layout_option, array('full-width', 'boxed'))) {
        $layout_option = 'boxed';
    }

    return $layout_option;
}

/*
 * Sanitize color scheme options 
 * 
 * @since Superb 1.0
 */

function superb_sanitize_color_scheme_option($colorscheme_option) {
    if (!in_array($colorscheme_option, array('blue', 'red', 'green', 'yellow'))) {
        $colorscheme_option = 'blue';
    }

    return $colorscheme_option;
}

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Superb 1.0
 */
function superb_customize_preview_js() {
    wp_enqueue_script('superb_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '20131205', true);
}

add_action('customize_preview_init', 'superb_customize_preview_js');

function superb_header_output() {
    ?>
    <!--Customizer CSS--> 
    <style type="text/css">
    <?php echo esc_attr(get_theme_mod('superb_custom_css')); ?>
    </style> 
    <!--/Customizer CSS-->
    <?php
}

// Output custom CSS to live site
add_action('wp_head', 'superb_header_output');
