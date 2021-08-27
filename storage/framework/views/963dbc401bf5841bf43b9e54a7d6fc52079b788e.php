

<?php $__env->startSection('title'); ?> <?php echo e($title); ?> - Gerenciamento Antena <?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content-header'); ?>
  <section class="content-header">
      <h1>
        <?php echo e($title); ?>

        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('controleinternoadmin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
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

  <form method="POST" action="<?php echo e(url('controleinternoadmin/user/createProfilePermission')); ?>" accept-charset="UTF-8" role="form" id="form_submit" autocomplete="off" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>



  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>

              <div class="col-xs-4">           
                  
                  <button type="submit" class="btn btn-success pull-left"><i class="fa fa-fw fa-save"></i> Salvar
                  </button>
                  
                </div>
                <div class="col-xs-4">           
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="btMarcarDesmarcar">
                      Marcar/Desmarcar
                    </label>
                  </div>

                </div>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 300px;">
                  
                  <?php echo e(Form::select('role', $listRoles, $selectdRole, ['placeholder' => 'Selecione um perfil',
                                     'class' => 'form-control', 'id' => 'role', 'required' => 'required'])); ?>


                  <div class="input-group-btn">
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th>Sessão</th>
                  <th>Visualizar</th>
                  <th>Cadastrar</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>

                <?php echo html_entity_decode($tr); ?>

                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
  </div>
  <?php echo Form::close(); ?>

      </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(url('/assets_admin/js/script-user.js')); ?>"></script>

<script>
$('#btMarcarDesmarcar').click(function(){
    
    if ( $(this).is(':checked') ){
      //marcar
      $('.checkbox').prop("checked", true);
     // $('.vSwitch').addClass('on');
    }else{
      //desmarca
      $('.checkbox').prop("checked", false);
     // $('.vSwitch').removeClass('on');
    }
  });
</script>


<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\nara-sistema\nara-controleinterno\resources\views/admin/user/permission.blade.php ENDPATH**/ ?>