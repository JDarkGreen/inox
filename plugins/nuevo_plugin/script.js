
var  j = jQuery.noConflict();

(function($){

	j(document).on('ready',function(){

		//
		// ###### EFECTO ACORDEON PARA EL WIDGET
		//
		var title = j('.toggle-category__title');
		//evento click
		title.on('click',function(e){
			//declarar la variable menu hijo
			var menu_subcat = j(this).parent('.toggle-category').find('ul.toggle-category__menu');

			j('ul.toggle-category__menu').removeClass('control');
			menu_subcat.addClass('control');

			j('ul.toggle-category__menu').each(function(){
				if( !j(this).hasClass('control') ){
					j(this).slideUp(300);
				}else{
					j(this).slideToggle(300);
				}
			});



		});

	});

})(jQuery)