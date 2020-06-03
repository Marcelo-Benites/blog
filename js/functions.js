 $(function(){

     abrirJanela();
     verificarCliqueFechar();

     function abrirJanela(){
     	$('.btn').click(function(){
     		$('.modal1').fadeIn();
     	});
     }

     function verificarCliqueFechar(){
        
        var el = $('.fechar1');

        el.click(function(){
        	$('.modal1').fadeOut();
        })

     }

     

});

 
