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
            var response = await fetch('../php/eliminarPieza.php', init);
            if (response.ok) {
                var respuesta = await response.json();
                if(respuesta.RESPUESTA == 'correcto'){
                    window.location.href = "../principal/piezas.php?eliminar=1";
                }
                else{
                    window.location.href = "../principal/piezas.php?eliminar=0";
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
    document.formulario.id.value = $("#tabla tr.selected td:first-child").html();
    document.formulario.long.value = $("#tabla tr.selected td:nth-child(2)").html();
    document.formulario.peso.value = $("#tabla tr.selected td:nth-child(3)").html();
    let x = $("#tabla tr.selected td:nth-child(4)").html();
    let sel = document.getElementById('sel_Tipo');
    sel.selectedIndex = Seleccionar(sel, x);
});

$('#i_Actualizar').on('click', function(e){
    document.getElementById('id').disabled = false;
}); 

function Seleccionar(sel, x){
    for (let i = 0; i < sel.length; i++)
        if(sel.options[i].text == x)
            return i;
}