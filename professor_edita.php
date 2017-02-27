<?php
$id=filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$unidade=filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_STRING);
$disciplina=filter_input(INPUT_POST, 'disciplina', FILTER_SANITIZE_STRING);

if(!$id){
	$mensagem='Informe o id';
	header("location:/maestro/professor_lista.php?msg=$mensagem&menu=professor&formulario=0");
}elseif(!$nome){
	$mensagem='Informe o nome';
	header("location:/maestro/professor_lista.php?msg=$mensagem&menu=professor&formulario=0");
}elseif(!$email){
	$mensagem='Informe o e-mail';
	header("location:/maestro/professor_lista.php?msg=$mensagem&menu=professor&formulario=0");
}elseif(!$unidade){
	$mensagem='Informe a unidade';
	header("location:/maestro/professor_lista.php?msg=$mensagem&menu=professor&formulario=0");
}elseif(!$disciplina){
	$mensagem='Informe a disciplina';
	header("location:/maestro/professor_lista.php?msg=$mensagem&menu=professor&formulario=0");

}else{
	$buffer = array ();
	// abrir o arquivo
	$ponteiroArquivo = fopen ( 'arquivo_professor.txt', 'r' );
	// manipular arquivo
	while ( ! feof ( $ponteiroArquivo ) ) {
		$linha = fgets ( $ponteiroArquivo, 1024 );
		$linhaAtual = explode (';', $linha );
		if ($linhaAtual[0] != $id) {
			$buffer[] = $linha;
		}else{
			$buffer[] = "$id;$nome;$email;$unidade;$disciplina";
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

	$mensagem = 'Ediçao realizada com sucesso';
	header("location:/maestro/professor_lista.php?msg=$mensagem&menu=professor&formulario=0");
}
?>


