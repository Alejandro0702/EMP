var rang_FU = document.getElementById('FU');
var rang_Q_C = document.getElementById('Q_C');
var rang_W = document.getElementById('W');
var rang_CLEAN = document.getElementById('CLEAN');

rang_FU.value = 0;
rang_Q_C.value = 0;
rang_W.value = 0;
rang_CLEAN.value = 0;
document.getElementById("FU_SPAN").innerHTML = rang_FU.value + "%";
document.getElementById("Q_C_SPAN").innerHTML = rang_Q_C.value + "%";
document.getElementById("W_SPAN").innerHTML = rang_W.value + "%";
document.getElementById("CLEAN_SPAN").innerHTML = rang_CLEAN.value + "%";

function Valor_FU(){
    document.getElementById("FU_SPAN").innerHTML = rang_FU.value + "%";
}
function Valor_Q_C(){
    document.getElementById("Q_C_SPAN").innerHTML = rang_Q_C.value + "%";
}
function Valor_W(){
    document.getElementById("W_SPAN").innerHTML = rang_W.value + "%";
}
function Valor_CLEAN(){
    document.getElementById("CLEAN_SPAN").innerHTML = rang_CLEAN.value + "%";
}

//Añade piezas a la lista principal del formulario
$('#formulario_anadir').on('submit', function(e){
    e.preventDefault();
    let idJ = document.formulario_anadir.idJob.value;
    let note = document.formulario_anadir.nota.value;
    let table = document.getElementById("tabla-pz-anadir");
    var arrayP = new Array();
    
    let tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {//Fila
      arrayP[i-1] = $("#tabla-pz-anadir tr:nth-child(" + i + ") td:nth-child(1)").html();
    }
    
    if(arrayP[0] == 'No data available in table'){
      return alert('Debes seleccionar piezas para añadirlas al trabajo');
    }
    (async () => {
      try{
        var datos = { IDJ: idJ, NOTE: note, IDPZ: arrayP };
        var init = {
          method: "POST",
          headers: {'Content-Type': 'application/json' }, body: JSON.stringify(datos)
        };
        var response = await fetch('../php/registroPieza_Trabajo.php', init);
        if (response.ok) {
          var respuesta = await response.json();
          if(respuesta.RESPUESTA == 'correcto'){
            window.location.href = "../principal/trabajos.php?registro=1";
          }
          else{
            alert("Erro: " + respuesta.RESPUESTA);
            window.location.href = "../principal/trabajos.php?registro=0";
          }
          }else{
            throw new Error(response.statusText);
          }
      }
      catch(err){
          console.log("Error al realizar la petición AJAX: " + err.message);
      }
  
    })();
  
    
});//submit formulario_anadir

  //Modificar pieza
$('#btn_Mod').on('click', function(e){
  let id = document.formulario_rangos.idPz_.value;
  let cl = document.formulario_rangos.CL.value;
  let heat = document.formulario_rangos.HEAT.value;

  if(id == null || id === ""){
    return alert('Selecciona una pieza para editar');
  }
  if(cl == null || cl=== ""){
    cl = " ";
  }
  if(heat == null || heat === ""){
    heat = " ";
  }
  let clean = rang_CLEAN.value;
  let fu = rang_FU.value;
  let qc = rang_Q_C.value;
  let w = rang_W.value;
  (async () => {
    try{
      var datos = {
        ID: id,
        CL: cl,
        HEAT: heat,
        CLEAN: clean,
        FU: fu,
        QC: qc,
        W: w
       };
      var init = {
        method: "POST",
        headers: {'Content-Type': 'application/json' }, body: JSON.stringify(datos)
      };
      var response = await fetch('../php/actualizar_rang_pieza_trab.php', init);
      if (response.ok) {
        var respuesta = await response.json();
        if(respuesta.RESPUESTA == 'correcto'){
          alert('Pieza Actualizada correctamente');
        }
        else{
          alert("Erro: " + respuesta.RESPUESTA);
        }
        }else{
          throw new Error(response.statusText);
        }
    }
    catch(err){
        console.log("Error al realizar la petición AJAX: " + err.message);
    }

  })();
  
})//Modificar Boton
$('#formulario_detalles').on('submit', function(e){
  let id = document.formulario_detalles.idJob.value;
  let print = document.formulario_detalles.printAll.checked;
  console.log(print);
  if( id == "" && print == false ){
    alert('Escribe el ID del trabajo a imprimir o marca la casilla para imprimir reporte general');
    return false;
  }
});

var id_Job = '';
$("#tabla tbody").on('click', 'tr',function(){
  $(this).addClass('selected').siblings().removeClass('selected');
  id_Job = $("#tabla tr.selected td:first-child").html();
});

$('#i_Eliminar').on('click', function(e){
  id_Job = $("#tabla tr.selected td:first-child").html();
  (async () => {
    try {
        var datos = { ID: id_Job };
        var init = {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        };
        var response = await fetch('../php/eliminar_Trabajo.php', init);
        if (response.ok) {
            var respuesta = await response.json();
            if(respuesta.RESPUESTA == 'correcto'){
                window.location.href = "../principal/trabajos.php?eliminar=1";
            }
            else{
                
                alert("Erro: " + respuesta.RESPUESTA);
                window.location.href = "../principal/trabajos.php?eliminar=0";
            }
        } else {
            throw new Error(response.statusText);
        }
    } catch (err) {
        console.log("Error al realizar la petición AJAX: " + err.message);
    }
})();

});//i_Eliminar

$('#i_Eliminar_Pieza').on('click', function(e){
  e.preventDefault();
  let id = $("#tabla_det_res tr.selected td:nth-child(2)").html();
  (async () => {
    try {
        var datos = { ID: id };
        var init = {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        };
        var response = await fetch('../php/eliminar_Pieza_Trabajo.php', init);
        if (response.ok) {
            var respuesta = await response.json();
            if(respuesta.RESPUESTA == 'correcto'){
                window.location.href = "../principal/trabajos.php?eliminarPieza=1";
            }
            else{
                
                alert("Erro: " + respuesta.RESPUESTA);
                window.location.href = "../principal/trabajos.php?eliminarPieza=0";
            }
        } else {
            throw new Error(response.statusText);
        }
    } catch (err) {
        console.log("Error al realizar la petición AJAX: " + err.message);
    }
})();

});//i_Eliminar_Pieza