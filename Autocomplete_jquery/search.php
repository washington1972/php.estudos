<?php 
	$connect = mysqli_connect("localhost", "root","", "bd_dgal");
	if (isset($_POST["query"])) {
		$output = '';
		$query = "SELECT * FROM orgao_origem WHERE concat(sigla_externo, descricao) LIKE '%".$_POST["query"]."%' ORDER BY sigla_externo asc";

		$result = mysqli_query($connect, $query);

		$output = '<ul class="list-unstyled">';
		if (mysqli_num_rows($result) > 0) 
		{
			while ($row = mysqli_fetch_array($result)) 
			{
				$output .= '<li>'.$row["sigla_externo"]."-".$row["descricao"].'</li>';
			}
		}else{
			$output .= '<li> Sigla de OBM NAO encontrada </li>';
		}
		$output .='</ul>';

		echo utf8_encode($output);
	}	
?>