var tareas = []; //Array donde guardamos todas las tareas aceptadas

        /** evento de la BootStrap Table */
        window.operateEvents = {
            /** Eventos que se ejecutan cuando se hace click en el elemento con la clase form-check-input */
            'click .form-check-input': function(e, value, row) {
                
                var checkeado = e.target.checked; //Guardamos el valor de e.target.checked tanto si es true como false
                var accepted = 0; //variable donde gaurdamos el resultado de aceptado o no
                var gestion = document.getElementById("gestion-tareas-" + row.id_recommendation); //recuperamos el desplegable mediante el DOM

                function hola(){
                    console.log("Hola");
                }

                if (checkeado == true) {
                    accepted = 1; //ponemos que la tarea está aceptada
                    document.getElementById('gestion-tareas-' + row.id_recommendation + '').disabled = false; //habilitamos el desplegable para poder seleccionar quien gestiona la tarea
                    console.log(gestion);

                    /** Evento que se ejecuta cuando en el desplegable se selecciona una opción */
                    gestion.addEventListener('change', function(){
                        
                        //Comprueba si el valor de gestion no está vacio
                        if(gestion.value != ""){
                            tareas.push({"id":row.id_recommendation, "accepted": true,"gestion": gestion.value}); //insertamos en el array la tarea seleccionada

                            //Comprueba si el id de la tarea que estamos trabajando es igual que vamos a insertar, si es igual borrará todos los anteriores y creará uno nuevo con la nueva gestión seleccionada
                            if(tareas[row.id_recommendation -1].id == row.id_recommendation){
                                tareas.splice(row.id_recommendation -1, 50);
                                tareas.push({"id":row.id_recommendation, "accepted": true,"gestion": gestion.value}); //insertamos el nuevo valor en el array la tarea seleccionada
                            }
                            console.log(tareas);
                        } else{
                            console.log(tareas);
                        }
                    })
                    
                    
                    
                   
                    console.log(tareas);
                    
                } else {
                    accepted = 0;
                    document.getElementById('gestion-tareas-' + row.id_recommendation + '').disabled = true;
                    //gestion.value = "";
                    tareas.splice(row.id_recommendation -1, 1);
                    console.log(e);
                    console.log(tareas);
                }
            }

            
        }



        $(document).ready(function(){
            $('#enviar-tareas').click(function(){
                    const jeison = JSON.stringify(tareas);
                    console.log(jeison);

                    /** poner aqui el envio del json al php */
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

        

        