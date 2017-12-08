$(document).ready(function(){
    let politicas = function(){
        let data = {};
        data.accion = 'Politicas';
        $.ajax({
            url: 'routes.php',
            type: 'POST',
            data: data,
            success: function (e) {
                console.log(JSON.parse(e));
                console.log($("#politicas"));
                let ex = JSON.parse(e);
                ex.map(function(i,val){
                    $('#politicas').append("<option value="+ i.id + ">" + i.name + "</option>");
                })
                // window.location = 'dashboard.php'
            },
            error: function (e) {
                console.log(e);
            }
        })
    }
    politicas();
})