<?php $sair = filter_input(INPUT_POST, 'sair', FILTER_VALIDATE_INT);?>
<?php if($sair == 1) {?>
	<?php session_destroy();?>
	<?php header('location:login.php');?>
<?php } ?>

<div class="row">
<h1>Sair</h1>
<ol class="breadcrumb">
<li><a href="#">Maestro</a></li>
<li class="active">Sair</li>
</ol>
</div>

<div class="row">
	<form action="index.php?pagina=sair" method="post">
		<h1> Voce deseja realmente sair? </h1>
		<button type="submit" class="btn btn-default" name="sair" value="1">SIM</button>
		<a href="index.php?pagina=dashboard" class="btn btn-default">NÃO</a>
	</form>
</div>