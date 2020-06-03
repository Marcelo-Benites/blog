<?php
	include('../../includeConstants.php');
	/**/
	$data['sucesso'] = true;
	$data['mensagem'] = "";

	if(Painel::logado() == false){
		die("Você não está logado!");
	}
	
	$id = $_POST['id'];

	$sql = MySql::conectar()->prepare("SELECT imagem FROM `tb_admin.clientes` WHERE id = $id");
	$sql->execute();
	$imagem = $sql->fetch()['imagem'];
	@unlink('../uploads/'.$imagem);
	MySql::conectar()->exec("DELETE FROM `tb_admin.clientes` WHERE id = $id");

?>