// Ajax que recoge los valores de una query para despues mostrarlos en el html acceptarTascaDefinitiu.php
function ajaxRequest(params) {
    var url = './getTasques.php'; //url de donde se va a sacar los datos
    $.get(url + '?' + $.param(params.data)).then(function (res) {
      params.success(JSON.parse(res)); //línea de código que transforma el JSON en un formato que mediante JavaScript se pueda consultar facilmente
    })
  }