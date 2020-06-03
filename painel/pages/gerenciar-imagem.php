<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i>Imagens Cadastradas</h2>
	<div class="busca">
		<h4><i class="fa fa-search"></i> Realizar uma busca</h4>
		<form method="post">
			<input placeholder="Procure por: nome ou Descrição" type="text" name="busca">
			<input type="submit" name="acao" value="Buscar!">
		</form>
	</div><!--busca-->
	<div class="boxes">
	<?php
		$query = "";
		if(isset($_POST['acao'])){
			$busca = $_POST['busca'];
			$query = " WHERE nome LIKE '%$busca%' OR nome LIKE '%$busca%' OR descricao LIKE '%$busca%'";
		}
		$imagens = MySql::conectar()->prepare("SELECT * FROM `tb_site.imagem` $query");
		$imagens->execute();
		$imagens = $imagens->fetchAll();
		if(isset($_POST['acao'])){
			echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.count($imagens).'</b> resultado(s)</p></div>';
		}
		foreach($imagens as $value){
	?>
		<div class="box-single-wraper">
			<div class="box-single">
				<div class="topo-box">
					<?php
						if($value['imagem'] == ''){
					?>
					<h2><i class="fa fa-user"></i></h2>
					<?php }else{ ?>
						<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem']; ?>" />
					<?php } ?>
				</div><!--topo-box-->
				<div class="body-box">
					<p><b><i class="fa fa-pencil"></i> Nome:</b> <?php echo $value['nome']; ?></p>
					<p><b><i class="fa fa-pencil"></i> Descrição:</b> <?php echo $value['descricao']; ?></p>
					<div class="group-btn">
  		                <a class="btn delete" item_id="<?php echo $value['id']; ?>" href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fa fa-times"></i> Excluir</a>
						<a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-imagem?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a>
					</div><!--group-btn-->
				</div><!--body-box-->
			</div><!--box-single-->
		</div><!--box-single-wraper-->

		<?php } ?>

		<div class="clear"></div>

	</div><!--boxes-->

</div><!--box-content-->