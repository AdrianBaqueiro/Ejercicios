var bola1;
var barraP1;
var barraP2;
var bolas = []; 
var self = this;

window.onload = function(){
	bola1 = new Bola("bola1",30,0,0,5,1,2);
	bola2 = new Bola("bola2",50,0,5,5,1,3);
	//bolas = [bola1];
	//Bola(nombre,radios,posX,posY,velocidadX,velocidadY,style,time)
	for(i=1;i<=1;i++)
	{
		bolas.push(new Bola("bola"+i,Math.floor(Math.random() * 5+50),Math.floor(Math.random() * 50),
		Math.floor(Math.random() * 5),Math.floor(Math.random() * 1+1),Math.floor(Math.random() * 1+1)
		,Math.floor(Math.random() * 3+1),50));
	}
	
	for(i=0;bolas.length>i;i++)
	{
		bolas[i].spam();
		//bolas[i].start();
	}
	setInterval("start()",1)
	//canvas();
	var canvas = document.getElementById("gameBoard");
	barraP1 = new Barra("p1",0,200,2);
	barraP2 = new Barra("p2",730,200,2);
	barraP1.spam();
	barraP2.spam();
	
}
function start(){
	dibujar();
	for(i=0;i<self.bolas.length;i++)
	{
		//self.bolas[i].avance();
	}
}
function dibujar(){
	for(i=0;i<self.bolas.length;i++)
	{
		self.bolas[i].avance();
		var canvas = document.getElementById("gameBoard");
		var ctx = canvas.getContext("2d");
		ctx.clearRect(0,0,canvas.width,canvas.height);
		ctx.beginPath();
		ctx.arc(self.bolas[i].posX,self.bolas[i].posY,self.bolas[i].radios,0,2*Math.PI);
		ctx.rect(self.barraP1.posX,self.barraP1.posY,25,200);
		ctx.rect(self.barraP2.posX,self.barraP2.posY,25,200);
		ctx.fill();
		ctx.closePath();
	}
}

