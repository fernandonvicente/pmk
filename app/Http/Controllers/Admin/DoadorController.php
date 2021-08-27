<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Validator;
use Collection;
use Session;
use Cookie;
use DB;
use PDF;
use Hash;
use Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\All\MailController;
use App\Http\Controllers\Controller;
use App\Models\All\State;
use App\Models\All\City;
use App\Models\All\Doador;
use App\Models\All\IntervaloDeDoacao;
use App\Models\All\FormaDePagamento;


use App\Models\View\ViewClientes;

use App\User;
use Carbon\Carbon;

use DataTables;



class DoadorController extends Controller
{
  private $mailController;

  private $stateModel;   

  private $qtRecordPage = 25;

  public $tipoPessoa = [
    'F' => 'Física',
    'J' => 'Jurídica',
  ];

  public $sim_e_nao = [
    'S' => 'SIM',
    'N' => 'NÃO',
  ];

  public $tipoConta = [
    'CC' => 'Conta Corrente',
    'CP' => 'Poupança',
  ];

  public $tipoDocumento = [
    'adesao' => 'Adesão',
    'mensalidade' => 'Mensalidade',
  ];

  public $tipoPagamento  = [
    'cartao' => 'Cartão',
    'boleto' => 'Boleto',
  ];

  public $statusPagamento  = [
    'aberto' => 'Aberto',
    'pago' => 'Pago',
  ];

  public function __construct(MailController $mailController){
    $this->mailController = $mailController;      
  }
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/

public function indexajax(Request $request)
{
//if(Gate::denies('view_consultores')) {
//abort(404);
//}

  set_time_limit(0);

  include_once(public_path() . '/assets/funcoes/funcoesGeral.php');

  $title = 'Doadores';
  $pagAction = 'Lista';

  return view('admin.doador.indexajax', compact('title','pagAction')); 
}


/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{

//if(Gate::denies('create_consultores')) {
//abort(404);
//}

  set_time_limit(0);

  $states = State::get();
  $states = $states->pluck('name', 'uf')->toArray();
//-------------------------------------------------------
  $lista_intervalo_de_doacao = IntervaloDeDoacao::orderBy("nome",'desc')->get();
  $lista_intervalo_de_doacao = $lista_intervalo_de_doacao->pluck('nome','id')->toArray();
//-------------------------------------------------------
  $lista_forma_de_pagamento = FormaDePagamento::orderBy("nome",'desc')->get();
  $lista_forma_de_pagamento = $lista_forma_de_pagamento->pluck('nome','id')->toArray();
//-------------------------------------------------------  
  $cities = [];

  $listsArrayFiles = [];

//---------------------------------------------------------------------
  $listsArrayFiles = Array();
  $listsArrayImagens = Array();

  $data = [    
    'cliente_id' => '',
    'nome' => '', 
    'email' => '',         
    'documento' => '',
    'telefone' => '',
    'dt_nascimento' => '',
    'lista_intervalo_de_doacao' => $lista_intervalo_de_doacao,
    'checkedIntervaloDeDoacao' => '',
    'valor_doacao' => '',
    'lista_forma_de_pagamento' => $lista_forma_de_pagamento,
    'checkedFormaDePagamento' => '',

    'states' => $states,
    'checkedState' => '',
    'cities' => $cities,
    'checkedCity' => '',
    'cep' => '',
    'endereco' => '',
    'bairro' => '',
    'num' => '',
    'complemento' => '',  

    'data_cadastro' => '',   

    'tab_cliente_cadastro' => 'active',
  ]; 

  $title = 'Doador';
  $pagAction = 'Cadastrar';

  return view('admin.doador.create-edit', $data, compact('title','pagAction')); 

}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{ 
//if(Gate::denies('create_consultores')) {
//abort(404);
//}
  set_time_limit(0);

  include_once(public_path() . '/assets/funcoes/funcoesGeral.php');

  try{
    DB::beginTransaction(); 
    include_once(public_path() . '/assets/funcoes/funcoesGeral.php');                  

    $documento = (preg_replace('/\D+/', '', $request->input('documento')));

    //DB::enableQueryLog();

    $estado_id = 0;
    $cidade_id = 0;

    if($request->input('state')){
      $objEstado = State::where('uf',$request->input('state'))->get()->first();
      $estado_id = $objEstado->id;
    }

    if($request->input('city')){
      $objCidade = City::where('state_id',$objEstado->id)
      ->where('name',$request->input('city'))
      ->get()->first();   
      $cidade_id = $objCidade->id ;  
    }    

    $DoadorInsert = Doador::create([
      'documento'         => $documento,  
      'nome'              => $request->input('nome'),
      'email'             => $request->input('email'),
      'documento'         => $documento,      
      'dt_nascimento'     => $request->input('dt_nascimento'),
      'intervalo_de_doacao_id' => $request->input('intervalo_de_doacao'),
      'valor_doacao'        => gravarValorMoeda($request->input('valor_doacao')),
      'forma_de_pagamento_id' => $request->input('forma_de_pagamento'),
      'cep'               => $request->input('cep'),
      'endereco'          => $request->input('endereco'),
      'num'               => $request->input('num'),
      'complemento'       => $request->input('complemento'),
      'bairro'            => $request->input('bairro'),
      'uf'                => $estado_id,
      'cidade'            => $cidade_id,
      'cliente_status'    => $request->input('cliente_status_id'),
    ]);

    $insertedId = $DoadorInsert->id;

    if($insertedId){
      DB::commit();

      return response()->json([
        'success'   => true,
        'result' => $insertedId,
      ], 201);    

    }else{
      DB::rollBack();
      return response()->json([
        'success'   => false,
        'result' => 'Cadastro não realizado',
      ]);
    }

  } 
  catch(\Exception $e){
    DB::rollBack();
    return response()->json([
      'success'   => false,
      'result' => $e->getMessage(),
    ]);
  }

}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{

  set_time_limit(0);

  include_once(public_path() . '/assets/funcoes/funcoesGeral.php');

  $objDoador = Doador::find($id);

  if($objDoador->uf > 0)
    $objEstado = State::find($objDoador->uf);

  if($objDoador->cidade > 0)
    $objCidade = City::find($objDoador->cidade); 

//-------------------------------------------------------
  $dtCadastro = explode(' ', $objDoador->created_at);
  $data_cadastro = converteData($dtCadastro[0]).' '.$dtCadastro[1];
//-------------------------------------------------------
  $states = State::get();
  $states = $states->pluck('name', 'uf')->toArray();
//-------------------------------------------------------  
  $lista_intervalo_de_doacao = IntervaloDeDoacao::orderBy("nome",'desc')->get();
  $lista_intervalo_de_doacao = $lista_intervalo_de_doacao->pluck('nome','id')->toArray();
//-------------------------------------------------------
  $lista_forma_de_pagamento = FormaDePagamento::orderBy("nome",'desc')->get();
  $lista_forma_de_pagamento = $lista_forma_de_pagamento->pluck('nome','id')->toArray();
//------------------------------------------------------- 
  $cities = [];      
//-------------------------------------------------------

  $arrayDtCadastro = explode(' ', $objDoador->created_at);
  $data_cadastro = converteData($arrayDtCadastro[0]).' '.$arrayDtCadastro[1];

  $data = [
    'cliente_id' => $objDoador->id,
    'nome' => $objDoador->nome, 
    'email' => $objDoador->email,        
    'documento' => $objDoador->documento,
    'telefone' => $objDoador->telefone,
    'dt_nascimento' => $objDoador->dt_nascimento,
    'lista_intervalo_de_doacao' => $lista_intervalo_de_doacao,
    'checkedIntervaloDeDoacao' => $objDoador->intervalo_de_doacao_id,
    'valor_doacao' => number_format($objDoador->valor_doacao, 2, '.', ''),
    'lista_forma_de_pagamento' => $lista_forma_de_pagamento,
    'checkedFormaDePagamento' => $objDoador->forma_de_pagamento_id,

    'states' => $states,
    'checkedState' => $objDoador->uf > 0 ? $objEstado->uf : '',
    'cities' => $cities,
    'checkedCity' => $objDoador->cidade > 0 ? $objCidade->name : '',
    'cep' => $objDoador->cep,
    'endereco' => $objDoador->endereco,
    'bairro' => $objDoador->bairro,
    'num' => $objDoador->num,
    'complemento' => $objDoador->complemento,  

    'data_cadastro' => $data_cadastro,   

    'tab_cliente_cadastro' => 'active',
  ];

  $title = 'Editar Doador';
  $pagAction = 'Editar';

  return view('admin.doador.create-edit', $data, compact('title','pagAction'));  
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{

  set_time_limit(0);

  include_once(public_path() . '/assets/funcoes/funcoesGeral.php');

  try{
    DB::beginTransaction(); 

    $objDoador = Doador::find($id);

    $documento = (preg_replace('/\D+/', '', $request->input('cpfcnpj')));

    $estado_id = 0;
    $cidade_id = 0;

    if($request->input('state')){
      $objEstado = State::where('uf',$request->input('state'))->get()->first();
      $estado_id = $objEstado->id;
    }

    if($request->input('city')){
      $objCidade = City::where('state_id',$objEstado->id)
      ->where('name',$request->input('city'))
      ->get()->first();   
      $cidade_id = $objCidade->id ;  
    }  

    $doadorUpdate = $objDoador->update([
      'documento'         => $documento,  
      'nome'              => $request->input('nome'),
      'email'             => $request->input('email'),
      'telefone'             => $request->input('telefone'),
      'dt_nascimento'     => $request->input('dt_nascimento'),
      'intervalo_de_doacao_id' => $request->input('intervalo_de_doacao'),
      'valor_doacao'        => gravarValorMoeda($request->input('valor_doacao')),
      'forma_de_pagamento_id' => $request->input('forma_de_pagamento'),
      'cep'               => $request->input('cep'),
      'endereco'          => $request->input('endereco'),
      'num'               => $request->input('num'),
      'complemento'       => $request->input('complemento'),
      'bairro'            => $request->input('bairro'),
      'uf'                => $estado_id,
      'cidade'            => $cidade_id,
      'cliente_status'    => $request->input('cliente_status_id'),
    ]);            

    if($doadorUpdate){
      DB::commit();

      return response()->json([
        'success'   => true,
        'result' => $id,
      ], 201);     
    }else{
      DB::rollBack();
      return response()->json([
        'success'   => false,
        'result' => $e->getMessage(),
      ]);
    }
  } 
  catch(\Exception $e){
    DB::rollBack();
    return response()->json([
      'success'   => false,
      'result' => $e->getMessage(),
    ]);
  }

}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
//if(Gate::denies('delete_consultores')) {
//abort(404);
//}

  $dataExclusao = date('Y-m-d H:i:s');
  try{
    DB::beginTransaction(); 
    $objDoador = Doador::find($id);

    if($objDoador){            

      $doadorUpdate = $objDoador->update([
        'status'              => 'Excluido',
      ]);

      if($doadorUpdate){  
       DB::commit();

       return response()->json([
        'success'   => true,
        'result' => $id,
      ], 200);

     }
   }else{
    DB::rollBack();
    return response()->json([
      'success'   => false,
      'result' => 'erro ao excluir registro',
    ], 200);
  }

} 
catch(\Exception $e){
  DB::rollBack();
  return response()->json([
    'success'   => false,
    'result' => $e->getMessage(),
  ]);
}
}









public function carregaTabela(Request $request)
{
//if(Gate::denies('view_consultores')) {
//abort(404);
//}

  set_time_limit(0);

  include_once(public_path() . '/assets/funcoes/funcoesGeral.php');


  $query = ViewClientes::get();

  $data = DataTables::of($query)
  ->addIndexColumn()
  ->editColumn('created_at', function ($data) {

    $dt = '';
    if($data->created_at){
      $dt = Carbon::parse($data->created_at)->format('d/m/Y H:i:s');
    }
    return $dt;
  })

  ->addColumn('action', function($row){

    $link = url("/pmkadmin/doador/edit").'/'.$row->id;
//$link2 = url("/grbrasiladmin/user/edit").'/'.$row->user_id;
//$link_imprimir = url("/grbrasiladmin/relatorio/consultor").'/'.$row->id;

    $btn = '';


    $btn .= '<a href="'.$link.'"><i class="fa fa-fw fa-edit" title="Editar Dados Cliente '.$row->nome.'"></i></a>';



/*
if(!Gate::denies('edit_usuarios')) {
if($row->user_id){
$btn .= '<a href="'.$link2.'"><i class="fa fa-fw fa-user" title="Trocar Senha de Login do Consultor '.$row->nome.'"></i></a>';
} 
}



if(!Gate::denies('edit_consultores')) {
$btn .= '<a href="'.$link_imprimir.'" target="_blank" ><i class="fa fa-fw fa-file-text-o" title="Imprimir Dados Consultor '.$row->nome.'"></i></a>';
}

if(!Gate::denies('delete_consultores')) {
$btn .= '<a href="javascript:void(0);" onclick="excluirRegistro('.$row->id.');"><i class="fa fa-fw fa-trash" style="color: #ff0000;" title="Excluir - '.$row->id.'"></i></a>';
}

if($row->email){
if(!Auth::user()->cliente_id){
$btn .= '<a href="javascript:void(0);" onclick="enviarTermo('.$row->id.');"><i class="fa fa-fw fa-send" style="color: #4caf50;" title="Enviar Termo de - '.$row->nome.'"></i></a>';
}
}else{
$btn .= '<a href="javascript:void(0);"><i class="fa fa-fw fa-send" style="color: #ffeb3b;" title="CONSULTOR SEM EMAIL DE ENVIO"></i></a>';
}
*/


return $btn;
})
  ->rawColumns(['action'])
  ->make(true);
//}

  return $data;
}




public function criarUsuario($id,$password)
{
  set_time_limit(0);

  include_once(public_path() . '/assets/funcoes/funcoesGeral.php');

  $objDoador = Cliente::find($id);

  $insert = User::create([
    'name' => $objDoador->nome,
    'email' => $objDoador->email,
    'cliente_id' => $id,
    'status' => 'A',
    'avatar' => null,
    'password' => bcrypt($password),
  ]);

  if($insert){  
    DB::commit();   

    $insertRoleUser = RoleUser::create([
      'role_id' => 8,
      'user_id' => $insert->id,
    ]);

    if($insert && $insertRoleUser)
      DB::commit();
    else
      DB::rollBack();


    return true;
  }else{
    return false;
  }
}



}
