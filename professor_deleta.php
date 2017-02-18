<?php
$id = filter_input ( INPUT_GET, 'id', FILTER_VALIDATE_INT );
if ($id) {

	$buffer = array ();

	// abrir o arquivo
	$ponteiroArquivo = fopen ( 'arquivo_professor.txt', 'r' );

	// manipular arquivo
	while ( ! feof ( $ponteiroArquivo ) ) {
		$linha = fgets ( $ponteiroArquivo, 1024 );

		$linhaAtual = explode (';', $linha );

		if ($linhaAtual[0] != $id) {
			$buffer[] = $linha;
		}
	}
	// fechar arquivo
	fclose ( $ponteiroArquivo );

	//abrir arquivo
	$ponteiroArquivo1 = fopen ('arquivo_professor.txt', 'w');

	//escrever no arquivo
	foreach ($buffer as $linha1) {
		fwrite ($ponteiroArquivo1, $linha1);
	}

	//fechar arquivo
	fclose ( $ponteiroArquivo1 );
	$mensagem = 'Exclus�o realizado com sucesso';
	header("location:/maestro/professor_lista.php?msg=$mensagem&menu=professor&formulario=0");
}else{
	$mensagem = 'Informe um ID para deletar';
	header("location:/maestro/professor_lista.php?msg=$mensagem&menu=professor&formulario=0");
}
?>

