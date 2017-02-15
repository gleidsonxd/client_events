<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ServicosController extends Controller
{
	// public function __construct()
 //   {
 //       $this->middleware('auth');
 //   }

	public function form()
	{
		if (session('logado')!= 1){
		return view("mlogin");
		}
		if (session('adm') == false){
		return view("noadmin");
		}
	    $ch = curl_init();
		$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/coords".$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));

	    $result = curl_exec($ch);
	   
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	    
		return view('servico_form', array('result' => $result));
	}
    public function create()
    {
		if (session('logado')!= 1){
		return view("mlogin");
		}
		if (session('adm') == false){
		return view("noadmin");
		}
		$idu = session('id');
		if (isset($idu)){
			$u = "servico[nome]=".$_POST['nome']."&servico[tempo]=".$_POST['tempo']."&servico[coord_id]=".$_POST['coord']."&usuarioid=".$idu;
		}
    	
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/servicos");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, "$u");
		curl_setopt($ch, CURLOPT_POST, 1);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		if(strpos($result,"Criado")){
			return view('servicoeors',array('sucesso'=>"Serviço criado com sucesso!"));
		}
		else{
			return view('servicoeors',array('erro'=>"Ocorreu um erro ao criar o Serviço!"));
		}
		curl_close ($ch);
		/*return view("index");*/
    }
    public function listAll()
    {
   		if (session('logado')!= 1){
		return view("mlogin");
		}
		if (session('adm') == false){
		return view("noadmin");
		}
    	// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();
		$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/servicos".$u);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	


		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		return view('servicos', array('result' => $result));
    }
    public function read($id)
    {
		if (session('logado')!= 1){
		return view("mlogin");
		}
		if (session('adm') == false){
		return view("noadmin");
		}
		$ch = curl_init();
		$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/servicos/".$id.$u);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
		


		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		if(strpos($result,"id")){
			return view('servicoU', array('result' => $result));
		}else{
			return view('servicoeors',array('erro'=>"Serviço não encontrado!"));
		}
		curl_close ($ch);
		//var_dump(json_decode($result,true));
		
		
    }
    public function edit()
    {
    	if (session('logado')!= 1){
		return view("mlogin");
		}
		if (session('adm') == false){
		return view("noadmin");
		}
		$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
    	$ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/coords".$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	   
	    $resultC = curl_exec($ch);
	   
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	    

    	$id = $_POST['servicoid'];
	   	$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/servicos/".$id.$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	   
	    $result = curl_exec($ch);
	   // echo $result;
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	    // $pessoa = pessoa::find($id);
	        return view("servico_edit", compact('result', 'resultC'));	
    }
    public function update($id)
    {
    	if (session('logado')!= 1){
		return view("mlogin");
		}
		if (session('adm') == false){
		return view("noadmin");
		}
		$idu = session('id');
		if (isset($idu)){
			$u = "servico[nome]=".$_POST['nome']."&servico[tempo]=".$_POST['tempo']."&servico[coord_id]=".$_POST['coord']."&usuarioid=".$idu;
		}
    	
    	 $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/servicos/".$id);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	    curl_setopt($ch, CURLOPT_POSTFIELDS, "$u");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");


	    $result = curl_exec($ch);
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	        return view('servicoeors',array('erro'=>"Ocorreu um erro ao editar o Serviço!"));
	    }else{
	    	/*echo $result;*/
	    	return view('servicoeors', array('result' => $result))->with('sucesso', "Serviço editado com sucesso!");
	    }
	    curl_close ($ch);

    }
    public function delete($id)
    {
    	if (session('logado')!= 1){
		return view("mlogin");
		}
		if (session('adm') == false){
		return view("noadmin");
		}
		$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
    	// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/servicos/".$id.$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

	    $result = curl_exec($ch);
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	        return view('servicoeors',array('erro'=>"Ocorreu um erro ao remover o Serviço!"));
	    }else{
	    	return view('servicoeors',array('sucesso'=>"Serviço removido com sucesso!"));
	    }
	    curl_close ($ch);
    }
}
