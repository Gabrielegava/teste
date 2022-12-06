<html>
<head>
<link rel="stylesheet" href="style.css">

</head>
<body>
  <!-- TOPO -->
  <header>
  <form action="get">
    <input type="text" placeholder="Search.." name="search">
  </form>
  <div class="logo">
    <img src="aaaa.png" alt="imagem de logo">
  </div>
  <div class ="btnfuncao">
    <button onclick="location.href='publiadoção.php'" type="button" > <img src="pub.png" /></button>
   <button type="button"> <img src="perfil.png" /></button>
  </div>
</header>
  <!-- FIM TOPO -->

<?php
 
 session_start();
  //Caso o usuario nao esteja autenticado, limpa os dados da sessão e redireciona
  if(!isset($_SESSION['cliente'])){

	  session_destroy(); //Destrói
	  unset($_SESSION['cliente']); //Limpa a variavel de sessão
	  header('location:login.php'); //Redireciona para a página de login
  }
  else{

  echo '<table border="0" width="780px"><tr>';

  $sessao_cliente = $_SESSION['cliente']; //PEGA o codigo do cliente que tá armazenado na SESSÃO

//Função mysqli_result
function mysqli_result($search, $row, $field){
	$i=0; 
	while($results=mysqli_fetch_array($search)){
	if ($i==$row){
		$result=$results[$field];
	}
		$i++;
	}
	return $result;
} 

$qtde=12; //12 produtos por p�gina aparecer�o
$a=0; //vari�vel de controle

//tsesta o parametro pagina (no ultimo echo deste codigo)
// A função empty retornará true (verdadeiro) quando uma variável for vazia e false (falso) quando uma variável não for vazia.
if ( empty($_REQUEST["pagina"]) ){ 
 	$pagina = 1;
}else{
	$pagina = $_REQUEST["pagina"]; //mostra o numero da pagina selecionada (se houver + de 12 produtos)
}

include("conexao.php");

//selecione os campos de seu produto que deseja visualizar na compra /esse limit � para mostrar de 1 a 9; 10 a 18; ...(de 9 em 9)
$sql = "SELECT adc_id,adc_desc, adc_sexo, adc_porte, adc_raca, adc_idade,adc_foto FROM publi_adocao LIMIT ".($pagina-1)*$qtde.",".$qtde; 
	   
$consulta = mysqli_query($conn,$sql); //executa a consulta

echo '<table border="0" width="780px"><tr>
<div class="content">';

//esse while � para pegar linha a linha no BD os campos de dados
while($campo = mysqli_fetch_array($consulta)){

	// Após a incerção de dados, imprimir um card com as devidas informações
	echo '<form action="adotar.php" method="get">
	<td>
    
	<div class="container">
	<div class="card">
		<div class="card1">
			<div class="circle">
			<img src=./fotos/'.$campo["adc_foto"].' style="width:100%"></a><br>          
		</div>
		<h1>'.$campo["adc_raca"].'</h1>
			<p>'.$campo["adc_porte"].'<br>'.$campo["descricao"].'</p>
	
		<p><button type="submit" name="adc_id" class ="cardbutton" value="'.$campo["adc_id"].'">ADOTAR</button></p>
		
	</div>
	</div>

</td>
</form>';  

	$a++;
	
	
	// (o resto da divisao de $a 12 por 4 == 0) 
	if($a % 4 == 0) echo "</tr><tr>"; //entao a cada 4 produtos mostrados finaliza uma linha e cria outra
}

	echo "</tr></table> </div>"; //finaliza a tabela

	$sql = "SELECT count(adc_id) as cont FROM publi_adocao"; // SQL p/ contar quantos produtos existem no BD
	$consulta = mysqli_query($conn,$sql); //executa a consulta
	
	$total=mysqli_result($consulta, 0, 'cont');//este comando pega a quantidade retornada pela consulta
	
	$paginas = ceil($total / $qtde); //divide a quantidade por 9 para saber em quantas p�ginas aparecer�o os produtos
	for ($i=1;$i<=$paginas;$i++) {
		if ($i==$pagina) //se for somente 1 pagina nao precisa de links
			echo "<p style='text-align:center;color:black;font-size:25px;'>".$i."</p>"." ";
		else
			echo "<a href=?pagina=".$i."><p style='text-align:center;color:black;font-size:25px;'>".$i."</p></a> "; //se forem varias paginas, faz os links
	}
	mysqli_close($conn); //fecha a conex�o

?>