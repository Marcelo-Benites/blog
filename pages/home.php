<section class="banner-container">
         <?php
             $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.slides` ORDER BY order_id ASC LIMIT 3");
             $sql->execute();
             $slide = $sql->fetchAll();
             foreach ($slide as $key => $value) {
          ?> 
          <div style="background-image: url('<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $value['slide']?>');"class="banner-single"></div><!--banner-single--> 
             <?php } ?>

	<!--	<div class="overlay"></div>-->  <!--overlay-->
		<div    class="center  box-center   draggable" style="background: #082339;">
		<form   class="ajax-form" method="post">
			<h2 style="color:#ff5722;">Qual o seu melhor e-mail?</h2>
      <div class="iconev">
			<input type="email" name="email" placeholder="Digite seu E-mail" required/> <i class="fa fa-envelope" class="icone2"  aria-hidden="true"></i>
    </div>
      <input type="hidden" name="identificador" value="form_home"  />
			<input type="submit" name="acao" value="Cadastrar">
      <div class="enviar">
      <i class="fa fa-paper-plane"  aria-hidden="true"></i>
    </div>
		</form>
	</div><!--center-->
   <div class="bullets">
   </div><!--bullets-->
	</section><!--banner-principal-->

   <section class="descricao-autor">
    <div class="center" >
            <?php
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.imagem`");
                $sql->execute();
                $imagem = $sql->fetchAll();
                foreach ($imagem as $key => $value) {
          ?>
        <div class="w50 left" style="margin-bottom: 30px;">
        <h2 ><?php echo $value['nome']?></h2>
        <p><?php echo $value['descricao']?></p>
      </div><!--w50-->
      <div class="w50 left" style="margin-bottom: 30px;">
        <img class="right   eu"  src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $value['imagem']?>"style="width: 60%; height: 40%;" >
      </div><!--w50-->                                                
      <div class="clear"></div>
    <?php } ?>
    </div><!--center-->
      </section>
           <div class="clear"></div>
        </div><!--container-->
        <div class="line-titulo2">
        <div class="ln2"></div>
        <h2>Mural de Novidades</h2>
      </div>
      <div class="swiper">
      <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.slides2` ORDER BY order_id  ");
             $sql->execute();
             $slide = $sql->fetchAll();
             foreach ($slide as $key => $value) {
          ?> 
      
      <div class="swiper-slide" style="background-image:url('<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $value['slide']?>' );background-size: 100% 100%;background-repeat:no-repeat;"class="banner-single1">
      <div class="detalhes">
        <h3><?php echo $value['nome']; ?></h3>
         <p><?php echo $value['descricao']?></p>
        </div>
      </div>
      <?php } ?>
       </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
</div>

   <div class="clear"></div>


  <section class="Gamer-novidade">
       <div class="line-titulo">
        <div class="ln1"></div>
      <h2><i class="fa fa-camera" aria-hidden="true"></i>   <?php echo $infoSite['subtitulo1']?>     <i class="fa fa-camera" aria-hidden="true"></i></h2>
    </div><!--line-titulo-->
   <div class="clear"></div>

    <div class="centro">
      <?php
             $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.lancamento`");
             $sql->execute();
             $lancamentos = $sql->fetchAll();
             foreach ($lancamentos as $key => $value) {
          ?>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
       <div  style="background-image:url('<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $value['imagem']?>');" class="jogo-img"></div><!--jogo-img-->
       <div class="info-jogo  ">
        <h2  style="font-weight:bold;"><?php echo $value['nome']?></h2>
        <p style="margin-top: 5px;padding:10px;"><?php echo substr( $value['descricao'],0,200).'...'?></p>
        </div><!--info-jogo-->
     </div>
     <div class="flip-card-back">
       <div class="info-jogo  ">
        <h2  style="font-size:25px;color:#ff5722;font-weight:bold;" ><?php echo $value['nome']?></h2>
        <p><?php echo  $value['descricao']?></p>
        </div><!--info-jogo-->
      </div><!--flip-card-back-->
  </div><!--flip-card-inner-->
  </div><!--flip-card-->
  <?php } ?>
  </div><!--center-->
  </section><!--game novidade-->
  <div class="clear"></div>

      <section  class="especialidades">

      	   <div class="center">
      	   	<h2 class="title"><i class="fa fa-code" aria-hidden="true"></i>
  <?php echo $infoSite['subtitulo2']?></h2>

                <?php
                   $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.clientes`");
                   $sql->execute();
                   $especialidades = $sql->fetchAll();
                   foreach ($especialidades as $key => $value) {
          ?>
                    <div class="w33 left box-especialidade">
      	   	   	    <img  style="width: 100%; height:200px;" src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $value['imagem']?>">
      	   	   	    <h4><?php echo $value['nome']?></h4>
      	   	   	    <p><?php echo $value['descricao']?></p>
      	   	   </div><!--box-especialidade-->
                <?php } ?>
      	   	   <div class="clear"></div><!--clear-->
      	   </div><!--center-->
      </section><!--especialidades-->

   <section class="extras">

   	    <div class="center">
   	      <div id="depoimentos" class="w50 left depoimentos-container">
   	    	<h2 class="title">  <i class="fa fa-user-circle" aria-hidden="true"></i> Depoimentos dos nossos clientes</h2>
          <?php
             $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3 ");
             $sql->execute();
             $depoimentos = $sql->fetchAll();
             foreach ($depoimentos as $key => $value) {
          ?>
   	    	<div class="depoimento-single">
   	    		<p class="depoimento-descricao"><?php echo $value['depoimento']; ?></p>
   	    		<p class="nome-autor"><?php echo $value['nome']; ?> - <?php echo $value['data']; ?></p>
   	    	</div><!--depoimento-single-->
        <?php } ?>
           </div><!--w50--> 
              <div id="servicos" class="w50 left servicos-container">
            <h2 class="title"><i class="fa fa-cog" aria-hidden="true"></i> Serviços</h2>
                 <div class="servico">
                 <ul>
                  <?php
             $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.servicos` ORDER BY order_id ASC LIMIT 3 ");
             $sql->execute();
             $servicos = $sql->fetchAll();
             foreach ($servicos as $key => $value) {
                 ?>
                 	<li><?php echo $value['servicos'];?></li>
                 <?php } ?>
                 </ul>
             </div><!--servicos-->
   	    </div><!--w50-->
           <div class="clear"></div>
   	    </div><!--center-->
   </section>
   <div class="btn   draggable">
     <i style="color: white;font-size: 40px;text-align: center;margin-top: 20px;" class="fa fa-commenting-o" aria-hidden="true"></i>
   </div><!--btn-->
   <section  class="modal1   draggable">
    <button  class="fechar1" style="position: absolute;top: -30px;right: -30px;width: 50px;height: 50px;border-radius: 50%;color: white;background-color: red;cursor:pointer;box-shadow: 0 4px 4px 0 rgba(0,0,0,.3);font-size: 1.2em;">x</button>
    <div class="logo2 left   header"><img src="<?php echo INCLUDE_PATH; ?>imagens/Sites.png"></div>
  <div class="container1">
<form method="post" class="form2">
  <input type="text" name="message">
</form>
<?php
if(isset($_POST['message'])){
//Garantir que seja lido sem problemas

//Worskspace
$workspace = "e1743c5a-989b-4ad5-a29b-c962de87a7d8";
$apikey = "UDgCFayMfJf6uqITBzsrzAsc-1bSW1xwpaK379CEydB3";

$texto = $_POST['message'];

//Verifica se existe identificador
//Caso não haja, crie um
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["identificador"])){
  $identificador = $_SESSION["identificador"];
}else{
  //Você pode usar qualquer identificador
  //Você pode usar ID do usuário ou similar
  $identificador = md5(uniqid(rand(), true));
  $_SESSION["identificador"] = $identificador;
}

//URL da API
$url = "https://api.us-south.assistant.watson.cloud.ibm.com/instances/21a5ca63-37f5-4d8e-b1b6-67dab06614fa/v1/workspaces/" . $workspace;
$urlMessage = $url . "/message?version=2017-05-26";

//Dados
$dados  = "{";
$dados .= "\"input\": ";
$dados .= "{\"text\": \"" . $texto . "\"},";
$dados .= "\"context\": {\"conversation_id\": \"" . $identificador . "\",";
$dados .= "\"system\": {\"dialog_stack\":[{\"dialog_node\":\"root\"}], \"dialog_turn_counter\": 1, \"dialog_request_counter\": 1}}";
$dados .= "}";

//Cabeçalho que leva tipo de Dados
$headers = array('Content-Type:application/json');

//Iniciando Comunicação cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlMessage);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_USERPWD, "apikey:$apikey");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//Executar
$retorno = curl_exec($ch);
//Fechar Conexão
curl_close($ch);

//Imprimir com leitura fácil para humanos
$retorno = json_decode($retorno);


echo $retorno->output->text['0'];

}
?>
</div>
<div class="info">
   <p>Aperte Enter ou Clique no mouse para conversar com o robo</p>
 </div>
   </section>
   <div class="clear"></div>


     