$(document).ready(function(){
	$('.collapsible-header').on('click', function(){
		if( !$(this).hasClass('active') )
			$(this).children('i.fa').removeClass('fa-caret-right').addClass('fa-caret-down');
		else
			$(this).children('i.fa').removeClass('fa-caret-down').addClass('fa-caret-right');
	});


	$('.timeline-horizontal dd').each(function(i, e){
		if($(this).next('dt').hasClass('done'))
			$(this).addClass('toDone');
		else if($(this).next('dt').hasClass('ongoing'))
			$(this).addClass('toOngoing');
		else if($(this).next('dt').hasClass('disabled'))
			$(this).addClass('toDisabled');
	});
});