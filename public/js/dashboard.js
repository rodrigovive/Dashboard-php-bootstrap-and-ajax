$(function() {
  let uri = new URI(location);
  validatePassword = function(data) {
    if (data.password == data.repeat) {
      console.log("contra iguales");
      return false;
    }
  };

  $("#addUser").on("click", "#register", function(e) {
    e.preventDefault();
    let data = {
      email: $("#addUser #email-edit").val(),
      name: $("#addUser #name-edit").val(),
      password: $("#addUser #password-edit").val(),
      repeat: $("#addUser #password-edit").val(),
      rol: $("#user-roles").val()
    };
    // validatePassword(data);
    let id = $("#addUser #id-edit").val();
    if (id != "") {
      data.id = $("#addUser #id-edit").val();
      data.accion = "editUser";
      console.log(" asdas ", data);

    } else {
      data.accion = "createUser";
    }
    console.log(data);
    $.ajax({
      url: "routes.php",
      type: "POST",
      data: data,
      success: function(e) {
        console.log(e);
        setTimeout(time, 1000)
        function time(){
          window.location = "dashboard.php";
        }
        toastr.success('Usuario agregado correctamente')
      },
      error: function(e) {
        console.log(e);
      }
    });
  });

  $("#addRole").on("click", "#register", function(e) {
    e.preventDefault();

    let data = {
      name: $("#addRole #name-edit").val(),
      description: $("#addRole #description-edit").val(),
      politicas: $("[name='politicas']").val()
    };
    let id = $("#addRole #id-edit").val();
    if (id != "") {
      data.id = id;
      data.accion = "editRole";
    } else {
      data.accion = "createRole";
    }
    $.ajax({
      url: "routes.php",
      type: "POST",
      data: data,
      success: function(e) {
        console.log(e);
        setTimeout(time, 1000)
        function time(){
          window.location = "roles.php";
        }
        toastr.success('Rol editado correctamente')
      },
      error: function(e) {
        console.log(e);
      }
    });
  });

  $("#list-roles").on("click", ".delete-role", function(e) {
    e.preventDefault();
    let data = {};
    let id = $(e.target).data("id");
    data.accion = "deleteRole";
    data.id = id;
    console.log(data,'asdasdas das ');
    debugger
    $.ajax({
      url: "routes.php",
      type: "POST",
      data: data,
      success: function(e) {
        console.log(e);
        setTimeout(time, 1000)
        function time(){
          window.location = "roles.php";
        }
        toastr.success('Rol borrado correctamente')
      },
      error: function(e) {
        console.log(e);
      }
    });
  });

  $("#list-user").on("click", ".delete-user", function(e) {
    e.preventDefault();
    let data = {};
    let id = $(e.target).data("id");
    data.accion = "deleteUser";
    data.id = id;
    console.log(data,'asdasdas das ');
    debugger
    $.ajax({
      url: "routes.php",
      type: "POST",
      data: data,
      success: function(e) {
        console.log(e);
        setTimeout(time, 1000)
        function time(){
          window.location = "dashboard.php";
        }
        toastr.success('Usuario borrado correctamente')
      },
      error: function(e) {
        console.log(e);
      }
    });
  });

  $("#list-user").on("click", ".edit-user", function(e) {
    let id = $(e.target).data("id");
    user_roles();
    showUser(id);
  });
  let politicas_roles = function() {
    let data = {};
    data.accion = "Politicas";
    $.ajax({
      url: "routes.php",
      type: "POST",
      data: data,
      success: function(e) {
        console.log(JSON.parse(e));
        let ex = JSON.parse(e);
        $(".role-politica").remove();
        ex.map(function(i, val) {
          $("#politicas-roles").append(
            '<option class="role-politica" value=' +
              i.id +
              ">" +
              i.name +
              "</option>"
          );
        });
        // window.location = 'dashboard.php'

      },
      error: function(e) {
        console.log(e);
      }
    });
  };

  let user_roles = function() {
    let data = {};
    data.accion = "Roles";
    $.ajax({
      url: "routes.php",
      type: "POST",
      data: data,
      success: function(e) {
        console.log(JSON.parse(e));
        let ex = JSON.parse(e);
        $(".user-roles").remove();
        ex.map(function(i, val) {
          $("#user-roles").append(
            "<option class='user-roles' value=" +
              i.id +
              ">" +
              i.name +
              "</option>"
          );
        });
        // window.location = 'dashboard.php'
      },
      error: function(e) {
        console.log(e);
      }
    });
  };

  $(".create-button").on("click", ".create-role", function() {
    // $("#addRole #id-edit").val('');
    $("#addRole #myModalLabel").text("Crear Role");
    $("#addRole #name-edit").val("");
    $("#addRole #description-edit").val("");

    politicas_roles();
  });
  $(".create-button").on("click", ".create-user", function() {
    console.log("xdxdadas");
    $("#addUser #myModalLabel").text("Crear Usuario");
    $("#addUser #id-edit").val("");
    $("#addUser #name-edit").val("");
    $("#addUser #email-edit").val("");
    $("#addUser #password-edit").val("");
    $("#addUser #user-roles").val("");
    user_roles();
    // $("#addPage #name-edit").val('');
    // $("#addPage #description-edit").val('');
  });
  $("#list-roles").on("click", ".edit-role", function(e) {
    let id = $(e.target).data("id");
    console.log(id);
    politicas_roles();
    showRole(id);
  });
  let showUser = function(id) {
    let data = {};
    data.accion = "showUser";
    data.id = id;
    $.ajax({
      url: "routes.php",
      type: "POST",
      data: data,
      success: function(e) {
        let user = JSON.parse(e);
        // $("#registration_modal #useremail").val().trim()
        // let xd2 = $("#addPage #name-edit").val();
        $("#addUser #myModalLabel").text("Editar Usuario");
        console.log(user[0].role_id, "    asdasdasdas das das da");
        $("#addUser #id-edit").val(user[0].id);
        $("#addUser #name-edit").val(user[0].user);
        $("#addUser #email-edit").val(user[0].email);
        $("#addUser #password-edit").val(user[0].password);
        $("#addUser #user-roles").val(user[0].role_id);
      },
      error: function(e) {
        console.log(e);
      }
    });
  };
  let showRole = function(id) {
    let data = {};
    data.accion = "showRole";
    data.id = id;
    console.log(data);
    $.ajax({
      url: "routes.php",
      type: "POST",
      data: data,
      success: function(e) {
        console.log(e);
        let role = JSON.parse(e);
        $("#addRole #myModalLabel").text("Editar Role");
        $("#addRole #name-edit").val(role[0].name);
        $("#addRole #id-edit").val(role[0].id);
        let xd = [];
        role[1].map(function(i, val) {
          xd.push(i.id);
        });
        $("#politicas-roles").val(xd);
        $("#addRole #description-edit").val(role[0].description);
      },
      error: function(e) {
        console.log(e);
      }
    });
  };
  let user = function() {
    let data = {};
    data.accion = "getUsers";
    $.ajax({
      url: "routes.php",
      type: "POST",
      data: data,
      success: function(e) {
        let ex = JSON.parse(e);
        ex.map(function(i, val) {
          $("#list-user").append("<tr>");
          $("#list-user").append('<td class="text-center">' + i.id + "</td>");
          $("#list-user").append("<td>" + i.user + "</td>");
          $("#list-user").append("<td>" + i.email + "</td>");
          // $("#list-user").append("<td>" + i.password + "</td>");
          $("#list-user").append("<td>" + i.rol + "</td>");
          $("#list-user").append(
            '<td><a type="button" data-toggle="modal" data-id="' +
              i.id +
              '" data-target="#addUser" class="btn btn-warning btn-xs edit-user">Edit</a><a type="button" data-id="' +
              i.id +
              '" class="btn btn-danger btn-xs delete-user">Delete</a></td>'
          );
          $("#list-user").append("</tr>");
        });
        console.log(e);
      },
      error: function(e) {
        console.log(e);
      }
    });
  };

  let roles = function() {
    let data = {};
    data.accion = "Roles";
    $.ajax({
      url: "routes.php",
      type: "POST",
      data: data,
      success: function(e) {
        console.log(JSON.parse(e));
        let ex = JSON.parse(e);
        ex.map(function(i, val) {
          $("#list-roles").append("<tr>");
          $("#list-roles").append('<td class="text-center">' + i.id + "</td>");
          $("#list-roles").append("<td>" + i.name + "</td>");
          $("#list-roles").append("<td>" + i.description + "</td>");
          $("#list-roles").append(
            '<td><a type="button" data-toggle="modal" data-target="#addRole"  data-id="' +
              i.id +
              '" class="btn btn-warning btn-xs edit-role">Edit</a><a type="button" data-id="' +
              i.id +
              '"class="btn btn-danger btn-xs delete-role">Delete</a></td>'
          );
          $("#list-roles").append("</tr>");
        });
        // window.location = 'dashboard.php'
      },
      error: function(e) {
        console.log(e);
      }
    });
  };

  let politicas = function() {
    let data = {};
    data.accion = "Politicas";
    $.ajax({
      url: "routes.php",
      type: "POST",
      data: data,
      success: function(e) {
        console.log(JSON.parse(e));
        let ex = JSON.parse(e);
        ex.map(function(i, val) {
          $("#list-politicas").append("<tr>");
          $("#list-politicas").append(
            '<td class="text-center">' + i.id + "</td>"
          );
          $("#list-politicas").append("<td>" + i.name + "</td>");
          $("#list-politicas").append("<td>" + i.description + "</td>");
          $("#list-politicas").append("</tr>");
        });
        // window.location = 'dashboard.php'
      },
      error: function(e) {
        console.log(e);
      }
    });
  };

  if (uri.filename() == "dashboard.php") {
    user();
  } else if (uri.filename() == "roles.php") {
    roles();
  } else if (uri.filename() == "politicas.php") {
    politicas();
  }
});
