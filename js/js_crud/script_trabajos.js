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
      alert(arrayP[i-1]);
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