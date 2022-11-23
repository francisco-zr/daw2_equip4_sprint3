function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.currentTarget.appendChild(document.getElementById(data));
    let extractNumber = /\d+/g;
    var tascaId = data.match(extractNumber).join([]);
    var columnaEstado = ev.currentTarget.id;
    $.ajax({
        url: "ajaxKanban.php",
        type: "POST",
        data: { estado: columnaEstado, tasca: tascaId },
        cache: false,
        success: function () {
            // mostrar toast
            $(".toast").toast("show")
        }
    });
}