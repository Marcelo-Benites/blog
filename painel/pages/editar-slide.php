<?php
  if(isset($_GET['id'])){
     $id = (int)$_GET['id'];
     $slide = Painel::select( 'tb_site.slides','id = ?',array($id));
  }else{
    Painel::alert('erro','Você precisa passar o parametro ID.');
    die();
  }
?>
<div class="box-content">
     <h2><i class="fa fa-pencil"></i> Editar Slide</h2>	
     <form  method="post" enctype="multipart/form-data">

     <?php 
      if(isset($_POST['acao'])){
      	//enviei o meu formulario

       $nome = $_POST['nome'];
       $imagem = $_FILES['imagem'];
       $imagem_atual = $_POST['imagem_atual'];
       if($imagem['name'] != ''){
         //existe o upload de imagem
       	if(Painel::imagemValida($imagem)){
          Painel::deleteFile($imagem_atual);
             $imagem = Painel::uploadFile($imagem);
             $imagem = Painel::uploadFile($imagem);
            $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slides'];
            Painel::update($arr);
            $slide = Painel::select( 'tb_site.slides','id = ?',array($id));
            Painel::alert('sucesso','o Slide foi editado junto com a imagem');
       	}else{
       		Painel::alert('erro','o formato nao e valido a imagem');
       	}
       }else{
       	$imagem = $imagem_atual;
        $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slides'];
        Painel::update($arr); 
        $slide = Painel::select( 'tb_site.slides','id = ?',array($id));
        Painel::alert('sucesso','o Slide foi editado com sucesso!!!'); 
       }
      }

     ?>

     	<div class="form-group">
     		<label>Nome: </label>
     		<input type="text" name="nome" required value="<?php echo $slide['nome']; ?>">
     	</div>

     	<div class="form-group">
     		<label>Imagem</label>
     		<input type="file" name="imagem"/>
     		<input type="hidden" name="imagem_atual" value="<?php echo $slide['slide']; ?>">
     	</div>
     	<div class="form-group">
     		<input type="submit" name="acao" value="Atualizar!">
     	</div>
     </form>
</div>