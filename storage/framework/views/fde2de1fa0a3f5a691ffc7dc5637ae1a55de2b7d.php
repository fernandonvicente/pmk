<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content-header'); ?>
<section class="content-header">
  <h1>
    <?php echo e($title); ?>

    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(url('/controleinternoadmin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?php echo e(url('/controleinternoadmin/cliente/index')); ?>"><?php echo e($title); ?></a></li>
    <li class="active"><?php echo e($pagAction); ?></li>
  </ol>
</section> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content">

  <?php if(session()->has('message')): ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Alerta!</h4>
    <?php echo e(session()->get('message')); ?>

  </div>
  <?php endif; ?>

  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">

      </h3>
    </div>
    <!-- /.box-header -->        

    <div class="box-body">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="<?php echo e($tab_cliente_cadastro); ?>"><a href="#cliente_cadastro" data-toggle="tab">Cadastro</a></li>
            <li class="<?php echo e($tab_cliente_inf_cli); ?>"><a href="#cliente_inf_cli" data-toggle="tab">Informações do cliente</a></li>
            <li class="<?php echo e($tab_cliente_senha_cli); ?>"><a href="#cliente_senha_cli" data-toggle="tab">Senhas do cliente</a></li>
          </ul>
          <div class="tab-content">
            <div class="<?php echo e($tab_cliente_cadastro); ?> tab-pane" id="cliente_cadastro">

              <form action="javascript:void(0);" name="formCliente" id="formCliente" method="post"> 
                <?php echo e(csrf_field()); ?>


                <div id="alert-msg"></div><!-- alert-msg, recebe a mensagem da ação de cadastro  -->

                <div class="row">

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>* Nome/Razão Social</label>
                      <?php echo e(Form::text('nome', $nome, ['id' => 'nome','class' => 'form-control','placeholder' => 'Nome/Razão Social', 'required' => 'required', 'tabindex' => '1' ])); ?>

                    </div>              
                  </div>     

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>* Login</label>
                      <?php echo e(Form::text('login', $login, ['id' => 'login','class' => 'form-control','placeholder' => 'Login', 'required' => 'required', 'tabindex' => '2' ])); ?>

                    </div>              
                  </div>                  

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Documento (CPF/CNPJ)</label>
                      <?php echo e(Form::text('cpfcnpj', $documento, ['id' => 'cpfcnpj','class' => 'form-control','placeholder' => 'Preencha o documento', 'tabindex' => '3' ])); ?>

                    </div>               
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>* Status</label>
                      <?php echo e(Form::select('cliente_status_id', $cliente_status, $checkedClienteStatus, ['placeholder' => 'Selecione um estado',
                      'class' => 'form-control', 'id' => 'cliente_status_id', 'required' => 'required', 'tabindex' => '4'])); ?>

                    </div>              
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>CEP</label>
                      <?php echo e(Form::text('cep', $cep, ['id' => 'cep','class' => 'form-control cep buscaDadosCep','placeholder' => 'Preencha o CEP', 'tabindex' => '5' ])); ?>                   
                    </div>               
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Endereço</label>
                      <?php echo e(Form::text('endereco', $endereco, ['id' => 'endereco','class' => 'form-control','placeholder' => 'Preencha o endereço', 'tabindex' => '6' ])); ?>

                    </div>              
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nº</label>
                      <?php echo e(Form::text('num', $num, ['id' => 'num','class' => 'form-control','placeholder' => 'Preencha o nº', 'tabindex' => '7' ])); ?>

                    </div>  
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Complemento</label>
                      <?php echo e(Form::text('complemento', $complemento, ['id' => 'complemento','class' => 'form-control','placeholder' => 'Preencha o complemento', 'tabindex' => '8' ])); ?>

                    </div> 
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Bairro</label>
                      <?php echo e(Form::text('bairro', $bairro, ['id' => 'bairro','class' => 'form-control','placeholder' => 'Preencha o bairro', 'tabindex' => '9' ])); ?>

                    </div>              
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Estado</label>
                      <?php echo e(Form::select('state', $states, $checkedState, ['placeholder' => 'Selecione um estado',
                      'class' => 'form-control', 'id' => 'state', 'tabindex' => '10'])); ?>

                    </div>              
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Cidade</label>
                      <?php echo e(Form::select('city', $cities, $checkedCity, ['placeholder' => 'Primeiro selecione o Estado',
                      'class' => 'form-control', 'id' => 'city', 'tabindex' => '11'])); ?>

                    </div>              
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>E-mail</label>
                      <?php echo e(Form::text('email', $email, ['id' => 'email','class' => 'form-control','placeholder' => 'fulano@dominio.com.br',  'tabindex' => '12' ])); ?>

                    </div>              
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Telefone</label>
                      <?php echo e(Form::text('telefone', $telefone, ['id' => 'telefone','class' => 'form-control telx','placeholder' => '(XX) XXXX-XXXX', 'tabindex' => '13' ])); ?>

                    </div>              
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Celular</label>
                      <?php echo e(Form::text('celular', $celular, ['id' => 'celular','class' => 'form-control celx','placeholder' => '(XX) XXXXX-XXXX', 'required' => 'required', 'tabindex' => '14' ])); ?>

                    </div>             
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Celular1</label>
                      <?php echo e(Form::text('celular1', $celular1, ['id' => 'celular1','class' => 'form-control celx','placeholder' => '(XX) XXXXX-XXXX', 'tabindex' => '15' ])); ?>

                    </div>             
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Data Cadastro</label>
                      <?php echo e(Form::text('data_cadastro', $data_cadastro, ['id' => 'data_cadastro','class' => 'form-control','placeholder' => '00/00/0000 00:00:00', 'readonly' => 'readonly' ])); ?>

                    </div>              
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">

                    </div>              
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">

                    </div>             
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">

                    </div>             
                  </div>

                </div>

                

                <div class="box-footer">

                  <div class="col-xs-12">    

                    <input id="idRecord" name="idRecord" type="hidden" value="<?php echo e($cliente_id); ?>">
                    <input id="status_bt" name="status_bt" type="hidden" value="">
                    <button type="submit" class="btn btn-success pull-right" tabindex="16"><i class="fa fa-fw fa-save"></i> Salvar
                    </button>
                  </div>
                  
                </div>

              </form>

            </div>

            <!-- /.tab-pane -->
            <div class="<?php echo e($tab_cliente_inf_cli); ?> tab-pane" id="cliente_inf_cli">
              <div class="alert alert-warning alert-dismissible sem_cad_cliente">
                <h4><i class="icon fa fa-warning"></i> Aréa Indisponível!</h4>
                <p>Por favor, informe os dados do cadastro e salve!</p>
              </div>
              <span class="com_cad_cliente">

                <form action="javascript:void(0);" name="formClienteInformacao" id="formClienteInformacao" method="post"> 
                  <?php echo e(csrf_field()); ?>


                  <div id="alert-msg-informacao"></div><!-- alert-msg, recebe a mensagem da ação de cadastro  -->


                  <div class="row">   

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>* Tipo</label>
                        <?php echo e(Form::select('tipo_id', $cliente_tipo, $checkedClienteTipo, ['placeholder' => 'Selecione uma opção',
                        'class' => 'form-control clearInput', 'id' => 'tipo_id', 'required' => 'required', 'tabindex' => '12'])); ?>

                      </div>              
                    </div>  

                    <div class="col-md-4">
                      <div class="form-group">
                        <label style="color: #fff;">Salvar........................................................</label>
<button type="button" class="btn btn-primary btn-success-add-informacao pull-left" tabindex="16"><i class="fa fa-plus"></i> Limpar campos para adicionar
                      </button>
                      </div>              
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">

                      </div>              
                    </div>



                  </div>


                  <div class="row">                

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>* Informação</label>
                        <?php echo e(Form::textarea('informacao', $informacao, ['id' => 'informacao','class' => 'form-control clearInput','placeholder' => 'Descreva a atividade realizada no cliente.', 'required' => 'required', 'tabindex' => '4', 'rows' => 10, 'cols' => 50 ])); ?>

                      </div>              
                    </div>


                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Data Cadastro</label>
                        <?php echo e(Form::text('data_cadastro_informacao', $data_informacao, ['id' => 'data_cadastro_informacao','class' => 'form-control clearInput','placeholder' => '00/00/0000 00:00:00', 'readonly' => 'readonly' ])); ?>

                      </div>              
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Usuário</label>
                        <?php echo e(Form::text('user_nome', $user_nome, ['id' => 'user_nome','class' => 'form-control clearInput','placeholder' => 'Nome do usuário', 'readonly' => 'readonly' ])); ?>

                        <input id="user_id" name="user_id" type="hidden" value="">
                      </div>             
                    </div>

                    <div class="col-md-4">

                    </div>


                  </div>

                  <div class="box-footer">

                    <div class="col-xs-12">    
                      <input id="idRecordCliInformacao" name="idRecordCliInformacao" type="hidden" value="<?php echo e($cliente_id); ?>">
                      <input id="idInformacao" name="idInformacao" type="hidden" value="">
                      <input id="status_bt_informacao" name="status_bt_informacao" type="hidden" value="">
                      <button type="submit" class="btn btn-success btn-success-informacao pull-right" tabindex="16"><i class="fa fa-fw fa-save"></i> Salvar
                      </button>
                    </div>

                  </div>

                </form>



                <div class="box box-danger" style="margin-top: 20px;">

                  <h2 class="page-header" style="color: #3c8dbc; font-weight: bold;">Informações do cliente</h2>


                  <div class="row" style="margin-top: 20px;">

                    <div class="box-body table-responsive no-padding">

                      <table class="table table-bordered data-table" id="tb_datatable_informacoes" width="100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Tipo</th>
                            <th>Usuário</th> 
                            <th>Dt. Cadastro</th>                                 
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>

                    </div>
                    
                  </div>
                </div>
              </div>

              <div class="<?php echo e($tab_cliente_senha_cli); ?> tab-pane" id="cliente_senha_cli">
                <div class="alert alert-warning alert-dismissible sem_cad_cliente">
                  <h4><i class="icon fa fa-warning"></i> Aréa Indisponível!</h4>
                  <p>Por favor, informe os dados do cadastro e salve!</p>
                </div>
                <span class="com_cad_cliente">

                  <form action="javascript:void(0);" name="formClienteSenha" id="formClienteSenha" method="post"> 
                    <?php echo e(csrf_field()); ?>


                    <div id="alert-msg-senha"></div><!-- alert-msg, recebe a mensagem da ação de cadastro  -->

                    <div class="row">   

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>* Tipo</label>
                          <?php echo e(Form::select('tipo_id_senha', $cliente_tipo, $checkedClienteTipo, ['placeholder' => 'Selecione uma opção',
                          'class' => 'form-control clearInput', 'id' => 'tipo_id_senha', 'required' => 'required', 'tabindex' => '12'])); ?>

                        </div>              
                      </div>  

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>* User</label>
                          <?php echo e(Form::text('user_senha', $user_senha, ['id' => 'user_senha','class' => 'form-control clearInput','placeholder' => 'user', 'tabindex' => '9' ])); ?>

                        </div>              
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                         <label>* Password</label>
                         <?php echo e(Form::text('password_senha', $password_senha, ['id' => 'password_senha','class' => 'form-control clearInput','placeholder' => 'password', 'tabindex' => '9' ])); ?>

                       </div>              
                     </div>

                     <div class="col-md-3">
                      <div class="form-group">
                        <label style="color: #fff;">Salvar........................................................</label>
<button type="button" class="btn btn-primary btn-success-add-senha pull-left" tabindex="16"><i class="fa fa-plus"></i> Limpar campos para adicionar
                      </button>
                      </div>              
                    </div>



                   </div>

                   <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Data Cadastro</label>
                        <?php echo e(Form::text('data_cadastro_senha', $data_cadastro_senha, ['id' => 'data_cadastro_senha','class' => 'form-control clearInput','placeholder' => '00/00/0000 00:00:00', 'readonly' => 'readonly' ])); ?>

                      </div>              
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Usuário</label>
                        <?php echo e(Form::text('user_nome_senha', $user_nome_senha, ['id' => 'user_nome_senha','class' => 'form-control clearInput','placeholder' => 'Nome do usuário', 'readonly' => 'readonly' ])); ?>

                        <input id="user_id" name="user_id" type="hidden" value="">
                      </div>             
                    </div>

                    <div class="col-md-4">

                    </div>


                  </div>




                  <div class="box-footer">

                    <div class="col-xs-12">    
                      <input id="idRecordCliSenha" name="idRecordCliSenha" type="hidden" value="<?php echo e($cliente_id); ?>">
                      <input id="idSenha" name="idSenha" type="hidden" value="">
                      <input id="status_bt_senha" name="status_bt_senha" type="hidden" value="">
                      <button type="submit" class="btn btn-success btn-success-senha pull-right" tabindex="16"><i class="fa fa-fw fa-save"></i> Salvar
                      </button>
                    </div>

                  </div>

                </form>



                <div class="box box-danger" style="margin-top: 20px;">

                  <h2 class="page-header" style="color: #3c8dbc; font-weight: bold;">Senhas do cliente</h2>


                  <div class="row" style="margin-top: 20px;">

                    <div class="box-body table-responsive no-padding">

                      <table class="table table-bordered data-table" id="tb_datatable_senhas" width="100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Tipo</th>
                            <th>Usuário</th> 
                            <th>Dt. Cadastro</th>                                 
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>

                    </div>
                    
                  </div>
                </div>

              </div>



            </div>

            <div class="box box-danger" style="margin-top: 20px;">

            </div>

          </span>

        </div>
        <!-- fim da tab -->

      </span>

    </div>
    <!-- /.tab-pane -->
  </div>
  <!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
</div>
<!-- /.box -->

<!-- /.row -->



</section>

<input type="hidden" name="valueCity" id="valueCity" value="<?php echo e($checkedCity); ?>">
<input type="hidden" name="state" id="state">


<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(url('/assets_admin/js/script-cliente.js?v=4')); ?>"></script>
<script src="<?php echo e(url('/assets/js/google-maps.js')); ?>"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


<script>



  var CpfCnpjMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length <= 11 ? '000.000.000-009' : '00.000.000/0000-00';
  },
  cpfCnpjpOptions = {
    onKeyPress: function(val, e, field, options) {
      field.mask(CpfCnpjMaskBehavior.apply({}, arguments), options);
    }
  };

  $(function() {

    $('#pag_valor_vencimento').mask('#.##0,00' , { reverse : true});
    $('#pag_valor_pagamento').mask('#.##0,00' , { reverse : true});

    $("#mdb-lightbox-ui").load('<?php echo url("/assets/mdb-addons/mdb-lightbox-ui.html"); ?>');

    $(':input[name^=documento_socio]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
    $(':input[name^=cpfcnpj]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
    $(':input[name^=banco_1_documento]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
    $(':input[name^=banco_2_documento]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);


  //https://demos.laraget.com/images/loading2.gif
//tb de informações cliente
  if($('#idRecord').val() > 0){ 

    //ao carregar página
    var table = $('#tb_datatable_informacoes').DataTable({
    "order": [[0,'desc']], //informa qual coluna inicia com ordenacao, neste caso estou removendo a primeiro coluna (0)
    oLanguage: {
      "sProcessing": "Carregando...",
      "sLengthMenu": "Mostrar _MENU_ registros por página",
      "sZeroRecords": "Nenhum registro encontrado",
      "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
      "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
      "sInfoFiltered": "(filtrado de _MAX_ registros)",
      "sSearch": "Pesquisar: ",
      "oPaginate": {
        "sFirst": "Início",
        "sPrevious": "Anterior",
        "sNext": "Próximo",
        "sLast": "Último"
      }
    },
    buttons: [
    'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    processing: true,
    serverSide: true,
    ajax: {
     url: '<?php echo url("/controleinternoadmin/cliente/carregaTabelaInformacoes/'+$('#idRecord').val()+'"); ?>',
     data: function ( d ) {
               //d.valorFiltroInput = $('#valorFiltroInput').val();
               // d.custom = $('#myInput').val();
               // etc
             }
           },
           columns: [
           {data: 'id', name: 'id'},
           {data: 'cliente', name: 'cliente'},       
           {data: 'tipo_nome', name: 'tipo_nome'},
           {data: 'usuario', name: 'usuario'},
           {data: 'created_at', name: 'created_at'},
           {data: 'action', name: 'action', orderable: false, searchable: false},
           ]
         });

    table.buttons().container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );

    /********************************************************/





}///if idRecord > 0

//tb de senhas cliente
if($('#idRecord').val() > 0){ 

    //ao carregar página
    var table = $('#tb_datatable_senhas').DataTable({
    "order": [[0,'desc']], //informa qual coluna inicia com ordenacao, neste caso estou removendo a primeiro coluna (0)
    oLanguage: {
      "sProcessing": "Carregando...",
      "sLengthMenu": "Mostrar _MENU_ registros por página",
      "sZeroRecords": "Nenhum registro encontrado",
      "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
      "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
      "sInfoFiltered": "(filtrado de _MAX_ registros)",
      "sSearch": "Pesquisar: ",
      "oPaginate": {
        "sFirst": "Início",
        "sPrevious": "Anterior",
        "sNext": "Próximo",
        "sLast": "Último"
      }
    },
    buttons: [
    'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    processing: true,
    serverSide: true,
    ajax: {
     url: '<?php echo url("/controleinternoadmin/cliente/carregaTabelaSenhas/'+$('#idRecord').val()+'"); ?>',
     data: function ( d ) {
               //d.valorFiltroInput = $('#valorFiltroInput').val();
               // d.custom = $('#myInput').val();
               // etc
             }
           },
           columns: [
           {data: 'id', name: 'id'},
           {data: 'cliente', name: 'cliente'},       
           {data: 'tipo_nome', name: 'tipo_nome'},
           {data: 'usuario', name: 'usuario'},
           {data: 'created_at', name: 'created_at'},
           {data: 'action', name: 'action', orderable: false, searchable: false},
           ]
         });

    table.buttons().container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );

    /********************************************************/





}///if idRecord > 0




});

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\nara-sistema\laravelsete\nara-controleinterno\resources\views/admin/cliente/create-edit.blade.php ENDPATH**/ ?>