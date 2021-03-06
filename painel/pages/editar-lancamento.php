<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$lancamento = Painel::select('tb_site.lancamento','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar lancamento</h2>

	<form class="ajax" atualizar method="post" action="<?php echo INCLUDE_PATH_PAINEL ?>ajax/forms1.php" enctype="multipart/form-data">

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php echo $lancamento['nome']; ?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Descrição:</label>
			<textarea class="tinymce" type="text" name="descricao" value="<?php echo $lancamento['descricao']; ?>"></textarea>
		</div><!--form-group-->	
		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="imagem_original" value="<?php echo $lancamento['imagem']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="tipo_acao" value="editar_lancamento">
		</div>

		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $lancamento['id']; ?>">
		</div>

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>


</div><!--box-content-->