<table border="0" width="780px"><tr>
<?php

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

$qtde=9; //9 produtos por p�gina aparecer�o
$a=0; //vari�vel de controle

//tsesta o parametro pagina (no ultimo echo deste codigo)
if ( empty($_REQUEST["pagina"]) ){ 
 	$pagina = 1;
}else{
	$pagina = $_REQUEST["pagina"]; //mostra o numero da pagina selecionada (se houver + de 9 produtos)
}

include("conexao.php");

//selecione os campos de seu produto que deseja visualizar na compra /esse limit � para mostrar de 1 a 9; 10 a 18; ...(de 9 em 9)
$sql = "SELECT codprod,detalhes,precocusto,foto FROM produto LIMIT ".($pagina-1)*$qtde.",".$qtde; 
	   
$consulta = mysqli_query($conn,$sql); //executa a consulta

//esse while � para pegar linha a linha no BD os campos de dados
while($campo = mysqli_fetch_array($consulta)){
	//cria uma linha da tabela <td> e mostra a foto, o nome e o preco do produto
	echo "<td align=center width=250><br><br>".
	//mostra a foto pegando o campo no BD chamado foto campo["foto"]
	"<img src=./fotos/".$campo["foto"]." border=0 height=120 width=120></a><br>".
	//mostra o nome do produto campo["nome"] em azul e negrito
	"<br><font color=blue><b>".$campo["detalhes"]."</b></font><br>".
	//mostra o preco do produto campo["preco"] formatando para aparecer na tela com , e nao com .
	"Por: R$ ".number_format($campo["precocusto"],2,',','.')."<br>".
	//coloca um link para adicionar ao carrinho e passa como parametro o campo["codigo do produto"]
	"<a href=adicionar_carrinho.php?codprod=".$campo["codprod"].">Adicionar ao carrinho</a><br></td>";
	
	$a++;
	
	// (o resto da divisao de $a 9 por 3 == 0) 
	if($a % 3 == 0) echo "</tr><tr>"; //entao a cada 3 produtos mostrados finaliza uma linha e cria outra
}

	echo "</tr></table>"; //finaliza a tabela

	$sql = "SELECT count(codprod) as cont FROM produto"; // SQL p/ contar quantos produtos existem no BD
	$consulta = mysqli_query($conn,$sql); //executa a consulta
	
	$total=mysqli_result($consulta, 0, 'cont');//este comando pega a quantidade retornada pela consulta
	
	$paginas = ceil($total / $qtde); //divide a quantidade por 9 para saber em quantas p�ginas aparecer�o os produtos
	for ($i=1;$i<=$paginas;$i++) {
		if ($i==$pagina) //se for somente 1 pagina nao precisa de links
			echo $i." ";
		else
			echo "<a href=?pagina=".$i.">".$i."</a> "; //se forem varias paginas, faz os links
	}
	mysqli_close($conn); //fecha a conex�o
?>