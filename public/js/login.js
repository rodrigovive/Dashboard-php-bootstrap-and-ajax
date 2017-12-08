// action="backend/middelware/checkLogin.php" method="post"

$(document).ready(function () {
    $(".form-signin").on("click", "#login", function (e) {
        e.preventDefault();
        let data = {
            user: $("[name='user']").val(),
            password: $("[name='password']").val()
        }
        console.log(data);
        data.accion = 'login';
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
})