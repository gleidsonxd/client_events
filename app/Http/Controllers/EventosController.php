<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EventosController extends Controller
{
	
    public function form()
    {
    	$userpwd = "admin:admin";
    	if (session('logado')!= 1) {
		return view("mlogin");
		}
    	$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
    	$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/servicos".$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
	    


	    $results = curl_exec($ch);
	   
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	    

    	
	   	$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/lugars".$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
	   


	    $resultl = curl_exec($ch);
	   // echo $result;
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	    // $pessoa = pessoa::find($id);
	        return view("evento_form", compact('results', 'resultl'));	
    }
    public function create()
     {	
     	$userpwd = "admin:admin";
     	if (session('logado')!= 1) {
		return view("mlogin");
		}
     	if (isset($_POST['servicos'])) {
     		$aS = $_POST['servicos'];
    		$s = implode(",", $aS);
     	}else{
     		$s = '';
     	}
     	if (isset($_POST['lugares'])) {
     		$aL = $_POST['lugares'];
    		$l = implode(",", $aL);
     	}else{
     		$l='';
     	}
		$idu = session('id');
		if (isset($idu)){
			$u = "evento[nome]=".$_POST['nome']."&evento[data_ini]=".$_POST['data_ini']."&evento[data_fim]=".$_POST['data_fim']."&evento[descricao]=".$_POST['desc']."&servicos=".$s."&lugares=".$l."&evento[usuario_id]=".$idu;
		}
    	
    	/*$u = "evento[nome]=".$_POST['nome']."&evento[data_ini]=".$_POST['data_ini']."&evento[data_fim]=".$_POST['data_fim']."&evento[descricao]=".$_POST['desc']."&servicos=".$s."&lugares=".$l."&evento[usuario_id]=4";*/
    	//echo "$u";
		// // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/eventos");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
		curl_setopt($ch, CURLOPT_POSTFIELDS, "$u");
		curl_setopt($ch, CURLOPT_POST, 1);
		
	

		$result = curl_exec($ch);
		/*var_dump(json_decode($result));
		echo $result;*/
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		if (is_null(json_decode($result))) {
			return view('eventoeors',array('sucesso'=>"Evento criado com sucesso!"));
			
		} else {
			return view('eventoeors',array('erro'=>"Ocorreu um erro ao criar o Evento!"));
		}
		
		curl_close ($ch);
		/*return view("index");*/
    }
    public function listAll()
    {
    	$userpwd = "admin:admin";
    	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/eventos");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
	
		

		$result = curl_exec($ch);
		
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		return view('eventos', array('result' => $result));
    }
    public function read($id)
    {
    	$userpwd = "admin:admin";
    	if (session('logado')!= 1) {
		return view("mlogin");
		}
    	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/eventos/".$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
		

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		//var_dump(json_decode($result,true));
		
		
		return view('eventoU', array('result' => $result));
    }
    public function edit()
    {
    	$userpwd = "admin:admin";
    	if (session('logado')!= 1) {
		return view("mlogin");
		}
    	$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
    	$ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/servicos".$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
	    
	    
	    $results = curl_exec($ch);
	   
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	    
	   	$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/lugars".$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");

	    $resultl = curl_exec($ch);
	   // echo $result;
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	    // $pessoa = pessoa::find($id);

	    $id = $_POST['eventoid'];
	    $ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/eventos/".$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);


	    return view("evento_edit", compact('results', 'resultl','result'));	
    }
    public function update($id)
    {
    	$userpwd = "admin:admin";
    	
    	if (session('logado')!= 1) {
		return view("mlogin");
		}
		
		if (isset($_POST['servicos'])) {
     		$aS = $_POST['servicos'];
     		foreach ($aS as $serv) {
     			 @$s .= "evento[servico_ids][]=".$serv."&";
     			 
    		}
     		$ss = "". substr($s,0,-1);
     		
     	}else{
     		$ss = '';
     	}
     	if (isset($_POST['lugares'])) {
     		$aL = $_POST['lugares'];
     		foreach ($aL as $lug) {
     			 @$l .= "evento[lugar_ids][]=".$lug."&";
    		}
     		$sl ="".  substr($l,0,-1);
     	}else{
     		$sl = '';
     	}
     	//echo $ss."&".$sl."||||";
     	$criador =  @$_POST['criador'];
     	
     	$idu = session('id');
     	if (isset($idu)){
			$u = "evento[nome]=".$_POST['nome']."&evento[data_ini]=".$_POST['data_ini']."&evento[data_fim]=".$_POST['data_fim']."&evento[descricao]=".$_POST['desc']."&evento[usuario_id]=".$criador."&usuarioid=".$idu."&".$ss."&".$sl;
		}
    	/*$u = "evento[nome]=".$_POST['nome']."&evento[data_ini]=".$_POST['data_ini']."&evento[data_fim]=".$_POST['data_fim']."&evento[descricao]=".$_POST['desc']."&evento[usuario_id]=4&usuarioid=4&".$ss."&".$sl;*/
    	//echo $u;
    	$ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/eventos/".$id);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, "$u");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");

	
	    $result = curl_exec($ch);
	    //var_dump(json_decode($result,true));
	    if (is_string(json_decode($result,true))){
	    	return view('noadmin');
	    }
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    if(sizeof(json_decode($result,true))>0){
	    	return view('eventoeors', array('result' => $result))->with('sucesso', "Evento editado com sucesso!");
	        //return view('eventoeors',array('erro'=>"Ocorreu um erro ao editar o Evento!"));
	    }
	    else{
	    	return view('eventoeors',array('erro'=>"Ocorreu um erro ao editar o Evento!"));
	    //	return view('eventoeors', array('result' => $result))->with('sucesso', "Evento editado com sucesso!");
	    }
	    curl_close ($ch);

	    /*echo "<br><br><a href='/index'>Volta</a>";*/
    }
    public function delete($id)
    {
    	$userpwd = "admin:admin";
    	if (session('logado')!= 1) {
		return view("mlogin");
		}
		$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
    	// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
	    $ch = curl_init();
	
	    curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/eventos/".$id.$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");


	    $result = curl_exec($ch);
	    //var_dump(json_decode($result,true));
	    echo strlen($result);
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    if(strlen($result) > 23){
	        return view('eventoeors',array('erro'=>"Ocorreu um erro ao remover o Evento!"));
	    }else{
	    	return view('eventoeors',array('sucesso'=>"Evento removido com sucesso!"));
	    }
	    curl_close ($ch);
	    /*echo "<br><br><a href='/index'>Volta</a>";*/
    }

    public function feed()
    {
		$userpwd = "admin:admin";
    	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/eventos");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
	
	
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		$feed = array();
		$eventos = json_decode($result);
		if(session('logado') == 1){
			foreach ($eventos as $e) {
				$feed[] = [
					'id' => $e->id,
					'title' => $e->nome,
					'start' => $e->data_ini,
					'end' =>   $e->data_fim,
					'url' => "/eventos/".$e->id,
					'color'=> "green"
				];
				
			}
			
		}
		else{
			foreach ($eventos as $e) {
			$feed[] = [
				'id' => $e->id,
				'title' => $e->nome,
				'start' => $e->data_ini,
				'end' =>   $e->data_fim,
				'color'=> "green"
			];
			
			}
	
		}


		
		return response()->json($feed);
    }

}
