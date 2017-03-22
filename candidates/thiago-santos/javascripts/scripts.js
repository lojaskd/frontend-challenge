	$(function(){
		$('.combo').click(function(){
			$('.box-itens').slideToggle();
		});
		$('.andamento .info').click(function(){
			$(this).parent().siblings().slideToggle();
		});
		$('.produtos .info.ativo').click(function(){
			$('.timeline').slideToggle();
		})
	})




$(document).ready(function() {
	// Test for placeholder support
    $.support.placeholder = (function(){
        var i = document.createElement('input');
        return 'placeholder' in i;
    })();

    // Hide labels by default if placeholders are supported
    if($.support.placeholder) {
        $('.form-label').each(function(){
            $(this).addClass('js-hide-label');
        });  

        // Code for adding/removing classes here
        $('.form-group').find('input, textarea').on('keyup blur focus', function(e){
            
            // Cache our selectors
            var $this = $(this),
                $parent = $this.parent().find("label");

            if (e.type == 'keyup') {
                if( $this.val() == '' ) {
                    $parent.addClass('js-hide-label'); 
                } else {
                    $parent.removeClass('js-hide-label');   
                }                     
            } 
            else if (e.type == 'blur') {
                if( $this.val() == '' ) {
                    $parent.addClass('js-hide-label');
                } 
                else {
                    $parent.removeClass('js-hide-label').addClass('js-unhighlight-label');
                }
            } 
            else if (e.type == 'focus') {
                if( $this.val() !== '' ) {
                    $parent.removeClass('js-unhighlight-label');
                }
            }
        });
    } 
});

$(function(){

	$( "#contact-form" ).submit(function(event) {
		var pedido = $( "#pedido" ).val().length;
		var cpf = $( "#cpf" ).val().length;

	  if ( pedido == "") {
	  	$('#pedido').parent().find('.msg').append('<label class="error">Não pode ficar em branco</label>');
	  	$('#pedido').addClass('invalid');  	
	    return false;
	  }
	  if ( cpf == "") {
	    $('#cpf').parent().find('.msg').append('<label class="error">Não pode ficar em branco</label>');
	    $('#cpf').addClass('invalid');
	    return false;
	  }

	  $('.form-group > input').addClass('valid').delay(500);

	  window.location = "acompanhamento.html";
	 
	  event.preventDefault();
	});
 
});