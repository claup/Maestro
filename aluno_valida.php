<?php

$id=filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

$nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

if(!$id){
	$mensagem='Informe o id';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=1");
}elseif(!$nome){
	$mensagem='Informe o nome';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=1");
}elseif(!$email){
	$mensagem='Informe o e-mail';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=1");
}else{
	var_dump($id);  	// false
	var_dump($nome); 	//''
	var_dump($email);	//''
	
	$arquivo = array();
	$fd = fopen ("arquivo_aluno.txt", "a");
	fwrite	($fd, "$id;$nome;$email\n");
	fclose ($fd);
}




/*if (isset ($_POST['id']))
{
	$id=$_POST['id'];
}else{
	$id=null;
}

if (isset ($_POST['nome']))
{
	$nome=$_POST['nome'];
}else{
	$nome=null;
}

if (isset ($_POST['email']))
{
	$email=$_POST['email'];
}else{
	$email=null;
}


if ($id!=null &&$nome!=null && $email!=null)
{
	if (trim($id) == '' OR !is_int($id)) {
		$mensagem='Informe o id';
		header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=1");
	} elseif (trim($nome) == '' OR !is_string($nome)) {
		$mensagem='Informe o nome';
		header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=1");
	} elseif (trim($email) == '' OR !is_string($email)) {
		$mensagem='Informe o e-mail';
		header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=1");
	} else {
		//armazenando os dados em um arquivo
	}
}else{
	$mensagem='Informe os dados';
header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=1");
}
*/


