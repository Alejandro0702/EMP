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
            var response = await fetch('../php/eliminarUsr.php', init);
            if (response.ok) {
                var respuesta = await response.json();
                if(respuesta.RESPUESTA == 'correcto'){
                    window.location.href = "../principal/usuario.php?eliminar=1";
                }
                else{
                    window.location.href = "../principal/usuario.php?eliminar=0";
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

$('#i_Modificar').on('click', function(e){
    document.formulario.id.value = $("#tabla tr.selected td:first-child").html();
    document.formulario.nomUsr.value = $("#tabla tr.selected td:nth-child(2)").html();
    document.formulario.pass.value = $("#tabla tr.selected td:nth-child(3)").html();
    document.formulario.nombre.value = $("#tabla tr.selected td:nth-child(4)").html();
    document.formulario.apPat.value = $("#tabla tr.selected td:nth-child(5)").html();
    document.formulario.apMat.value = $("#tabla tr.selected td:nth-child(6)").html();
    document.formulario.email.value = $("#tabla tr.selected td:nth-child(7)").html();
    document.formulario.tel.value = $("#tabla tr.selected td:nth-child(8)").html();
    let x = $("#tabla tr.selected td:nth-child(9)").html();
    
    let sel = document.getElementById('sel_Tipo');
    sel.options.forEach(element => console.log(element));    
    $("#sel_Tipo option").each(function() {
        let y = $(this).text()
        alert(typeof(y));
        if(x == y){
            let i = $(this).attr('value');
            document.formulario.sel_Tipo.options[i];
        }
        //alert('opcion '+$(this).text()+' valor '+ $(this).attr('value'))
    });
    //document.formulario.sel_Tipo.value = 
});

$('#i_Actualizar').on('click', function(e){
    document.getElementById('id').disabled = false;
});