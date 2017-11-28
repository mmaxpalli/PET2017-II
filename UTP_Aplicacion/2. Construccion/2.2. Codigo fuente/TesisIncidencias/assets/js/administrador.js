function Lista_Rol(valor){
	$.ajax({
		url:'view/gene_persona_rol/metodos.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		alert(resp);
		var valores = eval(resp);
		html="<table  class=table table-striped><thead><tr><th >Empresa</th><th >Persona</th><th >Rol</th><th >Estado</th></tr></thead><tbody>";

		$("#lista").html(html);
	});
}



