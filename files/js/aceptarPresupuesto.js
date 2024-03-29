//boolean para activar/desactivar edición
var editar = false;

// aquí se recogen los datos
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
        // sumará en función de si está aceptado o no
        if (row.accepted == 1) {
            return +row[field].substring(0)
        } else {
            return +row[field].substring(1)
        }
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
        <input type="checkbox" class="form-check-input" role="switch" id="customSwitch${index}" ${!editar ? 'disabled' : ''} ${value == true ? 'checked' : ''}>
        <label class="form-check-label" for="customSwitch${index}"></label>
      </div>
    `;
}

function manejaFormatter(value, row, index) {
    return `
        <select class="form-select form-select-sm" aria-label=".form-select-sm gestiona" onchange="getval(this);" id="maneja${index}" ${!editar ? 'disabled' : ''}>
        <option value="Lo gestiona Pymeralia" ${value == null || value == 'Lo gestiona Pymeralia' ? 'selected="selected"' : ''}>Lo gestiona Pymeralia</option>
        <option value="Lo gestiono personalmente" ${value == 'Lo gestiono personalmente' ? 'selected="selected"' : ''}>Lo gestiono personalmente</option>
        </select>
    `;
}

// actualizar quien gestiona
function getval(sel) {
    let pos = sel.id.replace(/maneja/, '');
    actualizarTabla(pos, 'manages', sel.value)
}

function enviar() {
    //desactivando botones
    $('#enviar_presupuesto').prop("disabled", true);
    $('#editando').prop("disabled", true);
    $('.form-check-input').prop("disabled", true);
    $('.form-select-sm').prop("disabled", false);
    //spinner y un timeout para que se vea
    enviar_presupuesto.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Enviando...';
    setTimeout(() => {
        window.location.href = "LlistatPresupost.php";
    }, "1000");
}

// para activar los checkboxs al pulsar modificar presupuesto
$(document).ready(function () {
    $('#editando').click(function () {
        if (!editar) {
            enviar_presupuesto.innerHTML = '<i class="fa-solid fa-pen-to-square"></i>Enviar modificación';
            editando.innerHTML = '<i class="fa-solid fa-xmark"></i>Cancelar edición';
            $('.form-check-input').prop("disabled", false);
            $('.form-select-sm').prop("disabled", false);
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

function actualizarTabla(posicion, campo, valor) {

    $('#table').bootstrapTable('updateCell', {
        // aquí se saca la id del checkbox
        index: posicion,
        field: campo,
        value: valor,
        reinit: false
    })
    $('.form-check-input').prop("disabled", false);
    $('.form-select-sm').prop("disabled", false);
}

// para ver si se ha modificado el presupuesto
$(document).ready(function () {
    $('#table').on('change', 'input[type=checkbox]', function () {
        let posicion = $(this).attr('id').replace(/customSwitch/, '');
        if (!this.checked) {
            actualizarTabla(posicion, 'accepted', 0);
        }
        else if (this.checked) {
            actualizarTabla(posicion, 'accepted', 1);
        }
        $('#table').data("changed", true);
    });
});

// enviando datos por ajax
$(document).ready(function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const presupuesto = urlParams.get('presupuesto');
    $('#enviar_presupuesto').click(function () {
        if ($("#table").data("changed")) {
            // submit the form
            var tareas = JSON.stringify($('#table').bootstrapTable('getData'));
            $.ajax({
                url: 'ajaxAceptarPresupuesto.php',
                data: { tareas: tareas, presupuesto: presupuesto },
                type: 'POST',
                success: function () {
                    enviar();
                }
            });
        }

        else {
            $.ajax({
                url: "ajaxAceptarPresupuesto.php",
                type: "POST",
                data: { presupuesto: presupuesto },
                cache: false,
                success: function () {
                    enviar();
                }
            });
        }
    });
});