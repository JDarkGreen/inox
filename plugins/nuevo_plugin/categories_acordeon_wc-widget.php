<?php 
/*Plugin Name: Lista de Categorias Acordeon
Description: Este widget muestra las categorias de los productos y las subcategorias en forma de acordeon
Version: 0.1
Author: Jose Gomez
Author URI: 
License: GPLv2
*/

class Categories_Acordeon_Widget extends WP_Widget {
     
    function __construct() {

    	parent::__construct(
        // base ID of the widget
    		'categories_acordeon_widget',
        // name of the widget
    		__('Lista de Categorias Acordeon', 'inox-framework' ),
        // widget options
    		array (
    			'description' => __( 'Este widget muestra las categorias de los productos y las subcategorias en forma de acordeon', 'inox-framework' )
    		)

    	);
    }
     
    function form( $instance ) {
        $title = !empty( $instance['title'] ) ? $instance['title'] : __( 'Categorías de Productos', 'inox-framework' ); ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titulo Categoría: ' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php 
    }
     
    function update( $new_instance, $old_instance ) { 
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
     
    function widget( $args, $instance ) {
        //registrar estilos
        wp_enqueue_style( 'my-style', plugins_url('style.css', __FILE__) );
        //registrar script
        wp_enqueue_script("jquery");
        wp_enqueue_script( 'my-script', plugins_url('script.js', __FILE__) );

        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }

        $args = array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
        );

        $all_categories = get_categories( $args ); 

            //variable control
            $control = 0;
        ?>

        <?php foreach ( $all_categories as $cat ) : ?>
        <?php if( $cat->category_parent == 0 ) : ?>

            <?php $active = $control == 0 ? 'block' : '' ?>

            <section class="toggle-category">
                <h2 class="toggle-category__title"><?= strtolower( $cat->name ) ; ?></h2>
                <?php  
                    //conseguir las categorias hijas
                    $child_categories = get_categories( array('taxonomy'=>'product_cat','orderby'=>'name','hide_empty' => false, 'parent' => $cat->cat_ID ) );

                    echo "<ul class='toggle-category__menu' style='display:$active'>";
                    
                    if( count($child_categories) > 0 ) :
                    foreach ($child_categories as $child ) :
                ?>
                    <li>
                        <a href="<?= get_term_link($child->slug , 'product_cat'); ?>">
                            <?= $child->name; ?>
                        </a>
                    </li> <!-- end categoria hija -->
                <?php endforeach; ?>
                <?php else: ?> <li><a href="">No hay subcategorias</a></li>
                <?php endif; echo "</ul>" ; ?>
            </section>
        <?php $control++; endif; endforeach;?>
         
        <?php 
        echo $args['after_widget'];
    }
     
}

//REGISTRANDO EL WIDGET
function categories_register_acordeon_widget() {
 
    register_widget( 'Categories_Acordeon_Widget' );
 
}
add_action( 'widgets_init', 'categories_register_acordeon_widget' );

?>