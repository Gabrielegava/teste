<?php
//$l = preg_replace('/[^[:alnum:]_]/', '',$_POST['l']);
//$s = preg_replace('/[^[:alnum:]_]/', '',$_POST['s']);
// as variáveis login e senha recebem os dados digitados na página anterior
$l = $_POST['l'];
$s = $_POST['s'];

include('conexao.php');

//Comando SQL de verificação de autenticação
$sql = "SELECT cliente_email, cliente_senha FROM cliente WHERE cliente_email = '$l' AND cliente_senha = '$s'";

$resultado = mysqli_query($conn,$sql);

 //Caso consiga logar cria a sessão -> mysql_num_rows() é uma função que conta se retornou algum registro da tabela
if (mysqli_num_rows ($resultado) > 0) {
    // session_start inicia a sessão
    session_start();
	
    $_SESSION['cliente'] = $l; //armazena na sessão o LOGIN
	
	//Se precisar deletar um cookie definido anteriormente é só fazer: setcookie('usuario'); e não colocar valor pra ele
	header('location:telaentrada.php');
}
 
//Caso contrário redireciona para a página de autenticação
else {
   echo '<script>
		window.alert("Usuário/senha incorretos");
		location.href="login.html";
		</script>';	 //Redireciona para a página de autenticação
}  
?>
