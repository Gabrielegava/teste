<?php
if( empty($_FILES['foto']) ){ //se nao houver fotos na interface
	$foto = null;
	echo "dentro do if";
}
else{ 
	$foto = $_FILES['foto']; //senão, lê a foto e joga na variavel
}

if(!empty($foto["tmp_name"])) {
	echo "dentro do 2° if";
	$nome_arquivo = "adocao".$codadocao.".jpg"; //o nome do arquivo(adocao+codadocao.jpg)
	$sql = "UPDATE publi_adocao SET adc_foto = '".$nome_arquivo."' WHERE adc_id=".$codadocao;

	echo $sql;

	$consulta = mysqli_query($conn,$sql); //executa o sql
	
	if (is_uploaded_file($foto["tmp_name"])){ //faz o upload, se ok
		move_uploaded_file($foto["tmp_name"],"./fotos/".$nome_arquivo); //move para a pasta fotos
	}
	else{
		$msg = "erro ao fazer upload.<br>"; //aqui
	}
}
?>
  