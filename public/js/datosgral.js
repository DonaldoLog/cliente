<script>
	var a;
	var b;
	var c;
	var d;
	$(document).ready(function(){
	
    //Obtener el valor de estado civil 
    $(document).on('change', '#idEdocivil', function(event) {
    a = $('#idEdocivil').val();
    //Mostrar formulario de datos de la pareja
    if (a == 'casado') {
    	console.log('Mostrar el campo datos de pareja')
    	$("#nombrePareja").show();
    } else {
    	console.log('No tienes pareja')
    	$("#nombrePareja").hide();
    }
	});

    //Mostrar formulario de datos hijos
    $("input#hijos[type=radio]").change(function()
    {
    	b = $(this).val();

    	if (b =='si'){
    		console.log('Mostrar form de datos de hijos')
    		$("#nombreHijo").show();
    	} else {
    			console.log('No tienes hijos')
    			$("#nombreHijo").hide();
    	}
        
    });
    
	//Mostrar formulario de embarazo
    $("input#embarazo[type=radio]").change(function()
    {
    	c = $(this).val();

    	if (c =='si'){
    		console.log('Mostrar form de datos de embarazo')
    		$("#datosEmbarazo").show();
    		$("#datosEmbarazo2").show();
    		
    	} else {
    			console.log('No tienes hijos')
    			$("#datosEmbarazo").hide();
    			$("#datosEmbarazo2").hide();
    		
    	} 
    });

    //Mostrar formulario de pormenores de embarazo
    $("input#rumor[type=radio]").change(function()
    {
    	d = $(this).val();

    	if (d =='si'){
    		console.log('Mostrar form de datos de embarazo')
    		$("#datosEmbarazo3").show();
    
    		
    	} else {
    			console.log('No tienes hijos')
    			$("#datosEmbarazo3").hide();
    			
    		
    	} 
    
});	
</script>