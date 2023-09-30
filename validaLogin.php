<?php 

    session_start(); //sempre antes de qualquer impressão de dados no navegador

    $usuarioAutenticado = false;

    $usuariosApp = array(
        array('email' => 'adm@teste.com.br', 'password' => '123456'), //array para simular um banco de dados estatico  momentaneo
        array('email' => 'user@teste.com.br', 'password' => 'abcde'),
    );

    foreach($usuariosApp as $user){
        if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
            $usuarioAutenticado = true;
        }
    }

    if($usuarioAutenticado){
        echo 'Usúario autenticado';
        $_SESSION['autenticado'] = 'SIM';
        header('Location: home.php');
    } else{
        header('Location: index.php?login=erro');
        $_SESSION['autenticado'] = 'NÃO';
    }

?>