$("#tabla tr").click(function(){
    $(this).addClass('selected').siblings().removeClass('selected');   
    //var value=$(this).find('td:first').html();
 });
 
 $('#i_Eliminar').on('click', function(e){
    let usr = $("#tabla tr.selected td:first-child").html();
    //alert("Dato: " + usr);
 });
 
 
 /*Pasa datos de la línea seleccionada*/
var array = new Array();
$("#tabla-pz tbody").on('click', 'tr',function(){
   $(this).addClass('selected').siblings().removeClass('selected');
   for (let index = 0; index < 5; index++) {
     array[index] = $("#tabla-pz tr.selected td:nth-child("+ (index + 1) +")").html();
   }
});
$("#Seleccionar").click(function(){
   agregarFila(array);
});

const agregarFila = (array) => {
   let t = $('#tabla-pz-anadir').DataTable();
   t.row.add([array[0], array[1], array[2], array[3], array[4]]).draw(false);
   /*
   let row = '';
   for (let index = 0; index < array.length; index++) {
      row = row + '<td>'+ array[index]+'</td>';
   }*/
   //document.getElementById('tabla-pz-anadir').insertRow(1).innerHTML = row;
}

//Remover pieza seleccionada

