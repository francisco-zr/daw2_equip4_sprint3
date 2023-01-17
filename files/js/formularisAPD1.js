  // Obtener los botones de ordenar
  var btnAsc = document.getElementById("ascendente");
  var btnDesc = document.getElementById("descendente");

  // Asignar eventos de clic a los botones
  btnAsc.addEventListener("click", function() {
    showOriginal();
  });
  btnDesc.addEventListener("click", function() {
    sortTable(-1);
  });

  var originalTable = document.getElementById("miTabla").innerHTML;

  function showOriginal() {
    document.getElementById("miTabla").innerHTML = originalTable;
  }

  function sortTable(order) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("miTabla");
    switching = true;
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 0; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[5];
        y = rows[i + 1].getElementsByTagName("TD")[5];
        if (order == -1) {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        } else {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }
