<?php 

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
    } else{
        header('Location: index.php?login=erro');
    }

?>