$(function() {
  let uri = new URI(location);
  $("#list-user").on("click",".edit-user",function(e){
    let id = $(e.target).data("id");
    // console.log(this);
    // let $this = $(this);
    showUser(id);
  })
  let showUser = function(id){
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
        $("#addPage #name-edit").val(user[0].user);
        $("#addPage #email-edit").val(user[0].email);
        $("#addPage #password-edit").val(user[0].password);
        $("#addPage #rol-edit").val(user[0].rol);
        // let xd2 = $("#addPage #name-edit").val();
        // let xd = $("[name='name']").val();
        // console.log(xd);
        // console.log(xd2);
      },
      error: function(e) {
        console.log(e);
      }
    });
  }
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
          $("#list-user").append("<td>" + i.password + "</td>");
          $("#list-user").append("<td>" + i.rol + "</td>");
          $("#list-user").append(
            '<td><a type="button" data-toggle="modal" data-id="'+ i.id +'" data-target="#addPage" class="btn btn-warning btn-xs edit-user">Edit</a><a href="#" class="btn btn-danger btn-xs">Delete</a></td>'
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
            '<td><a type="button" data-toggle="modal" data-target="#addPage" class="btn btn-warning btn-xs">Edit</a><a href="#" class="btn btn-danger btn-xs">Delete</a></td>'
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
          $("#list-politicas").append('<td class="text-center">' + i.id + "</td>");
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
