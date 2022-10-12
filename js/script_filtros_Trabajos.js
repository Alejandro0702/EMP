const inputFiltro = document.querySelector('#txtFiltro');
inputFiltro.addEventListener('keyup', Mostrar_ID);


function Mostrar_ID() {
  let input, filter, table, tr, td, i, j, visible;
  input = document.getElementById("txtFiltro");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla");
  tr = table.getElementsByTagName("tr");
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 1; i < tr.length; i++) {
    visible = false;
    /* Obtenemos todas las celdas de la fila, no sólo la primera */
    td = tr[i].getElementsByTagName("td");
    for (j = 0; j < td.length; j++) {
      if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
        visible = true;
      }
    }
    if (visible === true) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}


  
  