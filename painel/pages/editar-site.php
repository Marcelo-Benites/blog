<?php
 $site =  Painel::select( 'tb_site.config',false);
?>
<div class="box-content">
  <h2><i class="fa fa-pencil"></i>Editar Configurações do Site</h2>

  <form method="post" enctype="multipart/form-data">

    <?php
      if(isset($_POST['acao'])){
        if(Painel::update($_POST,true)){
        Painel::alert('sucesso','O Site foi editado com sucesso!');
       $site = Painel::select( 'tb_site.config',false);
       }else{
         Painel::alert('erro','Campos vazios não são permitidos!');
       }
                
      }
    ?>

    <div class="form-group">
      <label>Logo:</label>
      <input type="file" name="logo" value="<?php echo $site['logo'] ?>">
    </div><!--form-group-->

    <div class="form-group">
      <label>Titulo:</label>
      <input type="text" name="titulo" value="<?php echo $site['titulo'] ?>">
    </div><!--form-group-->

     <div class="form-group">
      <label>Nome do autor do Site:</label>
      <input type="text" name="nome_autor" value="<?php echo $site['nome_autor'] ?>">
    </div><!--form-group-->

     <div class="form-group">
      <label>Imagem:</label>
      <input type="file" name="imagem" value="<?php echo $site['imagem'] ?>">
    </div><!--form-group-->

    <div class="form-group">
      <label>Descrição do autor do site:</label>
      <textarea name="descricao"><?php echo $site['descricao']; ?></textarea>
    </div><!--form-group-->

    <div class="form-group">
      <label>Nome Substitulos:</label>
      <input type="text" name="subtitulo1" value="<?php echo $site['subtitulo1'] ?>">
    </div><!--form-group-->


    <div class="form-group">
      <label>Nome Substitulo2:</label>
      <input type="text" name="subtitulo2" value="<?php echo $site['subtitulo2'] ?>">
    </div><!--form-group-->

  
    <div class="form-group"> 
    <input type="hidden" name="nome_tabela" value="tb_site.config" />
   <input type="submit" name="acao" value="atualizar!">
    </div><!--form-group-->

  </form>



</div><!--box-content-->