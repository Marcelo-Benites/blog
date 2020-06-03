
<?php
  include('config.php');
?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<?php
  $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
  $infoSite->execute();
  $infoSite = $infoSite->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $infoSite['titulo']?></title>
  <link rel="stylesheet" href="https://i.icomoon.io/public/temp/468731ea10/estilo/font.css">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Gugi|Share+Tech|Share+Tech+Mono&display=swap" rel="stylesheet">
	<link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon" />
  <link href="<?php echo INCLUDE_PATH; ?>estilo/jssocials.css" rel="stylesheet"/>
	<link href="<?php echo INCLUDE_PATH; ?>swiper.min.css" rel="stylesheet"/>
	<link href="<?php echo INCLUDE_PATH; ?>estilo/style2.css" rel="stylesheet"/>
	<link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet"/>
	 <meta charset="viewport" content="width=device-width;initial-scale=1.0;maximum-scale=1.0">
	<meta name="keyworks" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrção do meu website">
	<meta charset="utf-8">
</head>
<body  style="background-image: url('<?php echo INCLUDE_PATH; ?>imagens/radar.png');">
	<base base="<?php echo INCLUDE_PATH; ?>"/>
	<?php
	   $url = isset($_GET['url']) ? $_GET['url'] : 'home';
	    switch ($url) {
	    	case 'depoimentos':
	    	    echo '<target  target="depoimentos" />';
	    		break;

	    	 case 'servicos':
	    	    echo '<target  target="servicos" />';
	    		break;
	    	
	    }
	?>
	 <div class="sucesso">Formulário enviado com sucesso!</div>
	<div class="erro">Algo deu errado</div>
	<div class="overlay-loading">
		<img src="<?php echo INCLUDE_PATH ?>imagens/ajax-loader.gif">
	</div><!--overlay-loading-->
	<header>
		<div class="center">
		<div class="logo left"><a href="<?php echo INCLUDE_PATH; ?>/"><img src="<?php echo INCLUDE_PATH; ?>imagens/Sites.png"></a></div>
		<nav class="desktop right">
			<ul>
				<li><a <?php selecionadoMenu1('home')?> href="<?php echo INCLUDE_PATH; ?>home"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a <?php selecionadoMenu1('depoimentos')?> href="<?php echo INCLUDE_PATH; ?>depoimentos"> <i class="fa fa-address-book" aria-hidden="true"></i> Depoimentos</a></li>
				<li><a <?php selecionadoMenu1('servicos')?> href="<?php echo INCLUDE_PATH; ?>servicos"><i class="fa fa-cog" aria-hidden="true"></i> Serviços</a></li>
				<li><a <?php selecionadoMenu1('blog')?> href="<?php echo INCLUDE_PATH; ?>blog"><i class="fa fa-info" aria-hidden="true"></i> Blog</a></li>
				<li><a  <?php selecionadoMenu1('contato')?> realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato"><i class="fa fa-envelope" aria-hidden="true"></i> Contato</a></li>
			</ul>
		</nav>
		<div class="clear"></div>
		<nav class="mobile  right">
			<div class="botao-menu-mobile">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</div><!--batao-menu-mobile-->
			<ul>
				<li><a <?php selecionadoMenu1('home')?> href="<?php echo INCLUDE_PATH; ?>home"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a <?php selecionadoMenu1('depoimentos')?> href="<?php echo INCLUDE_PATH; ?>depoimentos"><i class="fa fa-address-book" aria-hidden="true"></i> Depoimentos</a></li>
				<li><a <?php selecionadoMenu1('servicos')?> href="<?php echo INCLUDE_PATH; ?>servicos"><i class="fa fa-cog" aria-hidden="true"></i> Serviços</a></li>
				<li><a <?php selecionadoMenu1('blog')?> href="<?php echo INCLUDE_PATH; ?>blog"><i class="fa fa-info" aria-hidden="true"></i> Blog</a></li>
				<li><a <?php selecionadoMenu1('blog')?> realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> Contato</a></li>
			</ul>
		</nav>
		<div class="clear"></div><!--clear-->
	</div><!--center-->
	</header>
	<div class="container-principal">
	<?php
	 

	  if(file_exists('pages/'.$url.'.php')){
	  	include('pages/'.$url.'.php');
	  }else{
	  	//Podemos fazer o que quizer,pois a pagina não existe
	  	if($url != 'depoimentos' && $url != 'servicos'){
	  		$urlPar = explode('/',$url)[0];
	  		if($urlPar != 'blog'){
                $pagina404 = true;
                include('pages/404.php');
	  		}else{
	  			include('pages/blog.php');
	  		}
	    }else{
	    	include('pages/home.php');
	    }
	  }
	?>
   </div><!--container-principal-->
   <footer class="one" <?php if(isset($pagina404)&& $pagina404 == true)echo 'class="fixed"'?>>
   	   <div class="center" style="display: flex;flex-wrap: wrap;">
        <div class="footer-single">
          <h2>Endereço:</h2>
           <p><i class="fa fa-home" aria-hidden="true"></i>  Rua:sapiranga<p>
            <p><i class="fa fa-home" aria-hidden="true"></i> numero:111  
            <p><i class="fa fa-home" aria-hidden="true"></i> Bairro:Capão da cruz</p>
        </div><!--footer-single-->
        <div class="footer-single">
          <h2>Telefone-Whattsapp:</h2>
          <p><i class="fa fa-phone" aria-hidden="true"></i>  (51)991640559</p>
          <p><i class="fa fa-phone" aria-hidden="true"></i>  (51)991367732</p>
        </div><!--footer-single-->
        <div class="footer-single">
          <h2>Conecte-se conosco:</h2>
          <div class="social-midia">
            <a href="https://www.facebook.com/marcelo.benites.33865"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/Marceloluisfel3"><i class="fa fa-twitter"></i></a>
            <a href="https://www.youtube.com/channel/UC8hI2Gzz-_mDQtC1ejC4EFw?view_as=subscriber"><i class="fa fa-youtube-play"></i></a>
             <a href="https://www.instagram.com/marcelobenites56/?hl=pt-br"><i class="fa fa-instagram"></i></a>
         </div>
        </div><!--footer-single-->
   	   </div><!--center-->
   </footer>
   <div class="clear"></div>
   <footer class="two">
      todos os direitos reservados!
   </footer>
    <div class="social-bar">
     <a href="https://www.facebook.com/marcelo.benites.33865" class="icon facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
     <a href="https://twitter.com/Marceloluisfel3" class="icon  twitter"  target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i>
</a> 
     <a href="https://www.youtube.com/channel/UC8hI2Gzz-_mDQtC1ejC4EFw?view_as=subscriber" class="icon  youtube"  target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a> 
     <a href="https://www.instagram.com/marcelobenites56/?hl=pt-br" class="icon  instagram"  target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>  
    </div>
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
   <?php
     if($url == 'home' || $url == ''){
   ?>
    <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
    <?php }?>
    <?php
     if(is_array($url)  && strstr($url[0],'blog') !== false){
    ?>
    <script>
      $(function(){
           $('select').change(function(){
            location.href=include_path+"blog/"+$(this).val();
           })
      })
    </script>
   <?php 
     } 
    ?>
    <?php
     if($url == 'contato'){
      ?>
 <?php } ?>
  <script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
   <script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>
   <script src="<?php echo INCLUDE_PATH; ?>js/functions.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="js/jquery-ui.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $(document).ready(function(){
    $('.draggable').draggable();
  })
  </script>
  <script src="<?php echo INCLUDE_PATH; ?>js/jssocials.min.js"></script>
    <script>
        $("#social-share").jsSocials({
            shares: ["email", "twitter", "facebook", "googleplus", "pinterest", "stumbleupon", "whatsapp"]
        });
    </script>

     <div id="modal-promacao" class="modal-container">
    <?php
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.modal`");
             $sql->execute();
             $modal = $sql->fetchAll();
             foreach ($modal as $key => $value) {
          ?> 
         <div class="modal">
      	<button  class="fechar" style="position: absolute;top: -30px;right: -30px;width: 50px;height: 50px;border-radius: 50%;color: white;background-color: red;cursor:pointer;box-shadow: 0 4px 4px 0 rgba(0,0,0,.3);font-size: 1.2em;">x</button>
      	<h2 class="substitulo"><?php echo $value['nome']?></h2>
      		<div   class="img-jogo1" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $value['imagem']?>');"></div>
      		<p><?php echo $value['descricao']?></p>
     </div>
 <?php }?>
     <script>

     	function iniciaModal(modalID){
     		if(localStorage.fechaModal !== modalID){
     		const modal = document.getElementById(modalID);
     		if(modal){
     		modal.classList.add('mostrar');
     		modal.addEventListener('click' , (e) => {
              if(e.target.id == modalID || e.target.className == 'fechar'){
                     modal.classList.remove('mostrar');
                     localStorage.fechaModal = modalID;
              }
     		});
     	   }
     	}

     }



     	const center = document.querySelector('.center');
     	center.addEventListener('click', () => iniciaModal('modal-promacao'));


     	document.addEventListener('scroll' , () => {
     		if(window.pageYOffset > 800){
     			iniciaModal('modal-promacao')
     		}
     	})
     </script>
     <script type="text/javascript" src="swiper.min.js"></script>
     <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 60,
        stretch: 0,
        depth: 100,
        modifier: 5,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>
  <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
   <script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
  <!--suporte-->
</body>
</html>