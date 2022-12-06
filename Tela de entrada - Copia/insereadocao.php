<?php
	include("conexao.php"); //puxa o arquivo da conex�o
	
	$sexo   = $_POST['sexo'];
	$porte  = $_POST['porte'];
	$raca   = $_POST['raca'];
	$idade  = $_POST['idade'];
    $descricao = $_POST['descricao'];
    $foto      = $_FILES["foto"]; //$_FILES para ler fotos

	$data = date('Y-m-d');
	
	$sql = "INSERT INTO publi_adocao (adc_sexo, adc_porte, adc_raca, adc_idade, adc_desc, adc_status, adc_data ) 
    		VALUES ($sexo,'$porte','$raca','$idade','$descricao', 1, '$data' )"; 

		$consulta = mysqli_query($conn,$sql);

		$codadocao = mysqli_insert_id($conn); //pega o campo chave da tabela (vai ser usado em upload)
		
		//neste ponto chama o arquivo para fazer o upload da foto
        include("upload.php");

        mysqli_close($conexao); //fecha a conexao
		
		//redireciona para a pagina de cadastro de produto mandando uma mensagem
		echo "<script>parent.document.location='telaentrada.php'></script>";		
		header("location:publiadoção.php?msg=Produto cadastrado com sucesso!");

?>


