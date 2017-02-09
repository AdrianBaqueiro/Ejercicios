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
  $("#dia").each(function()
  {
    for(i=1;i<=30;i++)
    {
      $(this).append ( "<option value="+i+">"+i+"</option>");
    }

  })
  $("#ano").each(function()
  {
    for(i= new Date().getFullYear(),e=0;e<=100;i--,e++)
    {
      $(this).append ( "<option value="+i+">"+i+"</option>");
    }

  })
  $("#infocontacto").addClass("ocultar");
  $("div.data").children().children().next().next().addClass("ocultar");
  $("#adicionais").addClass("pointer");
  $("#adicionais").click(function(){

    $("#infocontacto").toggle(300);

    if(this.innerText == "Menos datos >>")
    {
      this.innerText = "Mais datos >>";
      $("#usuario").focus();
    }
    else {
      this.innerText = "Menos datos >>";
      $("#nome").focus();
    }
  });
  $("#divdia").click(function(){

    
  });


});
