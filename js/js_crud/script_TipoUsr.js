window.onload = function(){
    let x = getParameterByName('eliminar');
    if( x == "" || x < 2 ){
        if(x == 0)
            alert('Error al eliminar al usuario');
        if(x == 1)
            alert('Usuario eliminado correctamente');
    }
    x = getParameterByName('registro');
    if( x == "" || x < 2 ){
        if(x == 0)
            alert('Error al registrar al usuario');
        if(x == 1)
            alert('Usuario registrado correctamente');
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
            var response = await fetch('../php/eliminarTipoUsr.php', init);
            if (response.ok) {
                var respuesta = await response.json();
                if(respuesta.RESPUESTA == 'correcto'){
                    window.location.href = "../principal/tipoDeUsuario.php?eliminar=1";
                }
                else{
                    window.location.href = "../principal/tipoDeUsuario.php?eliminar=0";
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
    document.formulario.descr.value = desc;
});

$('#i_Actualizar').on('click', function(e){
    document.getElementById('id').disabled = false;
});