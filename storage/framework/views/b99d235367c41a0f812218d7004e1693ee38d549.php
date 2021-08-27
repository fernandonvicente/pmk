<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content-header'); ?>
<section class="content-header">
  <h1>
    <?php echo e($title); ?>

    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(url('/pmkadmin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?php echo e(url('/pmkadmin/cliente/index')); ?>"><?php echo e($title); ?></a></li>
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
          </ul>
          <div class="tab-content">
            <div class="<?php echo e($tab_cliente_cadastro); ?> tab-pane" id="cliente_cadastro">

              <form action="javascript:void(0);" name="formDoador" id="formDoador" method="post"> 
                <?php echo e(csrf_field()); ?>


                <div id="alert-msg"></div><!-- alert-msg, recebe a mensagem da ação de cadastro  -->

                <div class="row">

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>* Nome</label>
                      <?php echo e(Form::text('nome', $nome, ['id' => 'nome','class' => 'form-control','placeholder' => 'Nome', 'required' => 'required', 'tabindex' => '1' ])); ?>

                    </div>              
                  </div>     

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>* E-mail</label>
                      <?php echo e(Form::text('email', $email, ['id' => 'email','class' => 'form-control','placeholder' => 'fulano@dominio.com.br', 'required' => 'required', 'tabindex' => '2' ])); ?>

                    </div>              
                  </div>                  

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>* CPF</label>
                      <?php echo e(Form::text('cpfcnpj', $documento, ['id' => 'cpfcnpj','class' => 'form-control','placeholder' => '000.000.000-00', 'required' => 'required', 'tabindex' => '3' ])); ?>

                    </div>               
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>* Telefone</label>
                      <?php echo e(Form::text('telefone', $telefone, ['id' => 'telefone','class' => 'form-control maskTel','placeholder' => '(XX) XXXXX-XXXX', 'required' => 'required', 'tabindex' => '4' ])); ?>                      
                    </div>              
                  </div>
                </div>

                <div class="row">

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>* Data de Nascimento</label>
                      <?php echo e(Form::date('dt_nascimento', $dt_nascimento, ['id' => 'dt_nascimento','class' => 'form-control','placeholder' => '00/00/0000', 'required' => 'required', 'tabindex' => '5' ])); ?>

                    </div>              
                  </div>     

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>* Intervalo de Doação</label>
                      <?php echo e(Form::select('intervalo_de_doacao', $lista_intervalo_de_doacao, $checkedIntervaloDeDoacao, ['placeholder' => 'Selecione um opção',
                      'class' => 'form-control', 'id' => 'intervalo_de_doacao', 'required' => 'required', 'tabindex' => '6'])); ?>

                    </div>              
                  </div>                  

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>* Valor da Doação</label>
                      <?php echo e(Form::text('valor_doacao', $valor_doacao, ['id' => 'valor_doacao','class' => 'form-control','placeholder' => '0,00', 'required' => 'required', 'tabindex' => '7' ])); ?>

                    </div>               
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>* Forma de Pagamento</label>
                      <?php echo e(Form::select('forma_de_pagamento', $lista_forma_de_pagamento, $checkedFormaDePagamento, ['placeholder' => 'Selecione um opção',
                      'class' => 'form-control', 'id' => 'forma_de_pagamento', 'required' => 'required', 'tabindex' => '8'])); ?>                    
                    </div>              
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>CEP</label>
                      <?php echo e(Form::text('cep', $cep, ['id' => 'cep','class' => 'form-control cep buscaDadosCep','placeholder' => 'Preencha o CEP', 'tabindex' => '9' ])); ?>                   
                    </div>               
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Endereço</label>
                      <?php echo e(Form::text('endereco', $endereco, ['id' => 'endereco','class' => 'form-control','placeholder' => 'Preencha o endereço', 'tabindex' => '10' ])); ?>

                    </div>              
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nº</label>
                      <?php echo e(Form::text('num', $num, ['id' => 'num','class' => 'form-control','placeholder' => 'Preencha o nº', 'tabindex' => '11' ])); ?>

                    </div>  
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Complemento</label>
                      <?php echo e(Form::text('complemento', $complemento, ['id' => 'complemento','class' => 'form-control','placeholder' => 'Preencha o complemento', 'tabindex' => '12' ])); ?>

                    </div> 
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Bairro</label>
                      <?php echo e(Form::text('bairro', $bairro, ['id' => 'bairro','class' => 'form-control','placeholder' => 'Preencha o bairro', 'tabindex' => '13' ])); ?>

                    </div>              
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Estado</label>
                      <?php echo e(Form::select('state', $states, $checkedState, ['placeholder' => 'Selecione um estado',
                      'class' => 'form-control', 'id' => 'state', 'tabindex' => '14'])); ?>

                    </div>              
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Cidade</label>
                      <?php echo e(Form::select('city', $cities, $checkedCity, ['placeholder' => 'Primeiro selecione o Estado',
                      'class' => 'form-control', 'id' => 'city', 'tabindex' => '15'])); ?>

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
<script src="<?php echo e(url('/assets_admin/js/script-cliente.js?v=5')); ?>"></script>
<script src="<?php echo e(url('/assets_admin/js/script-util.js?v=5')); ?>"></script>
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

    $('#valor_doacao').mask('#.##0,00' , { reverse : true});    

    $("#mdb-lightbox-ui").load('<?php echo url("/assets/mdb-addons/mdb-lightbox-ui.html"); ?>');

    $(':input[name^=documento_socio]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
    $(':input[name^=cpfcnpj]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
   

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
     url: '<?php echo url("/pmkadmin/cliente/carregaTabelaInformacoes/'+$('#idRecord').val()+'"); ?>',
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
           {data: 'localizacao', name: 'localizacao'},
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
     url: '<?php echo url("/pmkadmin/cliente/carregaTabelaSenhas/'+$('#idRecord').val()+'"); ?>',
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
           {data: 'descricao_senha', name: 'descricao_senha'},
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

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto-base2\pmk\codigo\resources\views/admin/doador/create-edit.blade.php ENDPATH**/ ?>