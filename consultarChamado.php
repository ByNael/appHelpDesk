<?php
    require_once "validadorAcesso.php";

    $arquivo = fopen('arquivo.hd', 'r');

    while(!feof($arquivo)) { //percorre cada linha do arquivo até encontrar o eof(end of file)
        if($_SESSION['perfilId'] == 2){
          $registro = fgets($arquivo);

          $testes = explode('#', $registro);
          if($_SESSION['id'] != $testes[0] || count($testes) < 3){
            continue;
          }

          $chamados[] = $registro;
        } else {
          $registro = fgets($arquivo);
          $chamados[] = $registro;

          //foreach($chamadosTeste as $chamadoTeste){
            //$teste = explode('#', $chamadoTeste);

            //if(count($teste) < 3){
              //continue;
            //} else {
                //$chamados[] = $registro;
            //}
          //} 

          //ainda precisa ser implantada logica para chamados com "defeito"
        }
    }

    fclose($arquivo);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="imgs/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
            <?php 
              foreach($chamados as $chamado) { 
                $chamadoDados = explode('#', $chamado); 
                // print_r($chamadoDados); 
            ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamadoDados[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamadoDados[2] ?></h6>
                  <p class="card-text"><?= $chamadoDados[3] ?></p>
                </div>
              </div>

            <?php } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>