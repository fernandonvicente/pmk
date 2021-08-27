jQuery(document).ready(function(){

	var urlJs = $('#urlJs').val();//recuperando a url, para ser usada via ajax
	var urlAdmin = '/pmkadmin/';

	if($('#idRecord').val()){
		$('.sem_cad_cliente').hide();
	}else{
		$('.com_cad_cliente').hide();
	}
	
	$("#formDoador").submit(function( event ) {


			if(!$('#status_bt').val()){

				$('#status_bt').val(1);

				$('.btn-success').html('<i class="fa fa-refresh fa-spin"></i> Enviando...');

        var form=$("#formDoador");//form devido post das imagens, tem q colocar token no form do input

				var urlJason;
				var cliente_id = '';
				if($('#idRecord').val())
					cliente_id = $('#idRecord').val();

				//----------------------------------------------------------------------------------------------------

				if($('#idRecord').val() > 0){
					urlJason = urlJs+urlAdmin+'doador/edit/'+cliente_id;
				}else{
					urlJason = urlJs+urlAdmin+'doador/store';
				}

				//console.log(urlJason);
				//return false;
        //----------------------------------------------
        

				$.ajax({
					url: urlJason,
          type: "post",
          dataType: 'json',
          data:form.serialize(),
					success: function(results){

						if(results.success){

							if(cliente_id > 0){
								$('.btn-success').html('<i class="fa fa-fw fa-save"></i> Salvar');

								alertSuccess('Sucesso no processo de alteração do cadastro.');

								$('#alert-msg').show();

								var body = $("html, body");
								body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
								   //alert("Finished animating");
								});

								var novaURL = urlJs+urlAdmin+'doador/edit/'+cliente_id;
								$(window.document.location).attr('href', novaURL);


							}else if(cliente_id == 0){
								$('.btn-success').html('<i class="fa fa-fw fa-save"></i> Salvar');

								alertSuccess('Sucesso no processo de cadastro.');

								$('#alert-msg').show(); 

								var body = $("html, body");
								body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
								   //alert("Finished animating");
								});

								$('#idRecord').val(results.result);

								$('.sem_cad_cliente').hide();

								$('.com_cad_cliente').show();

								var novaURL = urlJs+urlAdmin+'doador/edit/'+results.result;
								$(window.document.location).attr('href', novaURL);
							}
				          
				          
				        }else{
				          $('#status_bt').val('');

				          $('.btn-success').html('<i class="fa fa-fw fa-save"></i> Salvar');
				         
				          alertError('Erro na processo de cadastrar ou alterar cliente.');

				          $('#alert-msg').show();

				          var 	body = $("html, body");
								body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
								   //alert("Finished animating");
								});

				          return false;
				        }

					},
					error:function(){
						$('#status_bt').val('');

						$('.btn-success').html('<i class="fa fa-fw fa-save"></i> Salvar');				         
				        alertError('Erro ao salvar cliente.');
					}

				})
			}

	});

  

	$(".btn-success-add-informacao").click(function( event ) {

    $('.btn-success-informacao').show();
    $('#idInformacao').val('');
    $('.clearInput').val('');

  });


  $(".btn-success-add-senha").click(function( event ) {

    $('.btn-success-senha').show();
    $('#idSenha').val('');
    $('.clearInput').val('');

  });

  $("#formClienteInformacao").submit(function( event ) {

      var form=$("#formClienteInformacao");

      if(!$('#status_bt_informcao').val()){

        $('#status_bt_informcao').val(1);

        $('.btn-success-informcao').html('<i class="fa fa-refresh fa-spin"></i> Enviando...');

        var urlJason;
        var cliente_id = '';
        if($('#idRecordCliInformacao').val())
          cliente_id = $('#idRecordCliInformacao').val();

        //----------------------------------------------------------------------------------------------------

        urlJason = urlJs+urlAdmin+'cliente/salvarInformacao';   
        
        $.ajax({
          url: urlJason,
          type: "post",
          dataType: 'json',
          data:form.serialize(),
          success: function(results){

            if(results.success){

                if(cliente_id > 0){
                  $('.btn-success-informacao').html('<i class="fa fa-fw fa-save"></i> Salvar');

                  alertSuccess('Sucesso no processo de alteração do cadastro.','informacao');

                  $('#alert-msg-informacao').show();

                  var body = $("html, body");
                  body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
                     //alert("Finished animating");
                  });

                  var novaURL = urlJs+urlAdmin+'cliente/edit/'+cliente_id+'/informacao';
                  $(window.document.location).attr('href', novaURL);


                }
                  
                  
            }else{
              $('#status_bt_informacao').val('');
              console.log('xxxx');

              $('.btn-success-informacao').html('<i class="fa fa-fw fa-save"></i> Salvar');
             
              alertError('Erro na processo de atualizar aba informação.','informacao');

               $('#alert-msg-informacao').show();

                var body = $("html, body");
                body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
                   //alert("Finished animating");
                });

              return false;
            }

          },
          error:function(){
            $('#status_bt_informacao').val('');

            $('.btn-success-informacao').html('<i class="fa fa-fw fa-save"></i> Salvar');                
                alertError('Erro ao enviar aba informação.','informacao');
          }

        })
      }

  });


$("#formClienteSenha").submit(function( event ) {

      var form=$("#formClienteSenha");

      if(!$('#status_bt_senha').val()){

        $('#status_bt_senha').val(1);

        $('.btn-success-senha').html('<i class="fa fa-refresh fa-spin"></i> Enviando...');

        var urlJason;
        var cliente_id = '';
        if($('#idRecordCliSenha').val())
          cliente_id = $('#idRecordCliSenha').val();

        //----------------------------------------------------------------------------------------------------

        urlJason = urlJs+urlAdmin+'cliente/salvarSenha';   
        
        $.ajax({
          url: urlJason,
          type: "post",
          dataType: 'json',
          data:form.serialize(),
          success: function(results){

            if(results.success){

                if(cliente_id > 0){
                  $('.btn-success-senha').html('<i class="fa fa-fw fa-save"></i> Salvar');

                  alertSuccess('Sucesso no processo de alteração do cadastro.','senha');

                  $('#alert-msg-senha').show();

                  var body = $("html, body");
                  body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
                     //alert("Finished animating");
                  });

                  var novaURL = urlJs+urlAdmin+'cliente/edit/'+cliente_id+'/senha';
                  $(window.document.location).attr('href', novaURL);


                }
                  
                  
            }else{
              $('#status_bt_senha').val('');
              console.log('xxxx');

              $('.btn-success-senha').html('<i class="fa fa-fw fa-save"></i> Salvar');
             
              alertError('Erro na processo de atualizar aba senha.','senha');

               $('#alert-msg-senha').show();

                var body = $("html, body");
                body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
                   //alert("Finished animating");
                });

              return false;
            }

          },
          error:function(){
            $('#status_bt_senha').val('');

            $('.btn-success-senha').html('<i class="fa fa-fw fa-save"></i> Salvar');                
                alertError('Erro ao enviar aba senha.','senha');
          }

        })
      }

  });




//------------------------
});


  function alertError(msg,aba = null){

      var div = '<div class="alert alert-danger alert-dismissible">';
                div += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                div += '<h4><i class="icon fa fa-ban"></i> Alerta!</h4>';
                div += msg;
              div += '</div>';

            if(!aba)
              $('#alert-msg').html(div);
            else
              $('#alert-msg-'+aba).html(div);

            return true;
  }

  function alertSuccess(msg,aba){

      var div = '<div class="alert alert-success alert-dismissible">';
                div += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                div += '<h4><i class="icon fa fa-check"></i> Alerta!</h4>';
                div += msg;
              div += '</div>';

            if(!aba)
              $('#alert-msg').html(div);
            else
              $('#alert-msg-'+aba).html(div);

            return true;
  }

//------------------------



	function excluirRegistro(idRegistro){
      if (confirm("Tem certeza que deseja excluir o registro?")) {

        var urlJs = $('#urlJs').val();//recuperando a url, para ser usada via ajax
        var urlAdmin = '/pmkadmin/';

        var urlJsonGet = urlJs+urlAdmin+'cliente/delete/'+idRegistro;

        $.get(urlJsonGet, function (results) {
                  var objetos = results;

                  if(results.success){
                    alert('Exclusão realizada com sucesso!');
                    var novaURL = urlJs+urlAdmin+"cliente/index";
                    $(window.document.location).attr('href', novaURL);
                  }else{
                    alert(results.result);
                    return false;
                  }
        
        });
        
      }
  }

  function excluirInformacao(idRegistro){
      if (confirm("Tem certeza que deseja excluir o registro?")) {

        var urlJs = $('#urlJs').val();//recuperando a url, para ser usada via ajax
        var urlAdmin = '/pmkadmin/';

        var urlJsonGet = urlJs+urlAdmin+'cliente/informacao/delete/'+idRegistro;

        $.get(urlJsonGet, function (results) {
                  var objetos = results;

                  if(results.success){
                    alert('Exclusão realizada com sucesso!');
                    var novaURL = urlJs+urlAdmin+"cliente/edit/"+results.result+"/informacao";
                    $(window.document.location).attr('href', novaURL);
                    //location.reload();
                  }else{
                    alert(results.result);
                    return false;
                  }
        
        });
        
      }
  }

  function editarInformacao(idRegistro){

    var urlJs = $('#urlJs').val();//recuperando a url, para ser usada via ajax
        var urlAdmin = '/pmkadmin/';

        var urlJsonGet = urlJs+urlAdmin+'cliente/informacao/show/'+idRegistro;

        $.get(urlJsonGet, function (results) {
                  var objetos = results;

                  if(results.success){
                    $('#idRecordCliInformacao').val(results.result.cliente_id);
                    $('#idInformacao').val(results.result.informacao_id);
                    $('#tipo_id').val(results.result.tipo_id);
                    $('#localizacao').val(results.result.localizacao);
                    $('#senha_id').val(results.result.senha_id);
                    $('#senha').val(results.result.senha);
                    $('#informacao').val(results.result.informacao);
                    $('#data_cadastro_informacao').val(results.result.data_informacao);
                    $('#user_id').val(results.result.user_id);
                    $('#user_nome').val(results.result.user_nome);
                    $('#tipo_id').focus();
                    $('.btn-success-informacao').show();
                   
                  }else{
                    alert(results.result);
                    return false;
                  }
        
        });

  }

  function excluirArquivo(id){
      if (confirm("Tem certeza que deseja excluir o arquivo?")) {

        var urlJs = $('#urlJs').val();//recuperando a url, para ser usada via ajax
        var urlAdmin = '/pmkadmin/';

        var urlJsonGet = urlJs+urlAdmin+'cliente/delete/arquivo/'+id;

        $.get(urlJsonGet, function (results) {
                  var objetos = results;

                  if(results.success){
                    alert('Exclusão realizada com sucesso!');
                    var novaURL = urlJs+urlAdmin+"cliente/index";
                    $(window.document.location).attr('href', novaURL);
                  }else{
                    alert(results.result);
                    return false;
                  }
        
        });
        
      }
  }

  function editarInformacaoVer(idRegistro){

    var urlJs = $('#urlJs').val();//recuperando a url, para ser usada via ajax
        var urlAdmin = '/pmkadmin/';

        var urlJsonGet = urlJs+urlAdmin+'cliente/informacao/show/'+idRegistro;

        $.get(urlJsonGet, function (results) {
                  var objetos = results;

                  if(results.success){
                    $('#idRecordCliInformacao').val(results.result.cliente_id);
                    $('#idInformacao').val(results.result.informacao_id);
                    $('#tipo_id').val(results.result.tipo_id);
                    $('#localizacao').val(results.result.localizacao);
                    $('#senha_id').val(results.result.senha_id);
                    $('#senha').val(results.result.senha);
                    $('#informacao').val(results.result.informacao);
                    $('#data_cadastro_informacao').val(results.result.data_informacao);
                    $('#user_id').val(results.result.user_id);
                    $('#user_nome').val(results.result.user_nome);
                    $('#tipo_id').focus();

                    if(!results.result.editar_cliente){
                      $('.btn-success-informacao').hide();
                    }
                   
                  }else{
                    alert(results.result);
                    return false;
                  }
        
        });

  }

  function editarSenha(idRegistro){

    var urlJs = $('#urlJs').val();//recuperando a url, para ser usada via ajax
        var urlAdmin = '/pmkadmin/';

        var urlJsonGet = urlJs+urlAdmin+'cliente/senha/show/'+idRegistro;

        $.get(urlJsonGet, function (results) {
                  var objetos = results;

                  if(results.success){
                    $('#idRecordCliSenha').val(results.result.cliente_id);
                    $('#idSenha').val(results.result.senha_id);
                    $('#password_senha').val(results.result.senha);
                    $('#descricao_senha').val(results.result.descricao_senha);
                    $('#user_senha').val(results.result.user);
                    $('#tipo_id_senha').val(results.result.tipo_id);
                    $('#data_cadastro_senha').val(results.result.data_senha);
                    $('#user_id_senha').val(results.result.user_id);
                    $('#user_nome_senha').val(results.result.user_nome);
                    $('#tipo_id_senha').focus();
                    $('.btn-success-senha').show();
                   
                  }else{
                    alert(results.result);
                    return false;
                  }
        
        });

  }

  function editarSenhaVer(idRegistro){

    var urlJs = $('#urlJs').val();//recuperando a url, para ser usada via ajax
        var urlAdmin = '/pmkadmin/';

        var urlJsonGet = urlJs+urlAdmin+'cliente/senha/show/'+idRegistro;

        $.get(urlJsonGet, function (results) {
                  var objetos = results;

                  if(results.success){
                    $('#idRecordCliSenha').val(results.result.cliente_id);
                    $('#idSenha').val(results.result.senha_id);
                    $('#password_senha').val(results.result.senha);
                    $('#descricao_senha').val(results.result.descricao_senha);
                    $('#user_senha').val(results.result.user);
                    $('#tipo_id_senha').val(results.result.tipo_id);
                    $('#data_cadastro_senha').val(results.result.data_senha);
                    $('#user_id_senha').val(results.result.user_id);
                    $('#user_nome_senha').val(results.result.user_nome);
                    $('#tipo_id_senha').focus();
                    $('.btn-success-senha').show();

                    if(!results.result.editar_cliente){
                      $('.btn-success-senha').hide();
                    }
                   
                  }else{
                    alert(results.result);
                    return false;
                  }
        
        });

  }

  function excluirSenha(idRegistro){
      if (confirm("Tem certeza que deseja excluir o registro?")) {

        var urlJs = $('#urlJs').val();//recuperando a url, para ser usada via ajax
        var urlAdmin = '/pmkadmin/';

        var urlJsonGet = urlJs+urlAdmin+'cliente/senha/delete/'+idRegistro;

        $.get(urlJsonGet, function (results) {
                  var objetos = results;

                  if(results.success){
                    alert('Exclusão realizada com sucesso!');
                    var novaURL = urlJs+urlAdmin+"cliente/edit/"+results.result+"/senha";
                    $(window.document.location).attr('href', novaURL);
                    //location.reload();
                  }else{
                    alert(results.result);
                    return false;
                  }
        
        });
        
      }
  }
