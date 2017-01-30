$(document).ready(function() {
  $('img:first,img:last').addClass("centrar");
  $('p:contains(Galaxy S II)').addClass("green");
  $('img:first, img:last').each(function(){
    $("<p class='textcenter'>"+this.alt+"</p>").insertBefore(this);
  });
  $("p:last, p:eq(-2)").addClass("fondo");
  $('img').each(function(){
    this.alt = this.alt + " - Copyright " +Date()+".";
  });
  $('p:contains(Xoom)').remove();
  $('p').each(function(){
    if($(this).html() == "&nbsp;")
      this.remove();
  });
  $("<hr id='separador'/>").insertAfter("p#final");
  $("<p> Neste documento hai "+$("p").length+" párrafos, dos cales "+$("p.textcenter").length+" están centrados.</br>Temos "+$("img").length+" imaxes e temos "+$("a").length+" hiperenlaces </p>").insertAfter("hr");
  $("p:eq(6)").text("----Texto deste párrafo eliminado polo editor.-----");
  $("#copiar").click(function(){
    $("img:eq(1)").clone().insertAfter("img:eq(1)");
  });

});
