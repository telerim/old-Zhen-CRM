$("select").css("min-width", "70px");
$("select").chosen();

$( "#flashMessage" ).fadeIn('fast').fadeOut('fast')
        .fadeIn('fast').delay(3000).fadeOut(1500);

function toggleTrFilter() {
	$("#tr_indexview_filter").fadeToggle();
}
	
