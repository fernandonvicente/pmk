<?php
$actual = [];
$actual['routeName']    = (!empty(Route::current())) ? Route::current()->getName() : null;

/*
* @can('view'), valida se o usuario logado tem permissão de visualizar as informações do menu.....
* @can('create'), valida se o usuario logado tem permissão de cadastrar as informações do menu.....
* @can('edit'), valida se o usuario logado tem permissão de editar as informações do menu.....
* @can('delete'), valida se o usuario logado tem permissão de excluir as informações do menu.....
*/

$pagActualAux = str_replace("admin::", "", $actual['routeName']);
$pagActualAux = explode('.', $pagActualAux);
$pagActual = $pagActualAux[0];


$urlAux = explode('/', $_SERVER['REQUEST_URI']);//usando em clientes


if(count($pagActualAux) > 1)
   $pagActualNivel = $pagActualAux[1];
else
  $pagActualNivel = '';

//usando no menu clientes e pedidos
if(count($urlAux) > 4)
   $pageAtualAux = $urlAux[4];
 else
  $pageAtualAux = '';
?>


<ul class="sidebar-menu" data-widget="tree">
       
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_usuarios')): ?>
        <li class="<?= ($pagActual == 'user') ? 'active' : null; ?>">
          <a href="<?php echo e(url('controleinternoadmin/user/index')); ?>">
            <i class="fa fa-fw fa-users"></i> <span>Usuários</span>
          </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_nivel_de_usuario')): ?>
        <li class="treeview <?= ($pagActual == 'nivel-de-usuario') ? 'active menu-open' : null; ?>">
          <a href="#">
            <i class="fa fa-fw fa-file-text"></i>
            <span>Nível de Usuário</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?= ($pagActual == 'nivel-de-usuario') ? 'display: block;' : 'display: none;'; ?>">
            
            
            <li class="<?= ($pagActualNivel == 'create' ) ? 'active' : null; ?>"><a href="<?php echo e(url('controleinternoadmin/nivel-de-usuario/create')); ?>"><i class="fa fa-circle-o"></i> Cadastro</a></li>
                        
            <li class="<?= ($pagActualNivel == 'index' ) ? 'active' : null; ?>"><a href="<?php echo e(url('controleinternoadmin/nivel-de-usuario/index')); ?>"><i class="fa fa-circle-o"></i> Lista</a></li>
           

          </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_tipo_de_equipamento')): ?>
        <li class="treeview <?= ($pagActual == 'tipo') ? 'active menu-open' : null; ?>">
          <a href="#">
            <i class="fa fa-fw fa-file-text"></i>
            <span>Tipo de equipamento</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?= ($pagActual == 'tipo') ? 'display: block;' : 'display: none;'; ?>">
            
            
            <li class="<?= ($pagActualNivel == 'create' ) ? 'active' : null; ?>"><a href="<?php echo e(url('controleinternoadmin/tipo/create')); ?>"><i class="fa fa-circle-o"></i> Cadastro</a></li>
                        
            <li class="<?= ($pagActualNivel == 'index' ) ? 'active' : null; ?>"><a href="<?php echo e(url('controleinternoadmin/tipo/index')); ?>"><i class="fa fa-circle-o"></i> Lista</a></li>
           

          </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_cliente')): ?>
        <li class="treeview <?= ($pagActual == 'cliente') ? 'active menu-open' : null; ?>">
          <a href="#">
            <i class="fa fa-fw fa-file-text"></i>
            <span>Cliente</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?= ($pagActual == 'cliente') ? 'display: block;' : 'display: none;'; ?>">
            
            
            <li class="<?= ($pagActualNivel == 'create' ) ? 'active' : null; ?>"><a href="<?php echo e(url('controleinternoadmin/cliente/create')); ?>"><i class="fa fa-circle-o"></i> Cadastro</a></li>
                        
            <li class="<?= ($pagActualNivel == 'index' ) ? 'active' : null; ?>"><a href="<?php echo e(url('controleinternoadmin/cliente/index')); ?>"><i class="fa fa-circle-o"></i> Lista</a></li>
           

          </ul>
        </li>
        <?php endif; ?>

        


        
        
</ul>
<?php /**PATH C:\xampp7\htdocs\nara-sistema\nara-controleinterno\resources\views/admin/layout/menu.blade.php ENDPATH**/ ?>