<?php

 if(isset($_GET['excluir'])){
  $idExcluir = intval($_GET['excluir']);
    $selectImagem = MySql::conectar()->prepare("SELECT slide FROM `tb_site.slides2` WHERE id = ?");
    $selectImagem->execute(array($_GET['excluir']));

    $imagem = $selectImagem->fetch()['slide'];
    Painel::deleteFile($imagem);
    Painel::deletar('tb_site.slides2',$idExcluir);
    Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides2');
}else if(isset($_GET['order']) && isset($_GET['id'])){
  Painel::orderItem('tb_site.slides2',$_GET['order'],$_GET['id']);

}

   $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
   $porPagina = 4;
   $slides = Painel::selectAll('tb_site.slides2',($paginaAtual - 1) * $porPagina,$porPagina);
?>
<div class="box-content">
  <h2><i class="fa fa-id-card-o"></i>Slides Cadastrados</h2>
  <div class="wraper-table">
  <table>
  	<tr>
  		<td><i class="fa fa-id-card-o"></i>  Nome:</td>
      <td><i class="fa fa-id-card-o"></i>  Descricao:</td>
  		<td><i class="fa fa-id-card-o"></i>  Imagem:</td>
  		<td>Editar</td>
  		<td>Deletar</td>
      <td>#</td>
      <td>#</td>
  	</tr>
  	<?php
  	  foreach ($slides as $key => $value) {
  	?>
  	<tr>
  		<td><?php echo $value['nome']; ?></td>
        <td><?php echo $value['descricao']; ?></td>
  		<td><img style="width:50px;height:50px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['slide']?>"/></td>
  		<td><a class="btn edit" href="<?php INCLUDE_PATH_PAINEL?>editar-slide2?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i></a></td>
  		<td><a actionBtn="delete" class="btn delete1" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides2?excluir=<?php echo $value['id']?>"><i class="fa fa-times"></i></a></td>
      <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides2?order=up&id=<?php echo $value['id']?>"><i class="fa fa-angle-up"></i></a></td>
      <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides2?order=down&id=<?php echo $value['id']?>"><i class="fa fa-angle-down"></i></a></td>
  	</tr>
  <?php } ?>
  </table>
</div>

 <div class="paginacao">
		<?php
			$totalPaginas = ceil(count(Painel::selectAll('tb_site.slides2')) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="pag-selected" href="'.INCLUDE_PATH_PAINEL.'listar-slides2?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slides2?pagina='.$i.'">'.$i.'</a>';
			}

 	?>
 </div>

</div><!--box-content-->