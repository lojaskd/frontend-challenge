$(document).ready(function(){
	$('.collapsible-header').on('click', function(){
		if( !$(this).hasClass('active') )
			$(this).children('i.fa').removeClass('fa-caret-right').addClass('fa-caret-down');
		else
			$(this).children('i.fa').removeClass('fa-caret-down').addClass('fa-caret-right');

	});
});