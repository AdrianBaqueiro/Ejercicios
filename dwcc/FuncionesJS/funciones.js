function CrearHtml(ejercios)
{
	for (i=0;i<=ejercios;i++)
	{
		document.write("<div class='ejercicio'><button onClick='ejercicio"+i+"()'>Ejercicio"+i+"</button></div>");
	}
	window.alert("asd");
}