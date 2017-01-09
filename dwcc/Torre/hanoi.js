var nube;
var fichaPequeña;
var fichaMediana;
var fichaGrande;
var torre1;
var torre2;
var torre3;
var torres;
var nube;
var findeljuego;
var intervalo;
var torreDescarte;
var masPequeña = false;
var mediana = false;
var grande = false;
var fichaColocada=false;


window.onload = function(){
	findeljuego = false;
	fichaPequeña = new Ficha(70);
	fichaMediana = new Ficha(120);
	fichaGrande = new Ficha(160);
	nube = new Nube();
	torre1 = new Torre("torre1");
	torre2 = new Torre("torre2");
	torre3 = new Torre("torre3");
	torres = [torre1,torre2,torre3];


	torre1.setFicha(fichaGrande);
	torre1.setFicha(fichaMediana);
	torre1.setFicha(fichaPequeña);
	document.getElementById("mensaxes").innerHTML = "Empezemos";
	//intervalo = setInterval("torre(Math.floor(Math.random()*3))",500);
	
	
	console.log(document.getElementsByTagName('div'));
	console.log(document.getElementById("torre1").parentNode);

	
}

function torre(posicion)
{
	if(!findeljuego)
	{
		console.log(posicion);
		if(nube.hayFicha === true)
		{
			var fichaAux = nube.getFicha();
			var fichaColocada = false;
			fichaColocada  = torres[posicion].setFicha(fichaAux);
			if(fichaColocada==false)
			{
				nube.setFicha(fichaAux);
				console.log("La ficha no puede colocarse ");
			}else
				console.log("ficha colocada ");
			
		}else
		{
			nube.setFicha(torres[posicion].getFicha());
		}
	}else
		{
			clearInterval(intervalo);
			document.getElementById("mensaxes").innerHTML = "Fin del juego";
		}
	
}
function iniciarResolver(){
	intervalo = setInterval("resolver()",1000);
}
function resolver()
{
	if(!findeljuego)
	{
		var fichaColocada = false;
		for(i=0;i<3;i++)
		{
			if(torres[i].tamañoFichaTop() == 70 && masPequeña==false)
			{
				nube.setFicha(torres[i].getFicha());
				masPequeña = true;
				grande = false;
				colocarFicha();
				fichaColocada = false;
			
			}else
			{
				if(torres[i].tamañoFichaTop() == 120 && mediana==false)
				{
					
					nube.setFicha(torres[i].getFicha());
					mediana = true;
					colocarFicha();
					fichaColocada = false;
				}else
					if(torres[i].tamañoFichaTop() == 160 && grande==false)
					{
						if(i=0)
							masPequeña=false;
						else
						{
							nube.setFicha(torres[i].getFicha());
							grande = true;
							colocarFicha();
							fichaColocada = false;
						}
					}	
			}
		}

	}else
	{
		clearInterval(intervalo);
		document.getElementById("mensaxes").innerHTML = "Fin del juego";
	}
}
function colocarFicha(){
	
	if(nube.hayFicha===true)
	{
		for(i=0;i<3;i++)
		{
			console.log(torres[i].numFichasTotal());
			if(fichaColocada == false)
			{
				if(masPequeña==true && torres[i].numFichasTotal()==0)
				{
					ponerFicha(i);
				}else{
					if(mediana==true && torres[i].numFichasTotal()==0)
						ponerFicha(i);
				}
			}
		}
	}
}
function ponerFicha(i)
{
	var fichaAux = nube.getFicha();
	fichaColocada  = torres[i].setFicha(fichaAux);
	console.log(fichaColocada + "  " +i);
	//torreDescarte = i;
	if(fichaColocada==false)
	{
		nube.setFicha(fichaAux);
		console.log("La ficha no puede colocarse ");
	}else
		console.log("ficha colocada ");
}
function reinicio()
{
	location.reload();
}



//document.getElementById("mensaxes").innerHTML = "asd";

  

 