<?php
    include ( __DIR__.'/backend/controllers/UserController.php');
    include ( __DIR__.'/backend/controllers/PoliticaController.php');
    include ( __DIR__.'/backend/controllers/RoleController.php');
    include ( __DIR__.'/backend/controllers/connectDatabase.php');
    // require( __DIR__ ."/backend/controllers/connectDatabase.php");

    use RoleController\RoleController as Role;
    use PoliticaController\PoliticaController as Politica;
    use UserController\UserController as User;


    if ($_POST['accion']=='login'){
        require( __DIR__ ."/backend/middleware/checkLogin.php");
    }
    if ($_POST['accion']=='getUsers'){
        $user = new User;
        $user->index();
    }
    if ($_POST['accion']=='createUser'){
        $data = array();
        $data['email'] = $_POST['email'];
        $data['name'] = $_POST['name'];
        $data['rol'] = $_POST['rol'];
        $data['password'] = $_POST['password'];
        $user = new User;
        $user->create($data);
    }
    if ($_POST['accion']=='editUser'){
        extract($_GET);
        $user = new User;
        $user->update($id);
    };
    if ($_POST['accion']=='showUser'){
        $id = $_POST['id'];
        $user = new User;
        $user->show($id);
    }
    if ($_POST['accion']=='deleteUser'){
        extract($_GET);
        $user = new User;
        $user->update($id);
    }
    if ($_POST['accion']=='Roles'){
        $role = new Role;
        $role->index();
    }
    if ($_POST['accion']=='Politicas'){
        $politica = new Politica;
        $politica->index();
    }
    if ($_POST['accion']=='createRole'){
        $data = array();
        $data['name'] = $_POST['name'];
        $data['description'] = $_POST['description'];
        $data['politicas'] = $_POST['politicas'];
        $role = new Role;
        $role->create($data);
    }
?>