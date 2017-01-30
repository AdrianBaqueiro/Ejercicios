$(document).ready(function() {
  $('h1,h3').addClass("centrar");
	$('h3+p').addClass("primerP");
	$('a').addClass("hiper");
	$('#tecnologias').addClass("centrar");
	$('th').addClass("cabeceira");
	$('p+table').addClass("centrar");
	$('table').addClass("centrarTable");
	$('p:eq(3)').addClass("blackText");
  $('p:last').after("<p>&copy; El Pais Tecnología 2011.</p>");
});
