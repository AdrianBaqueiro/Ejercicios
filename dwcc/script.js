


window.onload = function(){
  cookie = obtenerCookie("select");
  //console.log(cookie);
  //console.log(cookie.split("/"));
  names = cookie.split("/");
  name = names[names.length-1];
  //console.log(name.split("."));
  aux = name.split(".");
  name = aux[0];
  //console.log(name);
  a = document.getElementsByTagName("a");

  //console.log(a[0].innerHTML);

  for(i=0;i<a.length;i++)
  {
    if(a[i].innerHTML == name)
    {
      a[i].className = "resaltar";
    }
  }


}

function seleccion(elemento)
{
    crearCookie("select",elemento,"2");
}


function crearCookie(clave, valor, diasexpiracion) {
    var d = new Date();
    d.setTime(d.getTime() + (diasexpiracion*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = clave + "=" + valor + "; " + expires;
}

function obtenerCookie(clave) {
    var name = clave + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

function comprobarCookie(clave) {
    var clave = obtenerCookie(clave);
    if (clave!="") {
        // La cookie existe.
    }else{
        // La cookie no existe.
    }
}
