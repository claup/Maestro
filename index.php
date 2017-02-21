<?php session_start(); ?>
<?php if(!isset($_SESSION ['autenticado']) OR !$_SESSION ['autenticado']) { ?>
	<?php header('location:login.php');?>
<?php } ?>
			
<?php  include('header.php');  ?>

<?php 
$pagina=filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_STRING);
switch($pagina){
	case 'aluno': {include ('aluno_lista.php'); break;}
	case 'professor': {include ('professor_lista.php'); break;}
	case 'coordenador': {include ('coordenador_lista.php'); break;}
	case 'sair': {include ('sair.php'); break;}
	case 'usuarios':{include ('usuarios_lista.php'); break;}
	default:{include('dashboard.php');break;}
	}
	
?>


<?php  include('footer.php');  ?>

