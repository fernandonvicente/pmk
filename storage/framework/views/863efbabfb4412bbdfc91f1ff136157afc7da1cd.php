<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content-header'); ?>
  <section class="content-header">
      <h1>
        Usuários
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('controleinternoadmin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <?php if(!Auth::user()->consultor_id): ?>
        <li><a href="<?php echo e(url('controleinternoadmin/user/index')); ?>">Usuários</a></li>
        <?php endif; ?>
        <li class="active"><?php echo e($pagAction); ?></li>
      </ol>
    </section> 
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
  
<section class="content">

  <?php if(session()->has('message')): ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Alerta!</h4>
    <?php echo e(session()->get('message')); ?>

  </div>
  <?php endif; ?>

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e($pagAction); ?></h3>
        </div>
        <!-- /.box-header -->
        <?php if($formAction=='create'): ?>
         <form action="<?php echo e(url('controleinternoadmin/user/store')); ?>" method="post" id="form_submit" name="form_submit" autocomplete="off" enctype="multipart/form-data">
        <?php else: ?>
          <form action="<?php echo e(url('controleinternoadmin/user/update')); ?>/<?php echo e($id); ?>" method="put" id="form_submit" name="form_submit" autocomplete="off" enctype="multipart/form-data">
        <?php endif; ?>

        <?php echo e(csrf_field()); ?>


        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nome</label>
                <?php echo e(Form::text('name', $name, ['id' => 'name','class' => 'form-control','placeholder' => 'Preencha o nome', 'required' => 'required' ])); ?>

              </div>              
              <!-- /.form-group -->
              <div class="form-group ocultarUploadImagem">
                <label>Inserir Foto</label>
                <input type="file" name="inputFile" id="inputFile">                
              </div> 
              <p id="mensagem" style="color: #cc2030; margin: 5px 0;"></p>
              <div id="tabelaImagem"></div>
              <p class="ocultarUploadImagem"></p>

              <div class="form-group" id="mostraStatus">
                <?php if(Auth::user()->id == 68): ?>
                <label>Status</label>                
                <?php echo e(Form::select('status', $statuses, $checkedStatus, ['placeholder' => 'Selecione um Status',
                                     'class' => 'form-control', 'id' => 'status', 'required' => 'required'])); ?>

                <?php else: ?>
                <input type="hidden" name="status" name="status" value="<?php echo e($checkedStatus); ?>">
                <?php endif; ?>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">  
              <div class="form-group">
                <label>E-mail</label>
                <?php echo e(Form::email('email', $email, ['id' => 'email','class' => 'form-control','placeholder' => 'Preencha o e-mail', 'required' => 'required' ])); ?>

              </div> 
              <div class="form-group">
                <label>Senha</label>
                <input class="form-control" name="password" id="password" placeholder="******" type="password" <?php echo e($required_password); ?>>
              </div>
              <div class="form-group" id="mostraStatus">
               

               
               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_nivel_de_usuario')): ?>
                <label>Tipo de Usuário</label>
                <?php echo e(Form::select('role', $listRoles, $selectdRole, ['placeholder' => 'Selecione uma opção',
                                     'class' => 'form-control', 'id' => 'role', 'required' => 'required'])); ?>

              <?php else: ?>
                <input type="hidden" name="role" name="role" value="<?php echo e($selectdRole); ?>">
              <?php endif; ?>
               
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="col-xs-12">  
            <input id="totalImagens" name="totalImagens" type="hidden" value="<?php echo e($totalImage); ?>" />
            <input id="stautsImagem" name="stautsImagem" type="hidden" value="">
            <input id="nomeImagem" name="nomeImagem" type="hidden" value="<?php echo e($avatar); ?>">
            <input id="idRecord" name="idRecord" type="hidden" value="<?php echo e($id); ?>">
            
            <input id="page" name="page" type="hidden" value="<?php echo e($numberPage); ?>">     
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-fw fa-save"></i> Salvar
            </button>
          </div>
        </div>
      </div>
      <?php echo Form::close(); ?>

      <!-- /.box -->

      <!-- /.row -->
      </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<script>
$(function () {
  $(".maskCNPJ").mask("99.999.999/9999-99");

  if($('#idConsultor').val())
    $('#mostraStatus').hide();
  

});
/*-------------------------------- inicio upload da imagem --------------------------------*/
$(function(){
  var d = new Date();
  var n = d.getMilliseconds();
  new AjaxUpload($('#inputFile'), //botao que var permitir o usuário escolher o arquivo
  {
    action: '<?php echo e(url("assets/funcoes/uploadImageFull.php")); ?>', //nome do script que vai tratar a requisição enviando o arquivo
    name: 'arquivo', //nome do campo de arquivo do form que vai ser enviado, no php vai o arquivo vai ser acessado como $_FILES['arquivo']
    //esta funcao do onSubmit é chamada antes do arquivo ser enviado então é possível fazer verificações e validações.
    responseType: "json",
    onSubmit: function(arquivo, extensao){ //arquivo é o nome do arquivo e extensao sua extensao
      if (! (extensao && /^(jpg|jpeg|svg|png)$/.test(extensao))){
      //neste if acima estamos fazendo uma verificao para enviar somente imagens
      //mas o ideal é fazer esta verificação no servidor também
      alert('Somente imagem <strong>jpg|jpeg|svg|png</strong> pode ser enviada.');
      return false; //se retornar false o upload nao é feito
      }
      $('#mensagem').html("<img src='<?php echo e(url('assets/img/loading.gif')); ?>' />");
    },
    //esta funcao od onComplete é chamada depois que o upload é feito
    onComplete: function(arquivo, resposta){ //arquivo é o nome do arquivo enviado, resposta é a resposta do servidor
      //a resposta do servidor não pode ser uma string igual a "FALSE"
      $('#mensagem').html('');//limpa a div de mensagem
      //se reposta for igual a sucesso é só exibir a imagem usando o nome dela.
      resposta = resposta.replace('"', "");
      resposta = resposta.replace('"', "");
      //console.log('>>>'+resposta);

      if(resposta != "error" && resposta != "tamanho incorreto"){
       
        $('#tabelaImagem').append('<div id="tr_img'+n+'"><img src="<?php echo e(url("assets/uploadTemp/img_medium/")); ?>/'+resposta+'"></td><td width="20%"><a href="javascript:void(0);" onclick="excluirImagemTemp(this);" id="'+resposta+'|'+n+'"> <i class="fa fa-trash" title="Excluir"></i></a></div>');
        $('#nomeImagem').val(resposta);//preenchendo nome da imagem para ser enviado no post
        $('#stautsImagem').val('up');
        addTotalImagem();//gerencia quantidade de upload
        $('#inputFile').removeAttr('required');

      }else if(resposta == "tamanho incorreto"){
        $('#mensagem').html('O tamanho do arquivo é inferior a altura de 172px e largura de 172px');
      } else{
        $('#mensagem').html('Erro ao enviar ' + arquivo);
      }
    },
    //usando este parametro data você pode enivar outros valores além do arquivo para o servidor
    //neste exemplo você acessaria estes valores no PHP usando o array global $_POST
    data: {
      tipoArquivo : 'imagem',
      tamanhoImagemPequenaHorizontal : '145',
      tamanhoImagemPequenaVertical : '145',
      tamanhoImagemMediaHorizontal : '145',
      tamanhoImagemMediaVertical : '145',
      tamanhoImagemGrandeHorizontal : '145',
      tamanhoImagemGrandeVertical : '145',
    }
  });
});
/*-------------------------------- fim upload da imagem -------------------------------------------------------------*/
/*-------------------------------- inicio - verifico o total de imagem para cadastro --------------------------------*/
var totalImagem = 1;
if($("#totalImagens").val() == totalImagem){
  $(".ocultarUploadImagem").hide();
}
function totalImagem(){
  var t = $("#totalImagens").val();
  return t;
}
function addTotalImagem(){
  var t = $("#totalImagens").val();
  if(t==""){ t = 0;}
  t = parseFloat(t) + parseFloat(1);
  $("#totalImagens").val(t);
  ocultarUpload(t);
}
function deleteTotalImagem(){
  var t = $("#totalImagens").val();
  t = parseFloat(t) - parseFloat(1);
  $("#totalImagens").val(t);
  mostrarUpload(t);
  $('#inputFile').attr("required", "true");
}
$(document).ready(function(){
  var t = $("#totalImagens").val();
  ocultarUpload(t);
  if(t == 1){
    $('#inputFile').removeAttr('required');
    //carregando a imagem qdo mesma existir cadastrada
    var nomeImagem = $('#nomeImagem').val();
    var n = $('#idRecord').val();
    $('#tabelaImagem').append('<div id="tr_img'+n+'"><img src="<?php echo e(url("assets/upload/user/img_medium/")); ?>/'+nomeImagem+'"> <a href="javascript:void(0);" onclick="excluirImagem(this);" id="'+nomeImagem+'|'+n+'"> <i class="fa fa-trash" title="Excluir"></i></a></div>');
  }
});
function ocultarUpload(t){
  if(totalImagem <= t){
    $(".ocultarUploadImagem").hide();
    $('#mensagem').html('Atingido o limite de upload.');
  }
}
function mostrarUpload(t){
  if(t < totalImagem){
    $(".ocultarUploadImagem").show();
    $('#mensagem').html('');
    $('#tabelaImagem').html('');
  }
}
/*-------------------------------- fim - verifico o total de imagem para cadastro --------------------------------*/
function excluirImagemTemp(e){
  if (confirm("Tem certeza que deseja excluir a imagem?")) {
    // Colocamos os valores de cada campo em uma váriavel para facilitar a manipulação
    var conteudo = e.getAttribute("id");
    var parte = conteudo.split("|");
    var file = parte[0];
    var id = parte[1];
    var acao = "excluirImagemTemp";
    // Fazemos a requisão ajax com o arquivo envia.php e enviamos os valores de cada campo através do método POST
    $.post('<?php echo e(url("assets/funcoes/uploadGerenciamento.php")); ?>', {
      arquivo: file,
      acao: acao
    }, function(resposta) {
      $('#nomeImagem').val('');//preenchendo nome da imagem para ser enviado no post
      $('#tr_img'+id).hide();
      deleteTotalImagem();
    });
  }
}
function excluirImagem(e){
  if (confirm("Tem certeza que deseja excluir a imagem?")) {
    // Colocamos os valores de cada campo em uma váriavel para facilitar a manipulação
    var conteudo = e.getAttribute("id");
    var parte = conteudo.split("|");
    var file = '';
    var id = parte[1];
    var acao = "excluirImagem";
    // Fazemos a requisão ajax com o arquivo envia.php e enviamos os valores de cada campo através do método POST
    $.post('<?php echo e(url("assets/funcoes/uploadGerenciamento.php")); ?>', {
      arquivo: file,
      acao: acao
    }, function(resposta) {
      $('#nomeImagem').val(resposta);//preenchendo nome da imagem para ser enviado no post
      $('#tr_img'+id).hide();
      deleteTotalImagem();
      // fazendo get via ajax, para dar update null no campo image
      $.get('<?php echo e(url("/controleinternoadmin/user/updateAvatar/")); ?>/' + id, function (resposta) {
        // alert(resposta);
      });
      //
    });
  }
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\nara-sistema\laravelsete\nara-controleinterno\resources\views/admin/user/create-edit.blade.php ENDPATH**/ ?>