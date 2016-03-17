<?php /* Template Name: Descargables Template */ ?>

<!-- Header -->
<?php get_header(); ?>


<!-- Contenido o Galería -->
<main class="section-wrapper sectionWrapperMultimedia">

<!-- conseguir las taxonomias-->
<?php  
	$name_tax = "descargables_categoria_taxonomy";

	$args = array(
		/*'hide_empty' => false,*/
		'orderby'    => 'name',
		'order'      => 'ASC',
	);

	$taxonomies = get_terms( $name_tax , $args );

	if( !empty($taxonomies) ) :

	foreach( $taxonomies as $tax ) :
?>
	<!-- Titulo -->
	<h2 class="section-wrapper__title"><?= $tax->name . ": " ?></h2>
	
	<!-- Contenedor flexible -->
	<section class="section-wrapper--onlyflex section-wrapper--flex-wrap">
	<?php  
		//query para sacar los datos de los posts
		$args2 = array(
			'post_type' => 'descargables',
			'tax_query' => array(
				array(
					'taxonomy' => $name_tax ,
					'field'    => 'slug',
					'terms'    => $tax->slug,
				),
			),
		);
		$query = new WP_Query( $args2 );

		if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
	?>
	<?php 
		$url = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);
		if( !empty($url) ) :
	?>
		<article class="sectionWrapperMultimedia__article--medium">
			<?php /*echo $tax->slug; */?>
			<figure>
				<?php 
					//según sea el tipo de contenido
					$src = "";
					switch ($tax->slug) {
						case 'fichas-tecnicas':
							$src = "icono_ficha_t.png";
							break;
						case 'publicaciones':
							$src = "icono_publi.png";
							break;
						default:
							$src = "pdf.jpg";
							break;
					}
				?>
				<img src="<?= get_template_directory_uri(); ?>/images/icon-download/<?= $src ?>" alt="<?php the_title() ?>" class="img-responsive" />
			</figure>

			<!-- Titulo -->
			<h3 class="sectionWrapperMultimedia__article__title"><?php the_title(); ?></h3>

				<a target="_blank" href="<?= $url['url'] ?>" class="sectionWrapperMultimedia__article__button">
					<?php _e('Descargar' , 'inox-framework' ); ?>
				</a> <!-- /.sectionWrapperMultimedia__article__button -->
		</article> <!-- /.sectionWrapperMultimedia__article -->

		<?php endif; ?>
	
	<?php endwhile; endif; wp_reset_postdata(); ?>

	</section> <!-- /.section-wrapper--flex section-wrapper--flex-wrap -->


<?php endforeach; endif; ?>



</main> <!-- /.section-wrapper sectionWrapperMultimedia -->


<!-- Footer -->
<?php get_footer(); ?>