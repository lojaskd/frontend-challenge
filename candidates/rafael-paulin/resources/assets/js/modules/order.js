$(document).ready(function(){
	$('#itensStatus').on('click', 'li', function(){
		if( $(this).hasClass('active') )
			$(this).find('i.fa').removeClass('fa-caret-right').addClass('fa-caret-down');
		else
			$(this).find('i.fa').removeClass('fa-caret-down').addClass('fa-caret-right');
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
			$(this).outerHeight(45 + $(this).children('.collapsible-body').outerHeight());
		else
			$(this).css('height', 'auto')
	})
});