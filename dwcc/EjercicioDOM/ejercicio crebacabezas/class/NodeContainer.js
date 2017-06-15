



var  NodeContainer = new function(){
  this.id
  this.partida
  this.arrayNodes = []
  this.crono
    this.constructor = function(partida,arrayNodes,crono) {
      this.partida = partida
      this.arrayNodes = arrayNodes
      this.crono = crono
    }
     this.getPartida = function(){

      return this.partida
    }
    this.getNodes = function(){

      return this.arrayNodes


    }
    this.getCrono = function(){

      return this.crono

    }

}
