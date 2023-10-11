<?php 

    session_start(); //sempre antes de qualquer impressão de dados no navegador

    $usuarioAutenticado = false;
    $usuarioId = null;
    $usuarioPerfilId = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    $usuariosApp = array(
        array('id' => 1, 'email' => 'adm@teste.com.br', 'password' => '1234', 'perfilId' => 1), //array para simular um banco de dados estatico  momentaneo
        array('id' => 2, 'email' => 'user@teste.com.br', 'password' => '1234',  'perfilId' => 1),
        array('id' => 3, 'email' => 'jose@teste.com.br', 'password' => '1234',  'perfilId' => 2),
        array('id' => 4, 'email' => 'maria@teste.com.br', 'password' => '1234',  'perfilId' => 2),
    );

    foreach($usuariosApp as $user){
        if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
            $usuarioAutenticado = true;
            $usuarioId = $user['id'];
            $usuarioPerfilId = $user['perfilId'];
        }
    }

    if($usuarioAutenticado){
        echo 'Usúario autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuarioId;
        $_SESSION['perfilId'] = $usuarioPerfilId;
        header('Location: home.php');
    } else{
        header('Location: index.php?login=erro');
        $_SESSION['autenticado'] = 'NÃO';
    }

?>