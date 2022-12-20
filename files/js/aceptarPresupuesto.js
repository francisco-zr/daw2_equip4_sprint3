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

$(document).ready(function () {
    $('#editando').click(function () {
        $('.form-check-input').prop("disabled", false);

    });
});  

  $(document).ready(function () {
    $('#enviar_presupuesto').click(function () {
        alert(JSON.stringify($('#table').bootstrapTable('getData')));

    });
});