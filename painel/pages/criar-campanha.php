<div class="box-content">
	<?php
	 if(isset($_POST['acao'])){

	 	$conteudo=$_POST['conteudo'];
	 	$assunto = $_POST['assunto']; 
	 	$contatos =\MySql::conectar()->prepare("SELECT * FROM `tb_admin.contatos` WHERE lista_id = ?");
	 	$contatos->execute(array($_POST['lista_id']));
	 	$contatos = $contatos->fetchAll();
	 	foreach ($contatos as $key => $value) {
      $mail = new \Email('br572.hostgator.com.br','contato1@benites13.com','Mfb@10203040','benite59');
      $mail->formatarEmail(array('assunto'=>$assunto,'corpo'=>$conteudo));
	 		$email_atual = $value['email'];
      //$mail->AddAttachment($email_atual.$_FILES['uploaded'.$i]['imagem'], $_FILES['uploaded'.$i]['imagem']);
      $mail->addAdress($email_atual,'');
	 		$mail->enviarEmail();
      sleep(1);
	 	}
	 	Painel::alert('sucesso','Campanha enviada com sucesso!');
	 }
	?>

  <h2><i class="fa fa-pencil"></i>Enviar e-mail para lista</h2>

  <form method="post">
	 <div class="form-group">
	 	<label>Escolha a lista:</label>
	 	<select name="lista_id">
       <?php
      	  $listas =\MySql::conectar()->prepare("SELECT * FROM `tb_admin.listas_email`");
 	      $listas->execute();
 	      $listas = $listas->fetchAll();
 	      foreach ($listas as $key => $value) {
      	?>
      	<option value="<?php echo $value['id']?>"><?php echo $value['nome_lista'] ?></option>
      <?php } ?>
  </select>
    </div><!--form-group-->
    <div class="form-group">
    	<label>Assunto</label>
    	<input type="text" name="assunto">
    </div><!--form-group-->
    <div class="form-group">

    <div class="form-group">
    	<label>Texto do seu email</label>
    	<textarea class="tinymce" name="conteudo"></textarea>
    </div><!--form-group-->
    <div class="form-group">
   <input type="submit" name="acao" value="Disparar!">
    </div><!--form-group-->
</form>


</div>