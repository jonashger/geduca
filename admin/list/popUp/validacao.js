$(document).ready(function(){

	var campo2 = $("#celular");
    campo2.on("keypress",function(){
  	 var valor = $("#celular").val();

     if(valor.length == 0){ campo2.val(valor + "(");}
     if(valor.length == 3){ campo2.val(valor + ")");}
     if(valor.length == 9){ campo2.val(valor + "-");}
  });
});
