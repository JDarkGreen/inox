<?php /* Template Name: Video Template */ ?>

<!-- Header -->
<?php get_header(); ?>


<!-- Contenido o Galería DE Imagenes -->
<main class="section-wrapper sectionWrapperMultimedia">

	<!-- Titulo -->
	<h2 class="section-wrapper__title"><?php _e('Galería de Videos:' , 'inox-framework' ); ?></h2>

	<!-- Contenedor flexible -->
	<section class="section-wrapper--flex section-wrapper--flex-wrap">
		<?php  
			//the query
			$args = array(
				'post_type' => 'galeria_videos'
			);

			$the_query = new WP_Query($args);

			if( $the_query->have_posts() ) : 
				while( $the_query->have_posts() ) : $the_query->the_post();
		?>
			<!-- articulo -->
			<?php  
				//
				$url_video = get_post_meta( get_the_ID(), 'mb_url_video_text', true ); 
				$url_video = str_replace('watch?v=','embed/',$url_video);

				if( !empty($url_video) ) :
			?>

			<article class="sectionWrapperMultimedia__article">
				<iframe src="<?= $url_video ?>" frameborder="0" width="100%" height="200" allowfullscreen></iframe>
			</article><!-- /.sectionWrapperMultimedia__article -->
			<?php endif; ?>

		<?php endwhile; endif; wp_reset_postdata(); ?>
		
	</section> <!-- /.section-wrapper--flex -->

</main> <!-- /.section-wrapper sectionWrapperMultimedia -->


<!-- Footer -->
<?php get_footer(); ?>