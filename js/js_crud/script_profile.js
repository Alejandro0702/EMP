window.onload = function(){
    let x = getParameterByName('eliminar');
    if( x == "" || x < 2 ){
        if(x == 0)
            alert('Error al eliminar el tipo de pieza');
        if(x == 1)
            alert('Tipo de pieza eliminada correctamente');
    }
    x = getParameterByName('registro');
    if( x == "" || x < 2 ){
        if(x == 0)
            alert('Error al registrar el tipo de pieza');
        if(x == 1)
            alert('Tipo de pieza registrada correctamente');
    }
}

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

var formulario = document.getElementById('formulario');
 
$('#i_Eliminar').on('click', function(e){
    var id = $("#tabla tr.selected td:first-child").html();
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
            var response = await fetch('../php/eliminarProfile.php', init);
            if (response.ok) {
                var respuesta = await response.json();
                if(respuesta.RESPUESTA == 'correcto'){
                    window.location.href = "../principal/tiposDePieza.php?eliminar=1";
                }
                else{
                    window.location.href = "../principal/tiposDePieza.php?eliminar=0";
                    alert("Erro: " + respuesta.RESPUESTA);
                }
            } else {
                throw new Error(response.statusText);
            }
        } catch (err) {
            console.log("Error al realizar la petición AJAX: " + err.message);
        }
    })();

});

$('#i_Seleccionar').on('click', function(e){
    let id = $("#tabla tr.selected td:first-child").html();
    let desc = $("#tabla tr.selected td:nth-child(2)").html();
    document.formulario.id.value = id;
    RellenarCampos(desc);
});

$('#i_Actualizar').on('click', function(e){
    document.getElementById('id').disabled = false;
}); 

function RellenarCampos(x){
    let y = x.replace('x',' ').replace('x',' ').replace('x',' ').replace('x',' ').replace('x',' ');//Se quitan las x por espacios
    let array =  y.split(' ');   //Se divide la descripcion por cada espacio
    //Todo dentro de un loop
    document.formulario.id_upd.value = $("#tabla tr.selected td:first-child").html();
    document.formulario.descr_upd.value = array[0];
    if(array.length > 1){
        Generar_Input_Update(array.length);
        for (let index = 1; index < array.length; index++) {
            //Select
            if(array[index].includes("\'"))
                document.getElementById("sel_medida_upd"+index).selectedIndex = 1;
            else 
                document.getElementById("sel_medida_upd"+index).selectedIndex = 0;
            
            let array2 = array.map(function(ans){
                return ans.replace("\"", "").replace("\'", "");
            });//map
            //Input
            alert(array2);
            document.getElementById("medida_upd"+index).value = array2[index];
        }//for
    }//if array > 1
}//RellenarCampos
function Generar_Input_Update(cant_inputs){
    c_inp_upd = cant_inputs;//Para el submit al modificar
    countX = 0;
    countbr = 0;
    let input = '';
    for (let index = 3; index < cant_inputs; index++) {
        if(index % 2 == 0){
            countX++;
            input = ' <label id="label__upd'+ countX +'"> x </label> ';
        }
        else{
            countbr++;
            input = '<br id="br_medida_upd'+countbr +'">';
            countbr++;
            input = input + '<br id="br_medida_upd'+countbr +'">';
        }
        input = input + '<input type="text"  name="medida_upd'+index+'" id="medida_upd'+ index +'" placeholder="Medida..." maxlength="10" pattern="[0-9]+/?([0-9]?)+" required /> '+
        ' <select id ="sel_medida_upd'+index+'" name="sel_medida_upd'+ index +'">'
            +'<option value = "pulgada">Pulgada (")</option>'
            +'<option value = "pie">Pie (\')</option>'
        +'</select>';
        $('#div_medida_upd').append(input);
    }
}//Generar_input_update

var countMed = 2;
var countX = 0;
var countbr = 0;
$('#btn_medida').on('click',function(e){
    if(countMed > 5)
        return alert('Maximo 6 medidas');
    countMed++;
    countX++;
    let input = '';
    if(countMed % 2 == 0)
        input = ' <label id="label_'+ countX +'"> x </label> ';
    else{
        countbr++;
        input = '<br id="br_medida'+countbr +'">';
        countbr++;
        input = input + '<br id="br_medida'+countbr +'">';
    }
    input = input + '<input type="text"  name="medida'+countMed+'" id="medida'+ countMed +'" placeholder="Medida..." maxlength="10" pattern="[0-9]+/?([0-9]?)+" required /> '+
    ' <select id ="sel_medida'+countMed+'" name="sel_medida'+ countMed +'">'
        +'<option value = "pulgada">Pulgada (")</option>'
        +'<option value = "pie">Pie (\')</option>'
    +'</select>';
    $('#div_medida').append(input); 
});

$('#btn_medida_quitar').on('click',function(e){
    if(countMed > 2){
        $('#medida' + countMed).remove();
        $('#sel_medida'+ countMed).remove();
        $('#label_'+ countX).remove();
        countMed--;
        countX--;
        if(countMed % 2 == 0){
            $('#br_medida'+ countbr).remove();
            countbr--;
            $('#br_medida'+ countbr).remove();
            countbr--;
        }
    }
});


$('#form_profile_reg').on('submit', function(e){
    e.preventDefault();
    let id = document.form_profile_reg.id.value;
    let descr = document.form_profile_reg.descr.value;
    let arrayMed = Rellenar_Medidas('medida', countMed);
    let arraySel = Rellenar_Medidas('sel_medida', countMed);
    (async () => {
        try{
          var datos = { ID:id, DESCR: descr, MED: arrayMed, SEL: arraySel};
          var init = {
            method: "POST",
            headers: {'Content-Type': 'application/json' }, body: JSON.stringify(datos)
          };
          var response = await fetch('../php/registroTipoPieza.php', init);
          if (response.ok) {
            var respuesta = await response.json();
            if(respuesta.RESPUESTA == 'correcto'){
              window.location.href = "../principal/tiposDePieza.php?registro=1";
            }
            else{
              alert("Erro: " + respuesta.RESPUESTA);
              window.location.href = "../principal/tiposDePieza.php?registro=0";
            }
            }else{
              throw new Error(response.statusText);
            }
        }
        catch(err){
            console.log("Error al realizar la petición AJAX: " + err.message);
        }
      })();
});//submit


var c_inp_upd = 0;
$('#form_profile_upd').on('submit', function(e){
    e.preventDefault();
    let id = document.formulario.id_upd.value;
    let descr = document.formulario.descr_upd.value;
    //Cantidad de inputs en update
    
    let arrayMed = Rellenar_Medidas('medida_upd', c_inp_upd - 1);
    let arraySel = Rellenar_Medidas('sel_medida_upd', c_inp_upd - 1);
    (async () => {
        try{
          var datos = { ID:id, DESCR: descr, MED: arrayMed, SEL: arraySel};
          var init = {
            method: "POST",
            headers: {'Content-Type': 'application/json' }, body: JSON.stringify(datos)
          };
          var response = await fetch('../php/actualizarProfile.php', init);
          if (response.ok) {
            var respuesta = await response.json();
            if(respuesta.RESPUESTA == 'correcto'){
              window.location.href = "../principal/tiposDePieza.php?actualizar=1";
            }
            else{
              alert("Erro: " + respuesta.RESPUESTA);
              window.location.href = "../principal/tiposDePieza.php?actualizar=0";
            }
            }else{
              throw new Error(response.statusText);
            }
        }
        catch(err){
            console.log("Error al realizar la petición AJAX: " + err.message);
        }
      })();
});//submit



function Rellenar_Medidas(control, c){
    let array = [];
    for (let index = 1; index <= c; index++)
        array[index - 1] = document.getElementById(control + index).value;
    return array;
}