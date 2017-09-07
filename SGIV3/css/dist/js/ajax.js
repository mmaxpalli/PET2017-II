


	    function test(){

          alert("hola");
        }

			
		 function valores()
        {	

        	var id=document.getElementById("Clie_Id").value;
        	if (id == ""){

        			registrar();
        			//alert('insert');


        	}else{
        			guardar();
        			//alert('update');
        	}




        }

	var valorescombo;
        function cargarcombo(val)
        {
         $.ajax({
         type: 'POST',
         url: 'php/localeslistado.php',
         data: {
         get_option:val
        }
        }).done(function(resp){
        var cursos = $("#Depa_Id");
        //alert(resp);
        valorescombo = eval(resp);
        cursos.find('option').remove();
         //  $(r).each(function(i, v){ // indice, valor

                      cursos.append('<option>seleccione</option>');
                  		  for(i=0;i<valorescombo.length;i++){
                                  cursos.append('<option value="' + valorescombo[i][0] + '">' +valorescombo[i][1] + '</option>');
           //             })
                          }
                        cursos.prop('disabled', false);



         });
        }




	function fetch_select(val)
		{
		 $.ajax({
		 type: 'post',
		 url: 'php/listaoption.php',
		 data: {
		 get_option:val
		}
		}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered'><thead><tr><th class='th2' style='background-color:#D33919;''>ID</th><th class='th2' style='background-color:#D33919;''>Tipo</th><th class='th2' style='background-color:#D33919;'>Codigo</th><th class='th2' style='background-color:#D33919;'>Nombre Comercial</th><th class='th2' style='background-color:#D33919;'>Direccion</th>	<th class='th2' style='background-color:#D33919;'>Departamento</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][0]+"*"+valores[i][6];
			html+="<tr><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td>"+valores[i][0]+"</td><td><button class='btn btn-warning'  onclick='mostrar("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button></td></tr>";
		}
		html+="</tbody></table>"
		$("#lista").html(html);
	});
}



function mostrar(datos){
	//alert(datos);
	var d=datos.split("*");
	//alert(d.length);
	
	$("#Clie_Id").val(d[0]);

	$("#Clie_Codigo").val(d[2]);
	$("#Clie_NombreComercial").val(d[3]);
	$("#Clie_Direccion").val(d[4]);

//	$("#slt-cursos").val(d[3]).attr('selected','selected');

	//var opt = new Option(name, d[3]);
//	var opt = new Option(d[3], d[3]);
	//$("#slt-cursos").append(opt);
///	opt.setAttribute("selected","selected");
		
		var cursos = $("#Depa_Id");
        //alert(resp);
       // var valorescombo = eval(resp);
     	cursos.find('option').remove();

       for(i=0;i<valorescombo.length;i++){
       				if(d[6]==valorescombo[i][0]){
                    cursos.append('<option value="' + valorescombo[i][0] + '" selected>' +valorescombo[i][1] + '</option>');
                    }
                    else{

					cursos.append('<option value="' + valorescombo[i][0] + '">' +valorescombo[i][1] + '</option>');                    	
                    }
           //             })
                   }
       cursos.prop('disabled', false);

		var cliente = $("#Clie_Tipo");
       cliente.find('option').remove();


		
	

	   	if(d[1]=='ATM'){
	   			cliente.append('<option value="ATM" selected>ATM</option>');
	   			cliente.append('<option value="PLUS" >PLUS</option>');
	   			cliente.append('<option value="Monedero" >Monedero</option>');
	   	}
	   	else if(d[1]=='PLUS'){
	   			cliente.append('<option value="ATM" >ATM</option>');
	   		  	cliente.append('<option value="PLUS" selected>PLUS</option>');
	   		  	cliente.append('<option value="Monedero" >Monedero</option>');
	   		  

	   	}
		else if(d[1]=='Monedero'){
				cliente.append('<option value="ATM" >ATM</option>');
				cliente.append('<option value="PLUS" >PLUS</option>');
				cliente.append('<option value="Monedero" selected>Monedero</option>');
	   	}
	   	else{
	   			cliente.append('<option value="" selected></option>');
	   			cliente.append('<option value="ATM" >ATM</option>');
				cliente.append('<option value="PLUS" >PLUS</option>');
				cliente.append('<option value="Monedero" >Monedero</option>');


	   	}


	   	cliente.prop('disabled', false);
}




function guardar(){
	var datosform=$("#frmlocales").serialize();
	$.ajax({
		url:'php/actualuzarlocales.php',
		type:'POST',
		data:datosform+"&boton=actualizar"
	}).done(function(resp){
		    var optionvalor = eval(resp);

				cargarcombo('');
				fetch_select(optionvalor);
				$("#Clie_Id").val('');
				$("#Clie_Tipo").val('');
				$("#Clie_Codigo").val('');
				$("#Clie_NombreComercial").val('');
				$("#Clie_Direccion").val('');
				$("#Depa_Id").val('');
		
	});
	
}



 function registrar(){

            var Clie_Id=$('#Clie_Id').val();
            var Clie_Tipo=$('#Clie_Tipo').val();
            var Clie_Codigo=$('#Clie_Codigo').val();
            var Clie_NombreComercial=$('#Clie_NombreComercial').val();
            var Clie_Direccion=$('#Clie_Direccion').val();
            var Depa_Id=$('#Depa_Id').val();
       

                $.ajax({
                    url:'php/insertarlocales.php',
                    type:'POST',
                    data:'Clie_Id='+Clie_Id+'&Clie_Tipo='+Clie_Tipo+'&Clie_Codigo='+Clie_Codigo+'&Clie_NombreComercial='+Clie_NombreComercial+'&Clie_Direccion='+Clie_Direccion+'&Depa_Id='+Depa_Id+'&boton=registrar'
                }).done(function(respuesta){


            
                		  var optionvalor = eval(respuesta);

							cargarcombo('');
							fetch_select(optionvalor);
								$("#Clie_Id").val('');
								$("#Clie_Tipo").val('');
								$("#Clie_Codigo").val('');
								$("#Clie_NombreComercial").val('');
								$("#Clie_Direccion").val('');

								  alert('Registro insertado');
               			  
							
			                    
                });
   
    
            
        }




