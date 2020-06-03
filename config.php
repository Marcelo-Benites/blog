
<?php


   
   session_start();
   date_default_timezone_set('America/Sao_Paulo');
   $autoload = function($class){
   	if($class == 'Email'){
   		require_once('classes/PHPMailer/PHPMailerAutoload.php');
   		require_once('vendor/autoload.php');
   	}
       include('classes/'.$class.'.php');
      
   };

   spl_autoload_register($autoload);



  define('INCLUDE_PATH','http://localhost:8080/blog/');
  define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

  define('BASE_DIR_PAINEL',__DIR__.'/painel');


  //Conectar com banco de dados;
  define('HOST','localhost:3307');
  define('USER','root');
  define('PASSWORD','usbw');
  define('DATABASE','blog_site');

  //Constante para o painel de controle
  define('NOME_EMPRESA','SYSTEM.BENITES');
  
  //Funções do painel
  function pegacargo($indice){

        return Painel::$cargos[$indice];        
  }
  function selecionadoMenu($par){
    /* <i class="fa fa-angle-double-right" aria-hidden="true"></i>*/
       $url = explode('/',@$_GET['url'])[0];
       if($url == $par){
          echo 'class="menu-active"';
       }
  }

   function selecionadoMenu1($par){
    /* <i class="fa fa-angle-double-right" aria-hidden="true"></i>*/
       $url = explode('/',@$_GET['url'])[0];
       if($url == $par){
          echo 'class="menu-active1"';
       }
  }

  function verificarPermissaoMenu($permissao){
        if($_SESSION['cargo'] >= $permissao){
              return;
        } else{
          echo 'style="display:none;"';
        }
  }
  function verificarPermissaoPagina($permissao){
        if($_SESSION['cargo'] >= $permissao){
              return;
        } else{
           include('painel/pages/permissao_negada.php');
           die();
        }
   }

  function recoverPost($post){
    if(isset($_POST[$post])){
      echo $_POST[$post];
    }
  }
?>