$(document).ready(function () {
    validatePassword = function(data){
        if(data.password == data.repeat){
            console.log('contra iguales');
            return false;
        }
    }

    $(".form-register").on("click", "#register", function (e) {
        e.preventDefault();
        let data = {
            email: $("[name='email']").val(),
            name: $("[name='name']").val(),
            password: $("[name='password']").val(),
            repeat: $("[name='password-repeat']").val(),
            rol: $("[name='rol']").val(),
        }
        validatePassword(data);
        console.log(data);
        data.accion = 'createUser';
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
    })

    let roles = function(){
        let data = {};
        data.accion = 'Roles';
        $.ajax({
            url: 'routes.php',
            type: 'POST',
            data: data,
            success: function (e) {
                console.log(JSON.parse(e));
                let ex = JSON.parse(e);
                ex.map(function(i,val){
                    $('#roles').append("<option value="+ i.id + ">" + i.name + "</option>");
                })
                // window.location = 'dashboard.php'
            },
            error: function (e) {
                console.log(e);
            }
        })
    }
    roles();
})