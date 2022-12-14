function idFormatter() {
    return 'Total'
}

function nameFormatter(data) {
    return data.length
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