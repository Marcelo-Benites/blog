$(function(){
	//Aqui vai todo nosso codico de javascript.
	$('nav.mobile').click(function(){
		//O que vai acontecer quuando clicarmos na nav.mobile!
		  var listaMenu = $('nav.mobile ul');
		  //abrir atraves do fadeIn
		  /*if(listaMenu.is(':hidden') == true)
		  listaMenu.fadeIn();
		  else
		  	listaMenu.fadeOut();*/

		  /* abrir sem efeito
		    if(listaMenu.is(':hidden') == true)
		    listaMenu.show();

		  else
		  	  listaMenu.hide();
		  	ou
		  	if(listaMenu.is(':hidden') == true)
		      listaMenu.css('display','block');

		  else
		  	   listaMenu.hide();
		  	   listaMenu.css('display','block');
		  */
		  //abrir atraves do slideToggle
		  //abrir ou fechar menu
		  if(listaMenu.is(':hidden') == true){
		  	var icone = $('.botao-menu-mobile ').find('i');
		  	icone.removeClass('fa-bars');
		  	icone.addClass('fa-times');
		   listaMenu.slideToggle();
		}
		  else{	
		  	var icone = $('.botao-menu-mobile ').find('i');
		    icone.removeClass('fa-times');
		    icone.addClass('fa-bars');
		  listaMenu.slideToggle();
		}
	});

	//envento de scroll com target

	if($('target').length > 0){
      //O elemento existe,portanto dar o scroll em algum elemento
        var elemento = '#'+$('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html,body').animate({'scrollTop':divScroll},2000);
	}
	//realtime
    carregarDinamico();
	function carregarDinamico(){
		$('[realtime]').click(function(){
			var pagina = $(this).attr('realtime');
			$('.container-principal').hide();
			$('.container-principal').load(include_path+'pages/'+pagina+'.php');
			
			setTimeout(function(){
				initialize();
				addMarker(-30.040990,-51.308310,'',"Minha casa",undefined,false);

			},1000);

			$('.container-principal').fadeIn(1000);
			window.history.pushState('','',contato);

			return false;
		})
	}

})