function Bola(nombre,radios,posX,posY,velocidadX,velocidadY,style,time)
{
	var self = this;
	this.nombre = nombre;
	this.radios = radios;
	this.posX = posX;
	this.posY = posY;
	this.velocidadX = velocidadX;
	this.velocidadY = velocidadY;
	this.time=time;
	this.rebote=2;
	this.style = style <= 3 && style > 0 ? style : 1;
	
	this.getRadio = function(){
		return radios;
	};
	
	this.spam = function(){
		var canvas = document.getElementById("gameBoard");
		canvas.height = window.innerHeight;
		canvas.width = window.innerWidth;
		var ctx = canvas.getContext("2d");
		ctx.beginPath();
		ctx.arc(self.posX,self.posY,self.radios,0,2*Math.PI);
		ctx.stroke();
		ctx.closePath();
	};
	this.start = function(){
		setInterval(this.avance,self.time);
	};
	
	this.posicion = function(){
		var canvas = document.getElementById("gameBoard");
		var ctx = canvas.getContext("2d");
		ctx.clearRect(0,0,canvas.width,canvas.height);
		ctx.beginPath();
		ctx.arc(self.posX,self.posY,self.radios,0,2*Math.PI);
		ctx.stroke();
		ctx.closePath();
		
	};
	
	this.avance = function(){
		//console.log(window.innerHeight +  "  "+self.posY);
		if((self.posX+self.radios) >= (window.innerWidth))
			self.velocidadX *= -1;
		if((self.posX) <= (0))
			self.velocidadX *= -1;
		if((self.posY+self.radios) >= window.innerHeight)
		{
			self.velocidadY *= -1;
			self.rebote *=-1;
		}
		if((self.posY) <= 0)
		{
			self.velocidadY *= -1;
			self.rebote *=-1;
		}
		self.posX = self.posX+self.velocidadX;
		self.posY = self.posY+self.rebote+self.velocidadY;
		//self.posicion();
	};
	this.getPosX = function(){
		return this.posX;
	};
	this.getPosY = function(){
		return this.posY;
	};
	this.getRadio = function(){
		return this.radios;
	};
	this.changeVelocidadX = function(){
		this.velocidadX *= -1;
	};
	this.changeVelocidadY = function(){
		this.velocidadY *= -1;
	};
}