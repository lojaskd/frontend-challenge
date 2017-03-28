$(document).ready(function(){
	$('#itensStatus').on('click', function(){
		if( !$(this).hasClass('active') )
			$(this).children('i.fa').removeClass('fa-caret-right').addClass('fa-caret-down');
		else
			$(this).children('i.fa').removeClass('fa-caret-down').addClass('fa-caret-right');
	});

	$('.timeline-vertical dd').each(function(i, e){
		if($(this).next('dt').hasClass('done'))
			$(this).addClass('toDone');
		else if($(this).next('dt').hasClass('ongoing'))
			$(this).addClass('toOngoing');
		else if($(this).next('dt').hasClass('disabled'))
			$(this).addClass('toDisabled');
	});

	$('.timeline-horizontal li').on('click', function(){
		if(!$(this).hasClass('active'))
			$('.timeline-horizontal li').outerHeight(45 + $(this).children('.collapsible-body').outerHeight());
		else
			$('.timeline-horizontal li').css('height', 'auto')
	})
});