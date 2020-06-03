$(function(){
	$('.ajax').ajaxForm({
		dataType:'json',
		beforeSend:function(){
			$('.ajax').animate({'opacity':'0.6'});
			$('.ajax').find('input[type=submit]').attr('disabled','true');
		},
		success: function(data){
			$('.ajax').animate({'opacity':'1'});
			$('.ajax').find('input[type=submit]').removeAttr('disabled');
			$('.box-alert').remove();
			if(data.sucesso){
				$('.ajax').prepend('<div class="box-alert sucesso"><i class="fa fa-check"></i> '+data.mensagem+'</div>');
				if($('.ajax').attr('atualizar') == undefined)
					$('.ajax')[0].reset();
			}else{
				$('.ajax').prepend('<div class="box-alert erro"><i class="fa fa-times"></i> '+data.mensagem+'</div>');
			}
			
		}
	})

	//TODO: Ficar de olho neste evento devido ao novo módulo de controle financeiro.

	$('.btn.delete').click(function(e){
		e.preventDefault();
		var item_id = $(this).attr('item_id');
		var el = $(this).parent().parent().parent().parent();
		$.ajax({
			url:include_path+'/ajax/forms2.php',
			data:{id:item_id,tipo_acao:'deletar_clientes'},
			method:'post'
		}).done(function(){
			el.fadeOut();	
		})
	})

	$('.btn.delete').click(function(e){
		e.preventDefault();
		var item_id = $(this).attr('item_id');
		var el = $(this).parent().parent().parent().parent();
		$.ajax({
			url:include_path+'/ajax/forms1.php',
			data:{id:item_id,tipo_acao:'deletar_lancamento'},
			method:'post'
		}).done(function(){
			el.fadeOut();	
		})
	})

	$('.btn.delete').click(function(e){
		e.preventDefault();
		var item_id = $(this).attr('item_id');
		var el = $(this).parent().parent().parent().parent();
		$.ajax({
			url:include_path+'/ajax/forms3.php',
			data:{id:item_id,tipo_acao:'deletar_modal'},
			method:'post'
		}).done(function(){
			el.fadeOut();	
		})
	})



	$('.btn.delete').click(function(e){
		e.preventDefault();
		var item_id = $(this).attr('item_id');
		var el = $(this).parent().parent().parent().parent();
		$.ajax({
			url:include_path+'/ajax/forms4.php',
			data:{id:item_id,tipo_acao:'deletar_imagem'},
			method:'post'
		}).done(function(){
			el.fadeOut();	
		})
	})





})