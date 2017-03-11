/*!
 * jQuery JavaScript Library v1.5.1
 * http://jquery.com/
 *
 * Copyright 2011, John Resig
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * Includes Sizzle.js
 * http://sizzlejs.com/
 * Copyright 2011, The Dojo Foundation
 * Released under the MIT, BSD, and GPL Licenses.
 *
 * Date: Wed Feb 23 13:55:29 2011 -0500
 */

$(document).ready(function() {
<<<<<<< HEAD

  $('#acceder').click(function(){
    $.post("acceder.php",{"usuario":$("#usuario").val(),"password":$("#password").val()}, function(datos){
      console.log(datos);
      if(datos=="concedido"){
       window.location.replace("acceder.php");
     }else {
        window.alert("usuario o contrase;a")
      }

    });
  });
});
/*
  $.post("chequea.php",{"codigo":$(this).val()},function(datos){

  			//Aquí gestionaremos los datos devueltos por el servidor

  				if(datos.estado=="OK")

  				{

  					$("#enviar").attr("disabled",false);

  					$("#errores").html(datos.mensaje).removeClass("rojos").addClass("verdes").fadeIn(500).fadeOut(5000);

  				}

  				else

  				{

  					$("#enviar").attr("disabled",true);

  					$("#identificador").focus();

  					$("#errores").html(datos.mensaje).removeClass("verdes").addClass("rojos").fadeIn(500).fadeOut(5000);

  				}

  			},"json");

  		}

});
﻿*/
=======
  $.post("acceder.php",$("#usuario").val());

});
﻿
>>>>>>> origin/master
