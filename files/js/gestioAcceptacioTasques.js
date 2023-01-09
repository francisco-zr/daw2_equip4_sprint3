var tareas = []; //Array donde guardamos todas las tareas aceptadas

/** evento de la BootStrap Table */
window.operateEvents = {
  /** Eventos que se ejecutan cuando se hace click en el elemento con la clase form-check-input */
  "click .form-check-input": function (e, value, row) {
    var checkeado = e.target.checked; //Guardamos el valor de e.target.checked tanto si es true como false
    var gestion = document.getElementById(
      "gestion-tareas-" + row.id_recommendation
    ); //recuperamos el desplegable mediante el DOM

    if(checkeado == false){
      console.log("soy false");
    }

    if (checkeado == true) {
      document.getElementById( "gestion-tareas-" + row.id_recommendation + "").disabled = false; //habilitamos el desplegable para poder seleccionar quien gestiona la tarea
      
      /** Evento que se ejecuta cuando en el desplegable se selecciona una opción */
      gestion.addEventListener("change", function () {
        //Comprueba si el valor de gestion no está vacio
        if (gestion.value != "") {
          tareas.push({
            id: row.id_recommendation,
            accepted: true,
            gestion: gestion.value,
          }); //insertamos en el array la tarea seleccionada

          var contador = 0;

          tareas.forEach(e => {
            //Comprueba si el id de la tarea que estamos trabajando es igual que vamos a insertar, si es igual borrará todos los anteriores y creará uno nuevo con la nueva gestión seleccionada
            /*if(tareas.id_recommendation == e.id_recommendation){
              tareas.splice(e.id_recommendation, 1, {
                id: row.id_recommendation,
                accepted: true,
                gestion: gestion.value,
              });*/
              if(e.id == row.id_recommendation){
                console.log("El índice es" + contador);

                tareas.splice(contador, 1) //elimina
              
                
                tareas[contador] = {
                  id: row.id_recommendation,
                  accepted: true,
                  gestion: gestion.value,
                  } 

                contador = 0;
              }else{
                contador++;
              }
          });

          console.log(tareas);
        } else {
          console.log(tareas);
        }
      });
      console.log(tareas);

    } else { //Si checked es igual a false
      document.getElementById(
        "gestion-tareas-" + row.id_recommendation + ""
      ).disabled = true;

      document.getElementById(
        "gestion-tareas-" + row.id_recommendation + ""
      ).value = "";


      var contador2 = 0;

          tareas.forEach(e => {
            //Comprueba si el id de la tarea que estamos trabajando es igual que vamos a insertar, si es igual borrará todos los anteriores y creará uno nuevo con la nueva gestión seleccionada
            /*if(tareas.id_recommendation == e.id_recommendation){
              tareas.splice(e.id_recommendation, 1, {
                id: row.id_recommendation,
                accepted: true,
                gestion: gestion.value,
              });*/
              if(e.id == row.id_recommendation){
                tareas.splice(contador2, 1) //elimina
                tareas.push({
                  id: row.id_recommendation,
                  accepted: false,
                  gestion: "",
                });
                contador2 = 0;
              }else{
                contador2++;
              }
          });
      
      //tareas.splice(row.id_recommendation, 1);
      console.log(e);
      console.log(tareas);
    }
  },
};


$(document).ready(function () {
  $("#enviar-tareas").click(function () {
    /** poner aqui el envio del json al php 
                   const options = {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(tareas)
                   } 

                    fetch('../public/enviarTasquesAcceptadesJSON.php', options)
                        .then(response => response.json())
                        .then(data => console.log(tareas))*/



    
    // Crea un nuevo objeto XMLHttpRequest
    var request = new XMLHttpRequest();

    // Configura la solicitud
    request.open("POST", "../public/enviarTasquesAcceptadesJSON.php", true);

    // Establece la cabecera para indicar que se enviará una cadena de texto
    request.setRequestHeader("Content-Type", "application/json");

    // Envía la solicitud con el array como carga
    request.send(JSON.stringify(tareas));
    console.log(tareas);
  });
});


function operateFormatter(value, row, index) {
  return `
                <div class="right">
                <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault-row-${row.id_recommendation}" value="#pasar-el-checked-true-o-false">
                <input id="valor-escondido-${row.id_recommendation}" value="${row.id_recommendation}" hidden>
                <select id="gestion-tareas-${row.id_recommendation}" name="gestion-tareas" class="gestion-tareas" disabled>
                    <option value="">Seleccionar una opción</option>
                    <option value="Pymeralia">Lo gestiona Pymeralia</option>
                    <option value="Personalmente">Lo gestiono personalmente</option>
                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                </div>
            `;
}
