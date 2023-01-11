var tareas = []; //Array donde guardamos todas las tareas aceptadas


/** evento de la BootStrap Table */
window.operateEvents = {
  /** Eventos que se ejecutan cuando se hace click en el elemento con la clase form-check-input */
  "click .form-check-input": function (e, value, row) {
    var checkeado = e.target.checked; //Guardamos el valor de e.target.checked tanto si es true como false
    var gestion = document.getElementById(
      "gestion-tareas-" + row.id_recommendation
    ); //recuperamos el desplegable mediante el DOM

    if (checkeado == true) {
      document.getElementById( "gestion-tareas-" + row.id_recommendation + "").disabled = false; //habilitamos el desplegable para poder seleccionar quien gestiona la tarea
      
      /** Evento que se ejecuta cuando en el desplegable se selecciona una opción */
      gestion.addEventListener("change", function () {

        //Comprueba si el valor de gestion no está vacio
        if (gestion.value != "") {
          //insertamos en el array la tarea seleccionada
          tareas.push({
            id: row.id_recommendation,
            accepted: true,
            gestion: gestion.value,
            questionary: row.id_questionary
          }); 

          /** PARA MODIFICAR EL VALOR DEL SELECTOR
           * HACER UN ON TARGET ENCIMA DEL SELECTOR PARA SABER EN QUE FILA ESTÁ SITUADA,
           * ASÍ SIEMPRE ESTARÁ FOCUSEADA ENCIMA DE LA FILA CORRESPONDIENTE Y SABRÁ QUE FILA HA DE ELIMINAR  */

          var contador = 0;

          tareas.forEach(e => {
            //Comprueba si el id de la tarea que estamos trabajando es igual que vamos a insertar, si es igual borrará todos los anteriores y creará uno nuevo con la nueva gestión seleccionada
          console.log(e.id)
              if(e.id == row.id_recommendation){
                console.log("El índice es" + contador);

                //elimina en la posicion de contador 1 campo
                tareas.splice(contador, 1) 
              
                //Inserta un nuevo campo en esa posicion del array Tareas
                tareas[contador] = { 
                  id: row.id_recommendation,
                  accepted: true,
                  gestion: gestion.value,
                  questionary: row.id_questionary
                  } 

                //Reinicia el contador a 0
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
              if(e.id == row.id_recommendation){
                tareas.splice(contador2, 1) //elimina
                // tareas.push({
                //   id: row.id_recommendation,
                //   accepted: false,
                //   gestion: "",
                //   questionary: row.id_questionary
                // });
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
  /** POSIBLE CODIGO PARA INSERTAR TODOS LOS VALORES VACIOS AL INICIAR EL DOCUMENTO *//** NO PRIORITARIO */
/*const largoTabla = $tabla.bootstrapTable('getData').length;
  for(let i = 1; i <= largoTabla ; i++){
    console.log(i);
  }

  var selector = $("#flexSwitchCheckDefault-row-1");
  console.log(selector);

  if (!selector.is(":checked")) {
    contador = 1;
    
    tareas.push({
      id: contador,
      accepted: false,
      gestion: "",
    });
    console.log("El elemento no está seleccionado")
    console.log(tareas)*/

  $("#enviar-tareas").click(function () {
    //Comprovación de si el array está vacio
    if(tareas.length != 0){

      tareas.forEach(e => {
        if(tareas['gestion'] === ""){
            console.log("está vacio");
        }
      });  


    /** ENVIO DE DATOS POR AJAX */
    const datosArray = JSON.stringify(tareas);
    $.ajax({
      type: "POST",
      url: "enviarTasquesAcceptadesJSON.php",
      data: {datosArray: datosArray},
      success: function(response){
          // Handle the success
          console.log("Success: " + response);
      },
      error: function(xhr, status, error){
          // Handle the error
          console.log("Error: " + error);
      }
    });

    /** REDIRECCIÓN A UNA PÁGINA NUEVA AL ENVIAR DATOS */
    window.location.href = 'LlistatPresupost.php';
    }
    else{
    console.log("No se ha seleccionado ninguna opción");
    }
    
  })
})

/** SELECCIÓN DE DATOS PARA PINTAR EN EL HTML FUERA DE LA TABLA  */




    
      
    
                   

  
  
 
   
 
  
