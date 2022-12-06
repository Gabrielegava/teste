<?php

$host = '10.67.22.216'; //local do servidor
$usr = "m120_tcc_g3_us";  //usuario
$senha = "tot097"; //senha
$bd = "m120_tcc_g3_bd"; //nome do BD

//Realizando a conexão com o MySQL
$conn = @mysqli_connect($host, $usr, $senha, $bd);

if($conn){
    @mysqli_select_db($conn, $bd);    
}
else{
    print('Erro na conexão');
}


?>