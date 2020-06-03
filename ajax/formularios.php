<?php
     include('../config.php');
     $data = [];
	 $assunto = 'Nova mensagem do site';
      $corpo = '';
      foreach ($_POST as $key => $value) {
      	 $corpo.= ucfirst($key).": ".$value;
	         $corpo.="<hr>";
      }
      $info = array('assunto'=>$assunto,'corpo'=>$corpo);
      $mail = new Email('br572.hostgator.com.br','contato1@benites13.com','Mfb@10203040','benite59');
      $mail->addAdress('contato2@benites13.com','benite59');
      $mail->formatarEmail($info);
      if($mail->enviarEmail()){
     $data['sucesso'] = true;
    }else{
      $data['error'] = true;
   }

      $data['retorno'] = 'sucesso';
	 die(json_encode($data));
?>