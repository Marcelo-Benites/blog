<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,300&display=swap" rel="stylesheet">
	 <meta charset="viewport" content="width=device-width;initial-scale=1.0;maximum-scale=1.0">
	<meta name="keyworks" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrção do meu website">
	<meta charset="utf-8">
</head>
<body>
	<base base="<?php echo INCLUDE_PATH_PAINEL; ?>">
	<div class="menu">	
		<div class="menu-wraper">
		<div class="box-usuario">
			<?php
				  if($_SESSION['img'] == ''){
				?>
			<div class="avatar-usuario">
				<i class="fa fa-user"></i>
			</div><!--avatar-usuario-->
		<?php } else{?>
			<div class="imagem-usuario">
				<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>">
			</div><!--avatar-usuario-->
		<?php } ?>
			<div class="nome-usuario">
				<p><?php echo $_SESSION['nome'] ?></p>
				<p><?php echo pegacargo($_SESSION['cargo']);?></p>
			</div><!--nome-usuario-->
		</div><!--box-usuario-->
		<div class="itens-menu">
			<h2>Cadastro</h2>
			<a <?php selecionadoMenu('cadastrar-depoimento')?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar Depoimento</a>
			<a <?php selecionadoMenu('cadastrar-servico')?> <?php verificarPermissaoMenu(2); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-servico">   Cadastrar Serviços</a>
			<a <?php selecionadoMenu('cadastrar-slides')?> <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides"> Cadastrar Slides</a>
			<a <?php selecionadoMenu('cadastrar-slides2')?> <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides2">  Cadastrar Slides2</a>
			<h2  <?php verificarPermissaoMenu(2); ?> >Gestão</h2>
			<a <?php selecionadoMenu('listar-depoimentos')?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos">Listar Depoimentos</a>
			<a <?php selecionadoMenu('listar-servicos')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos">  Listar Serviços</a>
			<a <?php selecionadoMenu('listar-slides')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides">Listar Slides</a>
			<a <?php selecionadoMenu('listar-slides2')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides2">Listar Slides2</a>
			<h2>Administração do painel</h2>
			<a <?php selecionadoMenu('editar-usuario')?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuario</a>
			<a <?php selecionadoMenu('editar-depoimento')?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-depoimento">Editar Depoimento</a>
			<a <?php selecionadoMenu('editar-slide')?>  <?php verificarPermissaoMenu(2); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slide">Editar slide</a>
			<a <?php selecionadoMenu('editar-slide2')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slide2">Editar slide2</a>
			<a <?php selecionadoMenu('adicionar-usuario')?> <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usúarios</a>
			<h2  <?php verificarPermissaoMenu(2); ?> >Configuraçao Geral</h2>
			<a <?php selecionadoMenu('editar-site')?>  <?php verificarPermissaoMenu(2); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>editar-site">Editar Site</a>
			<h2  <?php verificarPermissaoMenu(2); ?> >Gestão de Notícias</h2>
			<a <?php selecionadoMenu('cadastrar-categorias')?>  <?php verificarPermissaoMenu(2); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-categorias">Cadastrar Categorias</a>
			<a <?php selecionadoMenu('gerenciar-categorias')?>   <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias">Gerenciar Categorias</a>
			<a <?php selecionadoMenu('cadastrar-noticia')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-noticia">Cadastrar Notícias</a>
			<a <?php selecionadoMenu('gerenciar-noticias')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias">Gerenciar Notícias</a>
			<h2  <?php verificarPermissaoMenu(2); ?> >Especialidades</h2>
			<a <?php selecionadoMenu('cadastrar-clientes')?>  <?php verificarPermissaoMenu(2); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-clientes">Cadastrar Especialidade</a>
			<a <?php selecionadoMenu('gerenciar-clientes')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-clientes">Gerenciar Especialidade</a>
			<a <?php selecionadoMenu('editar-cliente')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-cliente">Editar Especialidade</a>
			<h2  <?php verificarPermissaoMenu(2); ?> >Gestão de Lançamento</h2>
			<a <?php selecionadoMenu('cadastrar-lancamento')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-lancamento">Cadastrar Lançamento</a>
			<a <?php selecionadoMenu('gerenciar-lancamento')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-lancamento">Gerenciar Lançamento</a>
			<a <?php selecionadoMenu('editar-lancamento')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-lancamento">Editar Lançamento</a>
			<h2  <?php verificarPermissaoMenu(2); ?> >E-mail Marketing</h2>
			<a <?php selecionadoMenu('gerenciar-lista'); ?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-lista">Gerenciar lista</a>
			<a <?php selecionadoMenu('gerenciar-contatos'); ?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-contatos">Gerenciar Contatos</a>
			<a <?php selecionadoMenu('criar-campanha'); ?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>criar-campanha">Criar Campanha</a>
			<h2  <?php verificarPermissaoMenu(2); ?> >Gestão de Modal</h2>
			<a <?php selecionadoMenu('cadastrar-Modal')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-Modal">Cadastrar Modal</a>
			<a <?php selecionadoMenu('gerenciar-Modal')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-Modal">Gerenciar Modal</a>
			<a <?php selecionadoMenu('editar-Modal')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-Modal">Editar Modal</a>
			<h2  <?php verificarPermissaoMenu(2); ?> >Imagem Destaque</h2>
			<a <?php selecionadoMenu('cadastrar-imagem')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-imagem">Colocar Imagem</a>
			<a <?php selecionadoMenu('gerenciar-imagem')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-imagem">Gerenciar Imagem</a>
			<a <?php selecionadoMenu('editar-imagem')?>  <?php verificarPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-imagem">Editar Imagem</a>
		</div><!--item-menu-->
	</div><!--menu-wraper-->
	</div>
	<header>
		<div class="center">
			<div class="menu-btn">
				<i class="fa fa-bars"></i>
			 </div><!--botao-btn-->	
		<div class="loggout">
			<a <?php if(@$_GET['url'] == 'chat'){ ?> style="background: #1a237e; padding:23px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>chat"> <i class="fa fa-comments-o"></i> <span>Chat Online</span></a>
			<a <?php if(@$_GET['url'] == ''){?> style="background: #1a237e; padding:23px;"<?php } ?>href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fa fa-home"></i><span> Página Inicial</span></a>
			<div style="padding: 0 20px; display: inline;"></div>
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"><i class="fa fa-window-close"></i><span> Sair</span></a>

		</div><!--loggout-->	
	</div><!--center-->
	  <div class="clear"></div>
	</header>
   <div class="content">

   	<?php Painel::carregarPagina(); ?>
   	 	
   	 </div><!--box-content-->

   	 <div class="clear"></div>
   </div><!--content-->
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH ?>js/constants.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/ajax.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/lancamento.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>   
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.ajaxform.js"></script>
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   <script>
  tinymce.init({ 
  	selector:'.tinymce',
  	 plugins: "link image media",
  	 height:300
   });
   </script>
    <?php Painel::loadJS(array('ajax.js'),'gerenciar-clientes'); ?>
    <?php Painel::loadJS(array('ajax.js'),'cadastrar-clientes'); ?>
    <?php Painel::loadJS(array('ajax.js'),'editar-cliente'); ?>
    <?php Painel::loadJS(array('lancamento.js'),'gerenciar-lancamento'); ?>
    <?php Painel::loadJS(array('lancamento.js'),'cadastrar-lancamento'); ?>
    <?php Painel::loadJS(array('lancamento.js'),'editar-lancamento'); ?>
    <?php Painel::loadJS(array('chat.js'),'chat'); ?>
</body>
</html>	