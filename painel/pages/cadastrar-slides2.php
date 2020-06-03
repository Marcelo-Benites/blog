<?php
  verificarPermissaoPagina(2);
?>
<div class="box-content">
  <h2><i class="fa fa-pencil"></i>Cadastrar Slides</h2>

  <form method="post" enctype="multipart/form-data">

    <?php
      if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $imagem = $_FILES['imagem'];

        if($nome == ''){
          Painel::alert('erro','OCAMPO nome está vázio!');
        }else{
          //Podemos cadastrar!
           if(Painel::imagemValida($imagem) == false){
            Painel::alert('erro','O formato especificado não está correto!');
          }else{
            //Apenas cadastrar no banco de dados!
            $imagem = Painel::uploadFile($imagem);
            $arr = ['nome'=>$nome,'descricao'=>$descricao,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site.slides2'];
            Painel::insert($arr);
            Painel::alert('sucesso','O cadastro do slide  foi feito com sucesso!');
          }
        }


        
        
      }
    ?>

     <div class="form-group">
      <label>Descrição:</label>
      <textarea class="tinymce" type="text" name="descricao"></textarea>
    </div><!--form-group-->

    <div class="form-group">
      <label>Nome do Slide:</label>
      <input type="text" name="nome">
    </div><!--form-group-->



    <div class="form-group">
      <label>Imagem</label>
      <input type="file" name="imagem"/>
    </div><!--form-group-->

    <div class="form-group">
      <input type="submit" name="acao" value="Cadastrar!">
    </div><!--form-group-->

  </form>



</div><!--box-content-->