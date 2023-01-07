// your custom ajax request here
function ajaxRequest(params) {
    var url = '../public/getPresupuesto.php'
    $.get(url).then(function (res) {
        params.success(JSON.parse(res))
    })
}

function idFormatter(data) {
    return 'Total ' + data.length
}

function priceFormatter(data) {
    var field = this.field
    return '€' + data.map(function (row) {
        return +row[field].substring(0)
    }).reduce(function (sum, i) {
        return sum + i
    }, 0)
}

function footerStyle(column) {
    return {
        id: {
            classes: 'uppercase'
        },
        name: {
            css: {
                'font-weight': 'normal'
            }
        },
        price: {
            css: {
                color: 'red'
            }
        }
    }[column.field]
}
function statusFormatter(value, row, index) {
    return `
      <div class="form-check form-switch">
        <input type="checkbox" class="form-check-input" role="switch" id="customSwitch${index}" disabled ${value == true ? 'checked' : ''}>
        <label class="form-check-label" for="customSwitch${index}"></label>
      </div>
    `;
}
// para activar los checkboxs al pulsar modificar presupuesto
$(document).ready(function () {
    var editar = false;
    $('#editando').click(function () {
        if (!editar) {
            enviar_presupuesto.innerHTML = '<i class="fa-solid fa-pen-to-square"></i>Enviar modificación';
            editando.innerHTML = '<i class="fa-solid fa-xmark"></i>Cancelar edición';
            $('.form-check-input').prop("disabled", false);
            editar = true;
        } else {
            $('#table').bootstrapTable('refresh')
            enviar_presupuesto.innerHTML = '<i class="fa-solid fa-check"></i>Aceptar Presupuesto';
            editando.innerHTML = '<i class="fa-solid fa-pen-to-square"></i>Modificar Presupuesto';
            $('#table').data("changed", false);
            editar = false;
        }
    });
});

// para ver si se ha modificado el presupuesto
$(document).ready(function () {
    $('#table').on('change', 'input[type=checkbox]', function () {
        if (!this.checked) {
            $('#table').bootstrapTable('updateCell', {
                // aquí se saca la id del checkbox
                index: $(this).attr('id').replace(/customSwitch/, ''),
                field: 'accepted',
                value: `0`,
                reinit: false
            })
            $('.form-check-input').prop("disabled", false);
        }
        else if (this.checked) {
            //$(this).attr("checked", true);
            $('#table').bootstrapTable('updateCell', {
                // aquí se saca la id del checkbox
                index: $(this).attr('id').replace(/customSwitch/, ''),
                field: 'accepted',
                value: `1`,
                reinit: false
            })
            $('.form-check-input').prop("disabled", false);
        }
        $('#table').data("changed", true);
    });
});

$(document).ready(function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const presupuesto = urlParams.get('presupuesto');
    $('#enviar_presupuesto').click(function () {
        if ($("#table").data("changed")) {
            // submit the form
            console.log("Presupuesto enviado para modificar");
            var tareas = JSON.stringify($('#table').bootstrapTable('getData'));
            $.ajax({
                url: 'ajaxAceptarPresupuesto.php',
                data: { tareas: tareas, presupuesto: presupuesto },
                type: 'POST',
                success: function () {
                    console.log("enviado la modificación");
                }
            });
        }

        else {
            console.log(presupuesto);
            $.ajax({
                url: "ajaxAceptarPresupuesto.php",
                type: "POST",
                data: { presupuesto: presupuesto },
                cache: false,
                success: function () {
                    // mostrar toast
                    //$(".toast").toast("show")
                    console.log("enviar presupuesto sin más")
                }
            });
        }
    });
});