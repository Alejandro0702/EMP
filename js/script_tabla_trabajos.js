

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

var countRow = -1;
const agregarFila = (array) => {
   let t = $('#tabla-pz-anadir').DataTable();
   if(array[0] != undefined){
      countRow++;
      return t.row.add([array[0], '<input id="descr_'+ countRow +'" type="text" placeholder="Descripción..." title="Ingrese Descripcion" required/>',array[1], array[2], array[3]]).draw(false);
   }
   return alert('Selecciona una pieza');
}


//Data Table
var tableAnadir = $('#tabla-pz-anadir').DataTable({
   paging: false,
   ordering: true,
   info: false
});
$("#tabla-pz-anadir tbody").on('click', 'tr',function(){
   $(this).toggleClass('selected');
});

//Remover pieza seleccionada
$('#quitar').click(function () {
   let x = $("#tabla-pz-anadir tr.selected td:nth-child(2)").html();
   alert(x);
   tableAnadir.row('.selected').remove().draw(false);
   countRow--;
});

