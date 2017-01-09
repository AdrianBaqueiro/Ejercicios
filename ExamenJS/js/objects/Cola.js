


function Cola (nome){
	this.nome = nome;
	procesos = new Array();
	this.contador = 0;
	this.engadirProceso = function(proceso){
		procesos.push(proceso);
		reordenar();
		this.contador++;
	};
	this.getProceso = function(){
		return procesos;
	}
	this.eliminarProceso = function(){
		var aux = procesos[0];
		procesos[0] = null;
		reordenar();
		return aux;
	}
	reordenar = function(){
		procesos.sort(compare);
	}
	compare = function(a,b){
	if(a == null)
		return 1;
	if(b==null)
		return -1;
	if (a.getTempo() < b.getTempo())
		return -1;
	  if (a.getTempo() > b.getTempo())
		return 1;
    return 0;
	}
};