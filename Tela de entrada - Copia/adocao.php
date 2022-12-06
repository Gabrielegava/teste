<?php

//inicia a sessão
session_start();

//compara se usuário está conectado, se não estiver, redireciona para tela de entrada
if(! isset($_SESSION['cliente'])){
	
	session_destroy();
	unset($_SESSION['cliente']);
	header('location:telaentrada.php');
}
else{

 	include("conexao.php"); //puxa o arquivo da conexão

	//recebe valores do login e do animal a ser adotado
	$adotante = $_POST['adotante'];
    $adc_id = $_GET['id'];
	
	
	$dado = $_GET['id']; //pegando o valor passado por parâmetro pela URL
	
	//altera o status do animal para adotado
	$alteracao = "UPDATE publi_adocao 
				  SET adotante='$adotante', adc_status=0 
				  WHERE adc_id='$adc_id'";
	
	//retorna a tela de entrada após a adoção
	if (mysqli_query($conn,$alteracao))
		{
			echo"<script>
			window.alert('Dados Alterados com Sucesso.');
			location.href='telaentrada.php'; 
			</script>"; 
    	}
		else{
			echo"<script>
			window.alert('Erro na alteração');
			location.href='telaentrada.php'; 
			</script>"; 
		}	  
	}
?>
