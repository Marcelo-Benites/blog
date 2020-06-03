<?php
  verificarPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadatrar Lançamentos</h2>

	<form class="ajax" action="<?php echo INCLUDE_PATH_PAINEL ?>ajax/forms1.php" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->

		 <div class="form-group">
      <label>Descrição:</label>
      <textarea class="tinymce" name ="descricao"> </textarea>
    </div><!--form-group-->
		
		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
		</div><!--form-group-->
		<div class="form-group">
			<input type="hidden" name="tipo_acao" value="cadastrar_lancamento">
		</div>
		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->