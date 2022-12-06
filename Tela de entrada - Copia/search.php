<?php
    include("conexao.php");

    $pesquisar = $_POST['search'];
    $result_pet = "SELECT * FROM publiadocao WHERE adc_raca, adc_porte LIKE '%$search%' LIMIT 12";
    $resultado_search = mysqli_query($conn, $result_pet);
    
    while($rows_cursos = mysqli_fetch_array($resultado_search)){
        echo '<form action="search.php" method="get">
	<td>
    
	<div class="container">
	<div class="card">
		<div class="card1">
			<div class="circle">
			<img src=./fotos/'.$campo["adc_foto"].' style="width:100%"></a><br>          
		</div>
		<h1>'.$campo["adc_raca"].'</h1>
			<p>'.$campo["adc_porte"].'<br>'.$campo["descricao"].'</p>
	
		
			<p><a href="https://whatsa.me/5514999044933"><img 
			src="https://i.imgur.com/ryESuZ5.png" class="whats" data-selector="img"></a>
			<button type="submit" name="adc_id" class="cardbutton" value="'.$campo["adc_id"].'"> ADOTAR </button> </p>
		
	</div>
	</div>

</td>
</form>';
    }
?>