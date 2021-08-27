

<?php $__env->startSection('title'); ?> <?php echo e($title); ?> - Gerenciamento Grupo Recupera Brasil <?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content-header'); ?>
  <section class="content-header">
      <h1>
        <?php echo e($title); ?> <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title=""></span>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('/controleinternoadmin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo e($title); ?></li>
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

  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                 
                  <a href="<?php echo e(url('/controleinternoadmin/tipo/create')); ?>"> 
                    <button type="button" class="btn btn-info pull-right"><i class="fa fa-fw fa-plus"></i> Cadastrar
                    </button>
                  </a>
                  
              </h3>
              <!--
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <input type="text" name="name_search" id="name_search" class="form-control pull-right" placeholder="Busca por: ID / Nome Fantasia / CNPJ / Cidade / UF" title="Busca por: ID / Nome Fantasia / CNPJ / Cidade / UF" onkeyup="capturarEnter(event);">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default clientsSearch">
                      <i class="fa fa-search btSearch"></i>
                      <i class="fa fa-refresh fa-spin btLoadingSearch" style="display: none;"></i>
                    </button>
                  </div>
                </div>
              </div>
            -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

              <table class="table table-bordered data-table" id="tb_datatable">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Nome</th>
                          <th>Status</th>                                 
                          <th>Ações</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix clearPagination" style="text-align: right;">
              
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(url('/assets_admin/js/script-tipo.js')); ?>"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">

$(function () {

  //https://demos.laraget.com/images/loading2.gif
    
    //ao carregar página
   var table = $('#tb_datatable').DataTable({
    "order": [[1,'asc']], //informa qual coluna inicia com ordenacao, neste caso estou removendo a primeiro coluna (0)
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
           url: '<?php echo url("/controleinternoadmin/tipo/carregaTabela"); ?>',
           data: function ( d ) {
               //d.valorFiltroInput = $('#valorFiltroInput').val();
               // d.custom = $('#myInput').val();
               // etc
           }
       },
       columns: [
           {data: 'id', name: 'id'},
           {data: 'nome', name: 'nome'},     
           {data: 'status', name: 'status'},
           {data: 'action', name: 'action', orderable: false, searchable: false},
       ]
   });

   table.buttons().container()
          .appendTo( '#example_wrapper .col-md-6:eq(0)' );



});

</script>


<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\nara-sistema\nara-controleinterno\resources\views/admin/tipo/indexajax.blade.php ENDPATH**/ ?>