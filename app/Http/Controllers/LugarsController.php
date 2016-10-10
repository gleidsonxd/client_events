<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LugarsController extends Controller
{
    public function create()
    {
    	$u = "lugar[nome]=".$_POST['nome']."&lugar[quantidade]=".$_POST['quantidade']."&usuarioid="."4";
    	 ///echo "$u";
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/lugars");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "$u");
		curl_setopt($ch, CURLOPT_POST, 1);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		return view("index");

    }
	public function listAll()
	{
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/lugars");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "usuarioid=4");
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		return view('lugars', array('result' => $result));
	}
	public function read($id)
	{
		// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/lugars/".$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "usuarioid=4");
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		return view('lugarU', array('result' => $result));
	}
	public function edit()
	{
		$id = $_POST['lugarid'];
	   	$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/lugars/".$id);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, "usuarioid=4");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


	    $result = curl_exec($ch);
	   // echo $result;
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	    // $pessoa = pessoa::find($id);
	        return view("lugar_edit", array('result' => $result));
	}
	public function update($id)
	{
		$u = "lugar[nome]=".$_POST['nome']."&lugar[quantidade]=".$_POST['quantidade']."&usuarioid="."4";

	// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/lugars/".$id);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, "$u");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");


	    $result = curl_exec($ch);
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }else{
	    	echo $result;
	    }
	    curl_close ($ch);

	    echo "<br><br><a href='/'>Volta</a>";
	}
	public function delete($id)
	{

	    // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, "eventos-gleidsonxd.c9users.io/lugars/".$id);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, "usuarioid=4");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");


	    $result = curl_exec($ch);
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }else{
	    	echo $result;
	    }
	    curl_close ($ch);
	    echo "<br><br><a href='/'>Volta</a>";
	}

}
