function Nube()
{
	this.ficha = null;
	this.getFicha = function(){
		var aux = this.ficha;
		this.ficha = null;
		this.hayFicha = false;
		document.getElementById("fichaNube").style.visibility = 'hidden';
		return aux;
	};
	this.setFicha = function(ficha){
		
		if(ficha!=null)
		{
			
			this.ficha=ficha;
			this.hayFicha=true;
			document.getElementById("fichaNube").style.width = ficha.getTamaño()+"px";
			document.getElementById("fichaNube").style.visibility = '';
		}
	};
	this.hayFichas = function(){
		return this.hayFicha;
	}
		
}