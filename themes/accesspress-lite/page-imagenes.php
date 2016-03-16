<?php /* Template Name: Imagenes Template */ ?>

<!-- Header -->
<?php get_header(); ?>


<!-- Contenido o Galería DE Imagenes -->
<main class="section-wrapper sectionWrapperMultimedia">

	<!-- Titulo -->
	<h2 class="section-wrapper__title"><?php _e('Galería de Imágenes:' , 'inox-framework' ); ?></h2>

	<!-- Contenedor flexible -->
	<section class="section-wrapper--flex section-wrapper--flex-wrap">
		<?php  
			//the query
			$args = array(
				'post_type' => 'galeria_imagenes'
			);

			$the_query = new WP_Query($args);

			if( $the_query->have_posts() ) : 
				while( $the_query->have_posts() ) : $the_query->the_post();
		?>
			<!-- articulo -->
			<?php if( has_post_thumbnail() ) : ?>
			<article class="sectionWrapperMultimedia__article">
				<?php 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
					$url   = $thumb['0']; 
				?>
				<a class="fancybox" rel="gallery1" href="<?= $url ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</article><!-- /.sectionWrapperMultimedia__article -->
			<?php endif; ?>

		<?php endwhile; endif; wp_reset_postdata(); ?>
		
	</section> <!-- /.section-wrapper--flex -->

</main> <!-- /.section-wrapper sectionWrapperMultimedia -->


<!-- Footer -->
<?php get_footer(); ?>