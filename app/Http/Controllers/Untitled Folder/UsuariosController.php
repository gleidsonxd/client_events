<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsuariosController extends Controller
{
	public function form()
	{
		$email = session('email');
    	if (!isset($email)){
		return view("mlogin");
		}
		
		return view('usuario_form');
	}
    public function create()
    {	
    	$userpwd = "admin:admin";
    	$email = session('email');
    	if (!isset($email)){
		return view("mlogin");
		}
		if (isset($_POST['coord']) && !is_null($_POST['coord']) && !empty($_POST['coord'])){
			$u = "usuario[nome]=".$_POST['nome']."&usuario[email]=".$_POST['email']."&usuario[matricula]=".$_POST['matricula'].'&usuario[tcoord]=true';
		}else{
			$u = "usuario[nome]=".$_POST['nome']."&usuario[email]=".$_POST['email']."&usuario[matricula]=".$_POST['matricula'];	
		}
		
    	//$u = "usuario[nome]=".$_POST['nome']."&usuario[email]=".$_POST['email'].."&usuario[matricula]=".$_POST['matricula']."&usuarioid="."4";
    	
    	 ///echo "$u";
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
		curl_setopt($ch, CURLOPT_POSTFIELDS, "$u");
		curl_setopt($ch, CURLOPT_POST, 1);

		$result = curl_exec($ch);
	#	echo $result;
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		if (strpos($result, "Blank")) {
	    	return view('usuarioeors',array('erro'=>"Ocorreu um erro ao cadastrar o Usuário!"));
	    } elseif(strpos($result,"Error")) {
	    	return view('usuarioeors',array('erro'=>"Email já cadastrado!"));
	    }else{
	    	return view('usuarioeors',array('sucesso'=>"Usuário cadastrado com sucesso!"));
	    }
		// else{
		// 	#return view('usuarioeors',array('sucesso'=>"Usuário cadastrado com sucesso!"));
		// }
		curl_close ($ch);
		#return view("index");
    }
    public function listAll()
    {
    	$userpwd = "admin:admin";
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

		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios".$u);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
		


		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		return view('usuarios', array('result' => $result));
    }
    public function read($id) #ADMIN OU OWNER
    {
    	$userpwd = "admin:admin";
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

		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios/".$id.$u);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		return view('usuarioU', array('result' => $result));
    }
    public function edit()#ADMIN OU OWNER
    {
    	$userpwd = "admin:admin";
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
    	$id = $_POST['usuarioid'];
	   	$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios/".$id.$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
	    


	    $result = curl_exec($ch);
	   // echo $result;
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	    // $pessoa = pessoa::find($id);
	        return view("usuario_edit", array('result' => $result));
    }
    public function update($id)#ADMIN OU OWNER
    {
    	$userpwd = "admin:admin";
    	if (session('logado')!= 1){
		return view("mlogin");
		}
		if ((session('adm') == false)&&$id != session('id')){
		return view("noadmin");
		}
		$idu = session('id');
		if (isset($_POST['admin']) && !is_null($_POST['admin']) && !empty($_POST['admin']) && isset($_POST['coord']) && !is_null($_POST['coord']) && !empty($_POST['coord'])){
			return view('usuarioeors',array('erro'=>"Usuário não pode ser administrador e coordenação ao mesmo tempo!"));
		}
		if (isset($idu)){
			if(isset($_POST['admin']) && !is_null($_POST['admin']) && !empty($_POST['admin'])){
				$u = "usuario[nome]=".$_POST['nome']."&usuario[email]=".$_POST['email']."&usuario[matricula]=".$_POST['matricula']."&usuarioid=".$idu."&usuario[admin]=true&usuario[tcoord]=false";
			}elseif(isset($_POST['coord']) && !is_null($_POST['coord']) && !empty($_POST['coord'])){
				$u = "usuario[nome]=".$_POST['nome']."&usuario[email]=".$_POST['email']."&usuario[matricula]=".$_POST['matricula']."&usuarioid=".$idu."&usuario[tcoord]=true&usuario[admin]=false";	
			}else{
				$u = "usuario[nome]=".$_POST['nome']."&usuario[email]=".$_POST['email']."&usuario[matricula]=".$_POST['matricula']."&usuarioid=".$idu."&usuario[tcoord]=false&usuario[admin]=false";	
			}
		}
    	//$u = "usuario[nome]=".$_POST['nome']."&usuario[email]=".$_POST['email']."&usuario[matricula]=".$_POST['matricula']."&usuarioid="."4";
    //	$u = "usuario[nome]=".$_POST['nome']."&usuario[email]=".$_POST['email']."&usuario[matricula]=".$_POST['matricula'];
    	 $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios/".$id);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
	    curl_setopt($ch, CURLOPT_POSTFIELDS, "$u");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");


	    $result = curl_exec($ch);
	    echo $result;
	    
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	        return view('usuarioeors',array('erro'=>"Ocorreu um erro ao editar o Usuário!"));
	    }
	    if(strpos($result,"Error")) {
	    	return view('usuarioeors',array('erro'=>"Email já cadastrado!"));
	    }
	    else{
	    	#echo $result;
	    	return view('usuarioeors', array('result' => $result))->with('sucesso', "Usuário editado com sucesso!");
	    }
	    curl_close ($ch);

	    
    }
    public function delete($id)
    {
    	$userpwd = "admin:admin";
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

	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios/".$id.$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");


	    $result = curl_exec($ch);
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	        return view('usuarioeors',array('erro'=>"Ocorreu um erro ao remover o Usuário!"));
	    }else{
	    	return view('usuarioeors',array('sucesso'=>"Usuário removido com sucesso!"));
	    }
	    curl_close ($ch);
	    // echo "<br><br><a href='/index'>Volta</a>";
    }
    public function login()
    {
     	$e = $_POST['email'];
		$p ="".$_POST['password'];
		$userpwd = "admin:admin";
		
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$method = "AES-256-CBC";
		$pass = "mMlTUwWqQt2ZOm7I4p7hh+YuPjmZcUlJ5rOuVAeVVjk="; 
		$iv = "1234567812345678";
		$encpassword = openssl_encrypt ($p, $method, $pass,true, $iv);
	
		$ch = curl_init();
		
		#curl_setopt($ch, CURLOPT_URL, "https://eventos-gleidsonxd.c9users.io/login");
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/login");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$e."&password=".$encpassword);
		curl_setopt($ch, CURLOPT_POST, 1);
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		$res = json_decode($result);
		
	
		if (@$res->logado == 1) {
			$email = @$res->email;
			$id = @$res->id;
			$logado = @$res->logado;
			$adm = @$res->adm;
			$tcoord = @$res->tcoord;
			
			if ($adm != 1) {
				session(['adm' => 0]);
			}else{
				session(['adm' => 1]);
			}
			if($tcoord == 1){
				session(['tcoord' => "1"]);
			}else{
				session(['tcoord' => "0"]);
			}
			session(['email' => $email]);
			session(['logado' => $logado]);
			session(['id' => $id]);
			
			#echo session('tcoord');
		}else{
			
			session(['email' => $e]);
			session(['pri' => true]);
			return view("usuarionovo");
		}
		//	echo session('adm') ;
		return view("eventos");
		#
    }

    public function logout(Request $req)
    {

     	$req->session()->flush();
     	return view("mlogin");
    }
    
    public function account ()
    {
    	$id = session('id');
    	$userpwd = "admin:admin";
    	if (session('logado')!= 1){
		return view("mlogin");
		}
		$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
    	
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios/".$id.$u);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		return view('usuarioAcc', array('result' => $result));
    }
    public function editacc($id)#ADMIN OU OWNER
    {
    	$userpwd = "admin:admin";
    	if (session('logado')!= 1){
    		
			return view("mlogin");
		}
		if ((session('adm') == false)&&$id != session('id')){
			
			return view("noadmin");
		}
		$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
    	$id = $_POST['usuarioid'];
	   	$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios/".$id.$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
	    

		$acc = true;
	    $result = curl_exec($ch);
	   // echo $result;
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	        return view("usuario_edit", compact ('result','acc' ));
    }
    public function listcoorduserevents()
    {
    	if (session('tcoord') != 1) {
		return view("noadmin");
		}
    	
    	$userpwd = "admin:admin";
    	
    	$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
    	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/eventos");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");

		$resulte = curl_exec($ch);
		
		$ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/coords".$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
	   
	    $resultc = curl_exec($ch);
		
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		
		
		return view('eventos_coord', compact('resulte','resultc'));
    }
    public function listcoordusereventsall()
    {
    	if (session('tcoord') != 1) {
		return view("noadmin");
		}
    	
    	$userpwd = "admin:admin";
    	
    	$idu = session('id');
		if (isset($idu)){
			$u = "?usuarioid=".$idu;
		}
    	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/eventos");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");

		$resulte = curl_exec($ch);
		
		$ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/coords".$u);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, "$userpwd");
	   
	    $resultc = curl_exec($ch);
		
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		
		
		return view('eventos_coord_all', compact('resulte','resultc'));
    }
    
    
}
