<?php
/**
 * AccesspressLite functions and definitions
 *
 * @package AccesspressLite
 */


if ( ! function_exists( 'accesspresslite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accesspresslite_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	/**
	 * Global content width.
	 */
	 if (!isset($content_width))
     	$content_width = 750; /* pixels */

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AccesspressLite, use a find and replace
	 * to change 'accesspresslite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'accesspresslite', get_template_directory() . '/languages' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();	

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/* 
     * Let WordPress manage the document title. 
     * By adding theme support, we declare that this theme does not use a 
     * hard-coded <title> tag in the document head, and expect WordPress to 
     * provide it for us. 
     */ 
 	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'event-thumbnail', 135, 100, true); //Latest News Events Small Image
	add_image_size( 'featured-thumbnail', 350, 245, true); //Featured Image
	add_image_size( 'portfolio-thumbnail', 400, 450, true); //Portfolio Image		

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'accesspresslite' ),
	) );

	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'accesspresslite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

}
endif; // accesspresslite_setup
add_action( 'after_setup_theme', 'accesspresslite_setup' );

/**
 * Implement the Theme Option feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Theme Option feature.
 */
require get_template_directory() . '/inc/admin-panel/theme-options.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Implement the custom metabox feature
 */
require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Implement the TGM PLugin Activation Class
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Implement the More Theme Page
 */
require get_template_directory() . '/inc/more-themes.php';

/***********************************************************************************************/
/* RETORNAR NUEVOS TIPOS DE ARCHIVO permitidos EN MEDIA UPLOAD */
/***********************************************************************************************/

add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes=array() ) {

	// Add *.EPS files to Media upload
	$existing_mimes['eps'] = 'application/postscript';

	// Add *.AI files to Media upload
	$existing_mimes['ai'] = 'application/postscript';

	return $existing_mimes;
}


/***********************************************************************************************/
/* Agregar nuevo tipo de contenido */
/***********************************************************************************************/

//IMAGENES
function inox_create_images_post_type()
{
	$labels = array(
		'name'               => __('Galería de Imagenes'),
		'singular_name'      => __('Galería de Imagenes'),
		'add_new'            => __('Nueva Imagen'),
		'add_new_item'       => __('Agregar Nueva Imagen'),
		'edit_item'          => __('Editar Imagen'),
		'view_item'          => __('Ver Imagen'),
		'search_items'       => __('Buscar Imagen'),
		'not_found'          => __('Imagen No Encontrada'),
		'not_found_in_trash' => __('Imagen No Encontrada en la papelera')
	);

	$args = array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'hierachical' => false,
		'supports' => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies' => array('post-tag','category'),
		'menu_icon' => 'dashicons-images-alt2'
	);

	register_post_type('galeria_imagenes',$args);
}

add_action('init','inox_create_images_post_type');

//VIDEOS 
function inox_create_videos_post_type()
{
	$labels = array(
		'name'               => __('Galería de Videos'),
		'singular_name'      => __('Galería de Videos'),
		'add_new'            => __('Nuevo Video'),
		'add_new_item'       => __('Agregar Nuevo Video'),
		'edit_item'          => __('Editar Video'),
		'view_item'          => __('Ver Video'),
		'search_items'       => __('Buscar Video'),
		'not_found'          => __('Video No Encontrado'),
		'not_found_in_trash' => __('Video No Encontrado en la papelera')
	);

	$args = array(
		'labels'      => $labels,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','category'),
		'menu_icon'   => 'dashicons-format-video'
	);

	register_post_type('galeria_videos',$args);
}

add_action('init','inox_create_videos_post_type');

//DESCARGABLES 
function inox_create_descargables_post_type()
{
	$labels = array(
		'name'               => __('Descargables'),
		'singular_name'      => __('Descargable'),
		'add_new'            => __('Nuevo Descargable'),
		'add_new_item'       => __('Agregar Nuevo Descargable'),
		'edit_item'          => __('Editar Descargable'),
		'view_item'          => __('Ver Descargable'),
		'search_items'       => __('Buscar Descargable'),
		'not_found'          => __('Descargable No Encontrado'),
		'not_found_in_trash' => __('Descargable No Encontrado en la papelera')
	);

	$args = array(
		'labels'      => $labels,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag'),
		'menu_icon'   => 'dashicons-download'
	);

	register_post_type('descargables',$args);
}

add_action('init','inox_create_descargables_post_type');

/***********************************************************************************************/
/* Registrar taxonomía para descargables  */
/***********************************************************************************************/

add_action( 'init', 'create_descargables_categories_taxonomies', 0 );

function create_descargables_categories_taxonomies() {
    register_taxonomy(
        'descargables_categoria_taxonomy',
        'descargables',
        array(
            'labels' => array(
                'name' => 'Categoría Descargable',
                'add_new_item' => 'Agregar nueva Categoría Descargable',
                'new_item_name' => "Nuevo nombre Categoría Descargable"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}




/***********************************************************************************************/
/* Agregar metabox url video para galeria de videos  */
/***********************************************************************************************/


add_action( 'add_meta_boxes', 'cd_meta_box_url_video_add' );
function cd_meta_box_url_video_add()
{
    add_meta_box( 'mb_url_video_inox', 'Url Video Galería', 'cd_meta_box_url_video_cb', 'galeria_videos', 'normal', 'high' );
}


function cd_meta_box_url_video_cb()
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
    $text = isset( $values['mb_url_video_text'] ) ? $values['mb_url_video_text'][0] : '';
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <label for="mb_url_video_text">Url de Video </label>
        <input type="text" size="50" name="mb_url_video_text" id="mb_url_video_text" value="<?php echo $text; ?>" />
    </p>
    <?php    
}

add_action( 'save_post', 'cd_meta_box_url_video_save' );
function cd_meta_box_url_video_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['mb_url_video_text'] ) )
        update_post_meta( $post_id, 'mb_url_video_text', wp_kses( $_POST['mb_url_video_text'], $allowed ) );
}

/***********************************************************************************************/
/* Agregar metabox subir contenido multimedia a los tipos de post descargables  */
/***********************************************************************************************/
function update_edit_form() {
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');


function add_mb_attachment_downloads() {
 
    // Define the custom attachment para tipo descargable
    add_meta_box(
        'wp_custom_attachment',
        'Personalizar Anexos',
        'wp_custom_attachment',
        'descargables',
        'side'
    );
 
} // end add_mb_attachment_downloads
add_action('add_meta_boxes', 'add_mb_attachment_downloads');

function wp_custom_attachment() {
 
    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');
     
    $html = '<p class="description">';
        $html .= 'Carga tu ARCHIVO aquí.';
    $html .= '</p>';
    $html .= '<input type="file" id="wp_custom_attachment" name="wp_custom_attachment" value="" style="max-width: 100%;font-size: 9.4px;" />';
     
    echo $html;
 
} // end wp_custom_attachment

function save_custom_meta_data($id) {
 
    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {
      return $id;
    } // end if
       
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $id;
    } // end if
  	 else {
        if(!current_user_can('edit_page', $id)) {
            return $id;
        } // end if
    } // end if
    /* - end security verification - */
     
    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment']['name'])) {
         
        // Setup the array of supported file types. In this case, it's just PDF.
        $supported_types = array('application/pdf','image/png','application/postscript','image/jpeg','application/photoshop');
         
        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));
        $uploaded_type = $arr_file_type['type'];
         
        // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {
 
            // Use the WordPress API to upload the file
            $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));
     
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('Hubo un error cargando tu archivo el error es: ' . $upload['error']);
            } else {
                add_post_meta($id, 'wp_custom_attachment', $upload);
                update_post_meta($id, 'wp_custom_attachment', $upload);     
            } // end if/else
 
        } else {
            wp_die("El tipo de archivo no es admitido.");
        } // end if/else
         
    } // end if
     
} // end save_custom_meta_data
add_action('save_post', 'save_custom_meta_data');


?>