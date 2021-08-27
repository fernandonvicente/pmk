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
        <li><a href="<?php echo e(url('/controleinternoadmin/tipo/index')); ?>"><?php echo e($title); ?></a></li>
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
              <li class="active"><a href="#cliente_cadastro" data-toggle="tab">Cadastro</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="cliente_cadastro">

                <form action="javascript:void(0);" name="formTipo" id="formTipo" method="post"> 
                <?php echo e(csrf_field()); ?>


                 <div id="alert-msg"></div><!-- alert-msg, recebe a mensagem da ação de cadastro  -->
                 
                <div class="row">
                  

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>* Nome</label>
                      <?php echo e(Form::text('nome', $nome, ['id' => 'nome','class' => 'form-control','placeholder' => 'Nome do tipo', 'required' => 'required', 'tabindex' => '1' ])); ?>

                    </div>               
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      
                    </div>              
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      
                    </div>              
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                     
                    </div>              
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                     
                    </div>              
                  </div>
                </div>

          
                <div class="box-footer">
                  
                  <div class="col-xs-12">    
                    <input id="idRecord" name="idRecord" type="hidden" value="<?php echo e($tipo_id); ?>">
                    <input id="status_bt" name="status_bt" type="hidden" value="">
                    <button type="submit" class="btn btn-success pull-right" tabindex="16"><i class="fa fa-fw fa-save"></i> Salvar
                    </button>
                  </div>
                  
                </div>

               </form>
                
              </div>

            
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

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(url('/assets_admin/js/script-tipo.js')); ?>"></script>

<script>

$(document).ready(function(){



});

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\nara-sistema\laravelsete\nara-controleinterno\resources\views/admin/tipo/create-edit.blade.php ENDPATH**/ ?>