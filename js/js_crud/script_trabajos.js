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