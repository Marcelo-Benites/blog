<?php

 if(isset($_GET['excluir'])){
   $idExcluir = (int)$_GET['excluir'];
   Painel::deletar('tb_site.modal',$idExcluir);
   Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-Modal');
}else if(isset($_GET['order']) && isset($_GET['id'])){
  Painel::orderItem('tb_site.modal',$_GET['order'],$_GET['id']);

}
?>
<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i>Lançamentos Modais</h2>
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
		$clientes = MySql::conectar()->prepare("SELECT * FROM `tb_site.modal` $query");
		$clientes->execute();
		$clientes = $clientes->fetchAll();
		if(isset($_POST['acao'])){
			echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.count($clientes).'</b> resultado(s)</p></div>';
		}
		foreach($clientes as $value){
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
					<p><b><i  class="fa fa-pencil"></i> Descrição:</b> <?php echo $value['descricao']; ?></p>
					<div class="group-btn">
  		                 <a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-Modal?excluir=<?php echo $value['id']?>"><i class="fa fa-times"></i></a>
						<a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-Modal?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a>
					</div><!--group-btn-->
				</div><!--body-box-->
			</div><!--box-single-->
		</div><!--box-single-wraper-->

		<?php } ?>

		<div class="clear"></div>

	</div><!--boxes-->

</div><!--box-content-->