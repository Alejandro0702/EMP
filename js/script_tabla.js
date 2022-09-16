$("#tabla tr").click(function(){
    $(this).addClass('selected').siblings().removeClass('selected');   

    var value=$(this).find('td:first').html();
    //alert("PRUEBA SELECCIONAR \n" + value);    
 });
 
 $('#i_Eliminar').on('click', function(e){
    let usr = $("#tabla tr.selected td:first-child").html();
    alert("Dato: " + usr);
    
 });