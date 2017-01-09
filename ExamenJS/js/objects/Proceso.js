function Proceso(nome,tempo){
	this.nome = nome;
	this.tempo = tempo;
	this.getNome = function(){
		return this.nome;
	};
	this.getTempo = function(){
		return this.tempo;
	};
	
};