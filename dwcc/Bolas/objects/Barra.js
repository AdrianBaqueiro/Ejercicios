function Barra(nombre,posX,posY,velocidadY)
{
	var self = this;
	this.nombre = nombre;
	this.posX = posX;
	this.posY = posY;
	this.velocidadY = velocidadY;
	
	this.spam = function(){
		var canvas = document.getElementById("gameBoard");
		canvas.height = window.innerHeight;
		canvas.width = window.innerWidth;
		var ctx = canvas.getContext("2d");
		ctx.beginPath();
		ctx.rect(self.posX,self.posY,20,20);
		ctx.fill();
		ctx.closePath();
	};
	
}