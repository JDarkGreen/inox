<?php /* Template Name: Contacto Template */ ?>

<!-- Header -->
<?php get_header(); ?>

<!-- Seccion del mapa -->
<section class="sectionMap">
	<div id="canvas-map"></div><!-- /canvas-map -->
</section> <!-- /section -->

<!-- Seccion Principal -->
<!-- Contenido o Galería DE Imagenes -->
<main class="section-wrapper">
	<!-- Titulo -->
	<h2 class="section-wrapper__title"><?php _e( 'Contáctenos' , 'inox-framework' ); ?></h2>

	<!--  -->
	<div class="section-wrapper--flex">

		<!-- Seccion de Informacion -->
		<section class="section-wrapper__middle">
			<p class="pageContact_paragraph">Para mayor información acerca de nuestros servicios, no dude en comunicarse con nosotros.</p>
			<!-- Telefonos -->
			<p class="pageContact_paragraph"><strong>Fijo: </strong> (511) 249-0098 (511) 301-4685</p>
			<!-- Email -->
			<p class="pageContact_paragraph"><strong>E-mail:</strong> ventas@inoxchef.com</p>

			<!-- Contactos -->
			<p class="pageContact_paragraph">Jessica Córdova C.</p>
			<p class="pageContact_paragraph"><strong>E-mail:</strong> jessicacordova@inoxchef.com / jc.inoxchef@hotmail.com</p>
			<p class="pageContact_paragraph">Cel.: 993 882 056</p>
			<br/>
			<p class="pageContact_paragraph">Marilyn Herrera C.</p>
			<p class="pageContact_paragraph"><strong>E-mail:</strong> marilynherrera@inoxchef.com / mhc.inoxchef@hotmail.com</p>
			<p class="pageContact_paragraph"><strong>Dirección:</strong> Jr. Teniente Jiménez Nº 416, Urb. La Campiña – Chorrillos (a la espalda de la Escuela de Oficiales)</p>

			<br/>

		</section> <!-- /.section-wrapper__middle -->

		<!-- Seccion de formulario -->
		<section class="section-wrapper__middle">
			<!-- Formulario -->
			<form class="pageContact__form">
				<div class="form-group">
					<label for="input_name"><?php _e( 'Nombre: ' , 'inox-framework' ); ?></label> <br/>
					<input type="text" id="input_name" name="input_name" placeholder="Escriba su nombre:" required />
				</div><!-- /form-group -->
				<div class="form-group">
					<label for="input_lastname"><?php _e( 'Apellidos: ' , 'inox-framework' ); ?></label> <br/>
					<input type="text" id="input_lastname" name="input_lastname" placeholder="Escriba sus apellidos:" required/>
				</div><!-- /form-group -->
				<div class="form-group">
					<label for="input_email"><?php _e( 'Email: ' , 'inox-framework' ); ?></label> <br/>
					<input type="email" id="input_email" name="input_email" placeholder="Escriba su Email:" required/>
				</div><!-- /form-group -->
				<div class="form-group">
					<label for="inpu_subject"><?php _e( 'Asunto: ' , 'inox-framework' ); ?></label> <br/>
					<input type="text" id="input_subject" name="inpu_subject" placeholder="Escriba el Asunto:" required />
				</div><!-- /form-group -->
				<div class="form-group">
					<label for="textarea_message"><?php _e( 'Mensaje: ' , 'inox-framework' ); ?></label> <br/>
					<textarea id="textarea_message" name="textarea_message" placeholder="Escriba su mensaje:"></textarea>
				</div><!-- /form-group -->
				<div class="form-group">
					<button type="submit"><?php _e( 'Enviar: ' , 'inox-framework' ); ?></button>
				</div><!-- /form-group -->
			</form>

		</section><!-- /.section-wrapper__middle -->
		
	</div><!-- /.section-wrapper--flex -->

</main><!-- /section-wrapper -->


<!-- Script google maps -->
<script>
	var map;
	function initMap() {

		var myLatLng = {lat: -12.177706, lng: -76.992617 };

		var centrado = {lat: -12.1775747, lng:-76.9958809};

		var map = new google.maps.Map(document.getElementById('canvas-map'), {
			zoom  : 17,
			center: centrado
		});

		var infowindow = new google.maps.InfoWindow({
    		content: "<strong>INOX</strong><br/>Empresa dedicada a equipamientos de acero inox para cocinas."
  		});

	  	var marker = new google.maps.Marker({
			position: myLatLng,
			map     : map,
			title   : 'Inoxchef. Equipamientos en acero inox.'
	  	});

	  	marker.addListener('click', function() {
    		infowindow.open(map, marker);
  		});

	}

	initMap();
</script>


<!-- Footer -->
<?php get_footer(); ?>