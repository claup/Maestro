<?php

$id_curso=filter_input(INPUT_POST, 'id_curso', FILTER_VALIDATE_INT);

$curso=filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);

$carga_horaria=filter_input(INPUT_POST, 'carga_horaria', FILTER_SANITIZE_STRING);

$data_inicio=filter_input(INPUT_POST, 'data_inicio', FILTER_SANITIZE_STRING);

$data_fim=filter_input(INPUT_POST, 'data_fim', FILTER_SANITIZE_STRING);

$professor=filter_input(INPUT_POST, 'professor', FILTER_SANITIZE_STRING);


if(!$id_curso){
	$mensagem='Informe o id do curso';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");
	
}elseif(!$curso){
	$mensagem='Informe o curso';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");
	
}elseif(!$carga_horaria){
	$mensagem='Informe a carga horaria';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");
	
}elseif(!$data_inicio){
	$mensagem='Informe a data de inicio';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");
		
}elseif(!$data_fim){
	$mensagem='Informe a data de encerramento';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");
	
}elseif(!$professor){
	$mensagem='Informe o professor';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");
	
}else{

	$buffer = array ();

	// abrir o arquivo
	$ponteiroArquivo = fopen ( 'arquivo_curso.txt', 'r' );

	// manipular arquivo
	while ( ! feof ( $ponteiroArquivo ) ) {
		$linha = fgets ( $ponteiroArquivo, 1024 );

		$linhaAtual = explode (';', $linha );

		if ($linhaAtual[0] != $id) {
			$buffer[] = $linha;
		}else{
			$buffer[] = "$id_curso;$curso;$carga_horaria;$data_inicio;$data_fim;$professor";
		}
	}

	// fechar arquivo
	fclose ( $ponteiroArquivo );

	//abrir arquivo
	$ponteiroArquivo1 = fopen ('arquivo_curso.txt', 'w');

	//escrever no arquivo
	foreach ($buffer as $linha1) {
		fwrite ($ponteiroArquivo1, $linha1);
	}

	//fechar arquivo
	fclose ( $ponteiroArquivo1 );

	$mensagem = 'Edição realizada com sucesso';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");
}

?>
