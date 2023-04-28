<?php
include './src/class/Componente.php';
include 'config.php';

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>css/style_sidebar.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>css/body.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>css/produtos.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>css/usuarios.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>_bootstrap/css/bootstrap.css">
     <!--jQuery -->
     <script src="<?php echo INCLUDE_PATH?>js/jquery-3.6.3.js"></script>
     <!--Icones -->
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title><?php echo NOME_SITE?></title>
</head>
<body>


    <?php
      $url = isset($_GET['url']) ? $_GET['url'] : 'home'; //Buscando a pagina home

      if(file_exists('src/pages/'.$url.'.php')){
        include('src/pages/'.$url.'.php');
      }else{
        //Podemos fazer o que quiser pois a pagina nao existe
			if( $url != 'contato'){

            $urlPar = explode('/',$url)[0];
            if($urlPar == 'home'){
              include('src/pages/home.php');
            }else{
            include('src/pages/404.php');
            }
      }else{
				include('src/pages/home.php');
			}

      }

      
   ?>



      <!--then Popper.js, then Bootstrap JS -->
      <script src="<?php echo INCLUDE_PATH?>_bootstrap/js/popper.min.js"></script>
      <script src="<?php echo INCLUDE_PATH?>_bootstrap/js/bootstrap.min.js"></script>
      <script src="<?php echo INCLUDE_PATH?>js/js_sidebar.js"></script>
      <script src="<?php echo INCLUDE_PATH?>js/funcs.js"></script>
      <script src="js/custom.js"></script>

      
</body>
</html>