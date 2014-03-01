$(function(){
	$(".cabecera").bind({
	    click:function(evt){
	        evt.preventDefault();
	        // console.log($(this).attr('href'));
	        var mostrar_hijo = $(this).attr('href');
	        $("#modulo_hijos .current").removeClass('current').addClass('ocultar');
	        $(mostrar_hijo).removeClass('ocultar').addClass('current');
	    }
	});
});