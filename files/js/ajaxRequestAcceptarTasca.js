// your custom ajax request here
function ajaxRequest(params) {
    var url = './getTasques.php'
    $.get(url + '?' + $.param(params.data)).then(function (res) {
      params.success(JSON.parse(res))
    })
  }