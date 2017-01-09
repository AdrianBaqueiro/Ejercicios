function Torre(nombre){
	this.nombre = nombre;
	this.fichas = [null];
	this.numFichas = 0;
	this.setFicha = function(ficha){
		var fichaColocada=false;
		
		/* test 
		for(i=0;i<3;i++){
			if(this.fichas[i] == null)
			{
				this.fichas[i] = ficha;
				document.getElementById("mensaxes").innerHTML = "Ficha colocada en la posicion 0 de la "+this.nombre;
				console.log("Ficha colocada en la posicion 0 de la "+this.nombre+" ficha tamaño: "+ficha.getTamaño());
				fichaColocada=true;
				document.getElementById(this.nombre+"ficha"+(3-i)).style.width = ficha.getTamaño()+"px";
				document.getElementById(this.nombre+"ficha"+(3-i)).style.visibility = '';
				
			}
			
		}*/
		
		
		//console.log(this.nombre+" "+ficha);
		if(this.fichas[0] == null)
		{
			this.fichas[0] = ficha;
			document.getElementById("mensaxes").innerHTML = "Ficha colocada en la posicion 0 de la "+this.nombre+" "+ficha.getTamaño() ;
			console.log("Ficha colocada en la posicion 0 de la "+this.nombre+" ficha tamaño: "+ficha.getTamaño());
			fichaColocada=true;
			document.getElementById(this.nombre+"ficha3").style.width = ficha.getTamaño()+"px";
			document.getElementById(this.nombre+"ficha3").style.visibility = '';
			this.numFichas++;
		}else
		{
			if(this.fichas[1]==null)
			{
				if(this.fichas[0].getTamaño() > ficha.getTamaño() )
				{
					this.fichas[1] = ficha;
					document.getElementById("mensaxes").innerHTML = "Ficha colocada en la posicion 1 de la "+this.nombre;
					console.log("Ficha colocada en la posicion 1 de la "+this.nombre+" ficha tamaño: "+ficha.getTamaño());
					fichaColocada=true;
					document.getElementById(this.nombre+"ficha2").style.width = ficha.getTamaño()+"px";
					document.getElementById(this.nombre+"ficha2").style.visibility = '';
					this.numFichas++;
				}
				
			}else
			{
				if(this.fichas[2]==null)
				{
					if(this.fichas[1].getTamaño() > ficha.getTamaño() )
					{
						this.fichas[2] = ficha;
						document.getElementById("mensaxes").innerHTML = "Ficha colocada en la posicion 2 de la "+this.nombre;
						console.log("Ficha colocada en la posicion 2 de la "+this.nombre+" ficha tamaño: "+ficha.getTamaño());
						fichaColocada=true;
						document.getElementById(this.nombre+"ficha1").style.width = ficha.getTamaño()+"px";
						document.getElementById(this.nombre+"ficha1").style.visibility = '';
						this.numFichas++;
					}
				}else
					document.getElementById("mensaxes").innerHTML = "No pode poñela";
			}
		}
		if(this.fichas.length==3 && this.nombre != "torre1")
			findeljuego = true; // poner a true para que finalize
		return fichaColocada;
		
	}
	
	this.getFicha = function()
	{
		var aux;
		if(this.fichas[2]!=null)
		{
			console.log("Ficha quitada en la posicion 2 de la "+this.nombre+" Ficha: "+this.fichas[2].getTamaño());
			aux = this.fichas[2];
			this.fichas[2] = null;
			this.numFichas--;
			document.getElementById(this.nombre+"ficha1").style.visibility = 'hidden';
			return aux;
		}
		else
			if(this.fichas[1]!=null)
			{
				console.log("Ficha quitada en la posicion 1 de la "+this.nombre+" "+this.fichas[1].getTamaño());
				aux = this.fichas[1];
				this.fichas[1] = null;
				this.numFichas--;
				document.getElementById(this.nombre+"ficha2").style.visibility = 'hidden';
				return aux;
			}
			else
				if(this.fichas[0]!=null)
				{
					console.log("Ficha quitada en la posicion 0 de la "+this.nombre+" "+this.fichas[0].getTamaño());
					aux = this.fichas[0];
					this.fichas[0] = null;
					this.numFichas--;
					document.getElementById(this.nombre+"ficha3").style.visibility = 'hidden';
					return aux;
				}
	}
	this.numFichasTotal = function()
	{
		return this.numFichas;
	}
	
	this.tamañoFichaTop = function()
	{
		
		if(this.numFichas !=  0)
		{
			//console.log(this.nombre+" "+ this.numFichas);
			var aux = this.fichas[this.numFichas-1];
			//console.log(this.nombre + "  " +aux.getTamaño());
			return aux.getTamaño();
		}else
			return 2000;
		/*
		if(this.numFichas ==  2)
		{
			var aux = this.fichas[0];
			console.log(this.nombre + "  " +aux.getTamaño());
			return aux.getTamaño();
		}else
			if(this.numFichas ==  1)
			{
				var aux = this.fichas[1];
				console.log(this.nombre + "  " +aux.getTamaño());
				return aux.getTamaño();
			}else
			if(this.numFichas ==  0)
				{
					var aux = this.fichas[2];
					console.log(this.nombre + "  " +aux.getTamaño());
					return aux.getTamaño();
				}
			
		console.log(this.numFichas);
		if(this.fichas[this.numFichas] == 0)
			return  2000;
		else
		{
			var aux = this.fichas[this.numFichas];
			console.log(this.nombre + "  " +aux.getTamaño());
			return aux.getTamaño();
		}
		*/
	}
	this.getNombre = function()
	{
		return this.nombre;
	}
 }