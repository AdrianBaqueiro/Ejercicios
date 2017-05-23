$(document).ready(function() {
  $("[name='Login']").submit(function(e){
        e.preventDefault();
        $.post("ajax.php",
          {"usuario":$("[name='Usuario']").val(),
          "password":$("[name='Contraseña']").val(),
          "control":"1"},
          function(datos){
            console.log(datos);
            if(datos == "concedido"){
             $("#debug").text("funca")   ;
            }else {
             $("#debug").text("no funca") ;
            }
        });
  $("[name='CrearUsuario']").submit(function(e){
        e.preventDefault();
        $.post("ajax.php",
          {"usuario":$("[name='id']").val(),
          "password":$("[name='Contraseña']").val(),
          "tipo":$("[name='tipo']").val(),
          "nome":$("[name='nome']").val(),
          "dni":$("[name='dni']").val(),
          "email":$("[name='email']").val(),
          "direccion":$("[name='direccion']").val(),},
          function(datos){
            console.log(datos);
            if(datos == "concedido"){
             $("#debug").text("Usuario Guardado")   ;
            }else {
             $("#debug").text("error") ;
            }
        });

    });
  // $("[name='Login']").click(function(){
  //   $("form").preventDefault();
  //   // $("form").submit(function(e){
  //   //      e.preventDefault();
  //   //    });
  //   $.post("ajax.php",{"usuario":$("[name='Usuario']").val(),"password":$("[name='Contraseña']").val()}, function(datos){
  //     console.log(datos);
  //     if(datos=="concedido"){
  //      $("#debug").text("funca");
  //    }else {
  //      $("#debug").text("no funca");
  //     }
  //
  //   });
  // });
});
