<?php 

session_start();

// obter os dados
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

// verificar se foram informados

$mensagem='';

if (!$usuario) {
	// informar para preencher o usuário
	$mensagem='Informe o usuário';

}elseif (!$senha){
	// informar para preencher a senha
	$mensagem='Informe a senha';

}else{
	// verificar se existem usuário e senha informados
	if($usuario == 'cabral' && $senha='brasil'){
		$_SESSION['autenticado'] = true;
		header('location: index.php?pagina=dashboard');
	}else{
		$mensagem = 'Usuário ou senha incorretos';
	}
}

?>

<html>
	<head>
		<title>Autenticação</title>
	</head>
	
	<body>
		<p> <?php echo $mensagem; ?></p>
		<form method="post">
			<label>Usuário</label>
			<input type="text" name="usuario" value="<?php echo $usuario?>"/>
			<label>Senha</label>
			<input type="password" name="senha"/>
			
			<button type="submit">Acessar</button>		
		
		</form> 
	</body>	
</html>
