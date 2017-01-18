
var imagenes;


window.onload = function(){
	imagenes = document.getElementsByTagName("img");
	var aux = new Array();
	for(i=0;i<imagenes.length;i++)
	{
		aux[i] = imagenes[i].cloneNode(true);
	}
	imagenes = aux;
	
	
	
	
}


function changeImg(img){
	
	img.setAttribute("src","img/facebook_2.png");
	
}
function returnImg(img){

	for(i=0;i<imagenes.length;i++)
	{
		if(imagenes[i].getAttribute("name") == img.getAttribute("name"))
		{
			img.setAttribute("src",imagenes[i].getAttribute("src"));
		}
	}
}
