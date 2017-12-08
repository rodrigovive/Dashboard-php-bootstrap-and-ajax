$(document).ready(function () {

    $(".form-register-role").on("click", "#register", function (e) {
        e.preventDefault();
        console.log($("[name='politicas']").val());
        let data = {
            name: $("[name='name']").val(),
            description: $("[name='description']").val(),
            politicas : $("[name='politicas']").val()
        }
        console.log(data);
        data.accion = 'createRole';
        $.ajax({
            url: 'routes.php',
            type: 'POST',
            data: data,
            success: function (e) {
                console.log(e);
                // window.location = 'dashboard.php'
            },
            error: function (e) {
                console.log(e);
            }
        })
    });

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



    // $(".form-register-role").on("change", "#politicas", function (e) {
    //     e.preventDefault();
    //     let pol = $(this);
    //     console.log(this)
    //     console.log(pol)
    //     let politica = $(".politica-select");
    //     politica.append("<label >"+ this.text +"</label>");
    // })
})