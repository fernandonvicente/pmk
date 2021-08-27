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
       
        @can('view_usuarios')
        <li class="<?= ($pagActual == 'user') ? 'active' : null; ?>">
          <a href="{{ url('pmkadmin/user/index') }}">
            <i class="fa fa-fw fa-users"></i> <span>Usuários</span>
          </a>
        </li>
        @endcan

        @can('view_cliente')
        <li class="treeview <?= ($pagActual == 'doador') ? 'active menu-open' : null; ?>">
          <a href="#">
            <i class="fa fa-fw fa-file-text"></i>
            <span>Doadores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?= ($pagActual == 'doador') ? 'display: block;' : 'display: none;'; ?>">
            
            
            <li class="<?= ($pagActualNivel == 'create' ) ? 'active' : null; ?>"><a href="{{ url('pmkadmin/doador/create') }}"><i class="fa fa-circle-o"></i> Cadastro</a></li>
                        
            <li class="<?= ($pagActualNivel == 'index' ) ? 'active' : null; ?>"><a href="{{ url('pmkadmin/doador/index') }}"><i class="fa fa-circle-o"></i> Lista</a></li>
           

          </ul>
        </li>
        @endcan

</ul>
