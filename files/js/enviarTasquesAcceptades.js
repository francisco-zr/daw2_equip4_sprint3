function enviarTasquesAcceptadesJS(){
    jQuery.ajax({
           type: "POST",
           url: 'TascaClass.php',
           dataType: 'json',
           data: {functionname: 'enviarTasquesAcceptades'},
     });
}