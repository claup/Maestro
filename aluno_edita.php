<?php

$id=filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

$nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

if(!$id){
	$mensagem='Informe o id';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");
}elseif(!$nome){
	$mensagem='Informe o nome';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");
}elseif(!$email){
	$mensagem='Informe o e-mail';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");
}else{

	$buffer = array ();

	// abrir o arquivo
	$ponteiroArquivo = fopen ( 'arquivo_aluno.txt', 'r' );

	// manipular arquivo
	while ( ! feof ( $ponteiroArquivo ) ) {
		$linha = fgets ( $ponteiroArquivo, 1024 );

		$linhaAtual = explode (';', $linha );

		if ($linhaAtual[0] != $id) {
			$buffer[] = $linha;
		}else{
			$buffer[] = "$id;$nome;$email";
		}
	}
	
	// fechar arquivo
	fclose ( $ponteiroArquivo );
	
	//abrir arquivo
	$ponteiroArquivo1 = fopen ('arquivo_aluno.txt', 'w');

	//escrever no arquivo
	foreach ($buffer as $linha1) {
		fwrite ($ponteiroArquivo1, $linha1);
	}

	//fechar arquivo
	fclose ( $ponteiroArquivo1 );
		
	$mensagem = 'Edição realizada com sucesso';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");
}

?>
