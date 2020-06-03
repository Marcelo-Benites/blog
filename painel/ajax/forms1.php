<?php
	include('../../includeConstants.php');
	/**/
	$data['sucesso'] = true;
	$data['mensagem'] = "";

	if(Painel::logado() == false){
		die("Você não está logado!");
	}
	
	/*Nosso código começa aqui!*/
	if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'cadastrar_lancamento'){
	sleep(2);
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$imagem = "";
	if($nome == "" || $descricao == ""){
		$data['sucesso'] = false;
		$data['mensagem'] = "Atenção: Campos vázios não são permitidos!";
	}
	if(isset($_FILES['imagem'])){
		if(Painel::imagemValida($_FILES['imagem'])){
			$imagem = $_FILES['imagem'];
		}else{
			$imagem = "";
			$data['sucesso'] = false;
			$data['mensagem'] = "Você está tentando realizar um upload com imagem inválida.";
		}
	}

	if($data['sucesso']){
		if(is_array($imagem))
			$imagem = Painel::uploadFile($imagem);
		$sql = MySql::conectar()->prepare("INSERT INTO `tb_site.lancamento` VALUES (null,?,?,?)");
		$sql->execute(array($nome,$descricao,$imagem));
		//tudo okay, só cadastrar
		$data['mensagem'] = "O cliente foi cadastrado com sucesso!";
	}

	}else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'editar_lancamento'){
		sleep(2);
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$imagem = $_POST['imagem_original'];

		if($nome == '' || $descricao == ''){
			$data['sucesso'] = false;
			$data['mensagem'] = "Campos vázios não são permitidos!";
		}

		if(isset($_FILES['imagem'])){
				if(Painel::imagemValida($_FILES['imagem'])){
					@unlink('../uploads/'.$imagem);
					$imagem = $_FILES['imagem'];
				}else{
					$data['sucesso'] = false;
					$data['mensagem'] = "Você está tentando realizar um upload com imagem inválida.";
				}
		}

		if($data['sucesso']){
			if(is_array($imagem)){
				$imagem = Painel::uploadFile($imagem);
			}

			$sql = MySql::conectar()->prepare("UPDATE `tb_site.lancamento` SET nome = ? ,descricao = ? ,imagem = ?  WHERE id = $id");
			$sql->execute(array($nome,$descricao,$imagem));

			$data['mensagem'] = "O cliente foi atualizado com sucesso!";
		}

	}else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'deletar_lancamento'){
		$id = $_POST['id'];

		$sql = MySql::conectar()->prepare("SELECT imagem FROM `tb_site.lancamento` WHERE id = $id");
		$sql->execute();
		$imagem = $sql->fetch()['imagem'];
		@unlink('../uploads/'.$imagem);
		MySql::conectar()->exec("DELETE FROM `tb_site.lancamento` WHERE id = $id");
	}else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao']){
		$ids = $_POST['item'];
		$i = 1;
		foreach ($ids as $key => $value) {
			MySql::conectar()->exec("UPDATE `tb_site.lancamento` SET order_id = $i WHERE id = $value");
			$i++;
		}
	}

	die(json_encode($data));



?>