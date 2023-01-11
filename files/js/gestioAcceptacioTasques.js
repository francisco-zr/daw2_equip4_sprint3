//Array donde guardamos todas las tareas que aceptará o no el usuario
var tareas = []; 

// Ajax que recoge los valores de una query para despues mostrarlos en el html acceptarTascaDefinitiu.php
function ajaxRequestTasques(params) {
    var url = './getTasques.php'; //url de donde se va a sacar los datos
    $.get(url + '?' + $.param(params.data)).then(function (res) {
      /** insertamos todos los campos que recojemos en el array en blanco */
      //pasamos los datos a tipo JSON y lo guardamos en una variable
      var respuesta = JSON.parse(res);

      //recorremos un bucle por cada dato recibido y le hacemos un push al array con los datos vacios
      respuesta.forEach((e) =>{
        tareas.push({
          id: e.id_recommendation,
          accepted: false,
          gestion: "",
          questionary: e.id_questionary,
          impacto: e.id_impact
        })
      });
      
      //línea de código que transforma el JSON en un formato que mediante JavaScript se pueda consultar facilmente
      params.success(JSON.parse(res)); 
    })
}




/** evento de la BootStrap Table */
window.operateEvents = {
  /** Eventos que se ejecutan cuando se hace click en el elemento con la clase form-check-input */
  "click .form-check-input": function (e, value, row) {
    var checkeado = e.target.checked; //Guardamos el valor de e.target.checked tanto si es true como false
    var gestion = document.getElementById(
      "gestion-tareas-" + row.id_recommendation
    ); //recuperamos el desplegable mediante el DOM

    if (checkeado == true) {
      document.getElementById(
        "gestion-tareas-" + row.id_recommendation + ""
      ).disabled = false; //habilitamos el desplegable para poder seleccionar quien gestiona la tarea

      /** Evento que se ejecuta cuando en el desplegable se selecciona una opción */
      gestion.addEventListener("change", function () {
        var found = false;
        //Comprueba si el valor de gestion no está vacio
        if (gestion.value != "") {
          for (var i = 0; i < tareas.length; i++) {
            if (tareas[i].id == row.id_recommendation) {
              console.log(tareas[i]);
              tareas[i].accepted = true;
              tareas[i].gestion = gestion.value;
              tareas[i].questionary = row.id_questionary;
              tareas[i].impacto = row.id_impact;
              found = true;
            }
          }

          if (!found) {
            //insertamos en el array la tarea seleccionada
            tareas.push({
              id: row.id_recommendation,
              accepted: true,
              gestion: gestion.value,
              questionary: row.id_questionary,
              impacto: row.id_impact
            });
          }
          console.log(tareas);
        } else {

          console.log(tareas);
        }
      });
      console.log(tareas);
    } else {

      //Si checked es igual a false inhabilita el desplegable
      document.getElementById(
        "gestion-tareas-" + row.id_recommendation + ""
      ).disabled = true;

      //Si checked es igual a false cambia el valor de gestion a " "
      document.getElementById(
        "gestion-tareas-" + row.id_recommendation + ""
      ).value = "";

      
      //Bucle que recorre el array y cambia el valor de esa posición por los valores que se pasan dentro de la condición
        for (var i = 0; i < tareas.length; i++) {
          if (tareas[i].id == row.id_recommendation) {
            console.log(tareas[i]);
            tareas[i].gestion = "";
            tareas[i].accepted = false;
            tareas[i].questionary = row.id_questionary;
            tareas[i].impacto = row.id_impact;
          }
        }
      
      console.log(e);
      console.log(tareas);
    }
  },
};









function operateFormatter(value, row, index) {
  return `
                <div class="right">
                <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault-row-${row.id_recommendation}" value="false">
                <input id="valor-escondido-${row.id_recommendation}" value="${row.id_recommendation}" hidden>
                <input class="form-check-input" type="checkbox" id="id-questionari-${row.id_questionary}" value="false">
                <select id="gestion-tareas-${row.id_recommendation}" name="gestion-tareas-${row.id_recommendation}" class="gestion-tareas" disabled>
                    <option value="">Seleccionar una opción</option>
                    <option value="Pymeralia">Lo gestiona Pymeralia</option>
                    <option value="Personalmente">Lo gestiono personalmente</option>
                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                </div>
            `;
}









/** RELLENAR EL ARRAY CON DATOS VACIOS AL INCIAR EL DOCUMENTO */
$(document).ready(function () {
    $("#enviar-tareas").click(function () {
    //Comprovación de si el array está vacio
    if (tareas.length != 0) {
      /** ENVIO DE DATOS POR AJAX */

      //Convierte el array en un string
      const datosArray = JSON.stringify(tareas);

      //Genera la petición AJAX
      $.ajax({
        type: "POST",
        url: "enviarTasquesAcceptadesJSON.php",
        data: { datosArray: datosArray },
        success: function (response) {
          // Handle the success
          console.log("Success: " + response);
        },
        error: function (xhr, status, error) {
          // Handle the error
          console.log("Error: " + error);
        },
      });

      //Deshabilitamos la tabla
      $("#contenedorContenidoTabla").attr('hidden', true);

      //Habilitamos la animación de carga
      $("#contendorContenidoCargando").attr("hidden", false);
      
      
      /** REDIRECCIÓN A UNA PÁGINA NUEVA AL ENVIAR DATOS */
      setTimeout(() => {
      window.location.href = "LlistatPresupost.php";
      }, "3000");
      
    } else {
      console.log("No se ha seleccionado ninguna opción");
    }
  });
});