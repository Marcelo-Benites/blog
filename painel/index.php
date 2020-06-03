<?php
    //init_set('max_execution_time','0');
    ini_set('memory_limit', '-1');
    include('../config.php');

    if(Painel::logado() == false){
         include('login.php');
    }else{
    	include('main.php');
    }

?>