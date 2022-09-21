var formulario = document.getElementById('formulario');
 
$('#i_Eliminar').on('click', function(e){
    var id = $("#tabla tr.selected td:first-child").html();
    alert("Dato: " + id);

    (async () => {
        try {
            // en el objeto “datos” tenemos los datos que vamos a enviar al servidor
            // en este ejemplo tenemos dos datos; un título y un array de números
            var datos = { ID: id };
            // en el objeto init tenemos los parámetros de la petición AJAX
            var init = {
                // el método de envío de la información será POST
                method: "POST",
                headers: { // cabeceras HTTP
                    // vamos a enviar los datos en formato JSON
                    'Content-Type': 'application/json'
                },
                // el cuerpo de la petición es una cadena de texto
                // con los datos en formato JSON
                body: JSON.stringify(datos) // convertimos el objeto a texto
            };
            // realizamos la petición AJAX usando fetch
            // el primer parámetro es el recurso del servidor al que queremos acceder
            // en este ejemplo, es un fichero php llamado media.php que se encuentra
            // dentro de la carpeta ./php y con el código PHP que hay arriba.
            // el segundo parámetro es el objeto init con la información sobre los
            // datos que queremos enviar, el método de envio, etc.
            var response = await fetch('../php/eliminarTipoUsr.php', init);
            if (response.ok) {
                // si la petición se ha resuelto correctamente,
                // intentamos resolver otra promesa que convierta
                // lo que nos ha respondido el servidor en un objeto de JavaScript.
                // si el servidor no ha enviado correctamente la información
                // en formato JSON, no se podrán convertir correctamente
                // los datos a un objeto, por lo que la promesa fallará
                // y esto provocará un error.
                var respuesta = await response.json();
                // en este ejemplo, el servidor nos devuelve un objeto con dos datos,
                // la media de los números enviados, y un fragmento de HTML
                // con un el título y una lista con los números
                //alert("La media es: " + respuesta.media);
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




