<?php  
require_once("../db/db_conexao.php");

function listar_registros_array(){
/** recebe todos os registros */
	global $conexao;

	$lista_registros = [];
	$query_listar_reg = "SELECT * FROM registro ORDER BY id_registro DESC;";
	$r_listar_reg = mysqli_query($conexao, $query_listar_reg);
	if(!$r_listar_reg){
		print("Erro: " . mysqli_error($conexao));
	} else {
		if (mysqli_num_rows($r_listar_reg) > 0) {
		    // saída dos dados de cada coluna
		    while($coluna = mysqli_fetch_assoc($r_listar_reg)){
		    	array_push($lista_registros, $coluna);
		    }
		    return $lista_registros;
		    
		}
	}
}

function id_colaborador_pelo_id_registro($id_registro){
	/** retorna o id_colaborador atrelado a um id_registro */
	global $conexao;
	$query_listar_reg = "SELECT id_registro, id_colaborador FROM registro";
	$r_listar_reg = mysqli_query($conexao, $query_listar_reg);
	if(!$r_listar_reg){
		print("Erro: " . mysqli_error($conexao));
	} else {
		if (mysqli_num_rows($r_listar_reg) > 0) {
		    // saída dos dados de cada coluna
		    while($coluna = mysqli_fetch_assoc($r_listar_reg)){
		    	# se o id_registro do banco bate com o recebido na função
		    	# retorna o campo id_colaborador
		    	if($coluna['id_registro'] == $id_registro){
		    		return $coluna['id_colaborador'];
		    	}
		    	
		    }
		    
		    
		}
	}
}

function hora_entrada_pelo_id_registro($id_registro){
	/** retorna a hora de entrada de um certo $id_registro */
	global $conexao;
	$query_listar_reg = "SELECT id_registro, hora_entrada FROM registro";
	$r_listar_reg = mysqli_query($conexao, $query_listar_reg);
	if(!$r_listar_reg){
		print("Erro: " . mysqli_error($conexao));
	} else {
		if (mysqli_num_rows($r_listar_reg) > 0) {
		    // saída dos dados de cada coluna
		    while($coluna = mysqli_fetch_assoc($r_listar_reg)){
		    	# se o id_registro do banco bate com o recebido na função
		    	# retorna o campo id_colaborador
		    	if($coluna['id_registro'] == $id_registro){
		    		return $coluna['hora_entrada'];
		    	}
		    	
		    }
		    
		    
		}
	}
}

function hora_saida_pelo_id_registro($id_registro){
	/** retorna a hora de saida de um certo $id_registro */
	global $conexao;
	$query_listar_reg = "SELECT id_registro, hora_saida FROM registro";
	$r_listar_reg = mysqli_query($conexao, $query_listar_reg);
	if(!$r_listar_reg){
		print("Erro: " . mysqli_error($conexao));
	} else {
		if (mysqli_num_rows($r_listar_reg) > 0) {
		    // saída dos dados de cada coluna
		    while($coluna = mysqli_fetch_assoc($r_listar_reg)){
		    	# se o id_registro do banco bate com o recebido na função
		    	# retorna o campo id_colaborador
		    	if($coluna['id_registro'] == $id_registro){
		    		return $coluna['hora_saida'];
		    	}
		    	
		    }
		    
		    
		}
	}
}

function registro_colaboradores_com_entrada_sem_saida($id){
	/** recebe um id de colaborador, retorna o id do registro se ele tiver uma entrada e não uma saída */

	$lista_colaboradores_sem_saida_camara = [];
	global $conexao;
	$query_listar_reg = "SELECT * FROM registro";
	$r_listar_reg = mysqli_query($conexao, $query_listar_reg);
	if(!$r_listar_reg){
		print("Erro: " . mysqli_error($conexao));
	} else {
		if (mysqli_num_rows($r_listar_reg) > 0) {
		    // saída dos dados de cada coluna
		    while($coluna = mysqli_fetch_assoc($r_listar_reg)){
		    	# se há um registro de entrada, mas nenhum de saída
		    	if($coluna['hora_entrada'] != NULL & $coluna['hora_saida'] == NULL){
		    		return $coluna['id_registro'];
		    	}
		    	
		    }
		    
		    
		}
	}
}



function lista_colaboradores_na_camara(){
	/** retorna um array com os ids de todos os colaboradores que tem entrada mas não uma saída na câmara */

	$lista_colaboradores_sem_saida_camara = [];
	global $conexao;
	$query_listar_reg = "SELECT * FROM registro";
	$r_listar_reg = mysqli_query($conexao, $query_listar_reg);
	if(!$r_listar_reg){
		print("Erro: " . mysqli_error($conexao));
	} else {
		if (mysqli_num_rows($r_listar_reg) > 0) {
		    // saída dos dados de cada coluna
		    while($coluna = mysqli_fetch_assoc($r_listar_reg)){
		    	# se há um registro de entrada, mas nenhum de saída
		    	if($coluna['hora_entrada'] != NULL & $coluna['hora_saida'] == NULL){
		    		array_push($lista_colaboradores_sem_saida_camara, $coluna['id_colaborador']);
		    	}
		    	
		    }
		    
		    
		}
	}
}

function lista_registros_por_colaborador($id_colaborador){
	/** retorna um array com os ids de todos os registros de um colaborador*/

	$lista_registros_por_colaborador = [];
	global $conexao;
	$query_listar_reg = "SELECT id_registro, id_colaborador FROM registro";
	$r_listar_reg = mysqli_query($conexao, $query_listar_reg);
	if(!$r_listar_reg){
		print("Erro: " . mysqli_error($conexao));
	} else {
		if (mysqli_num_rows($r_listar_reg) > 0) {
		    // saída dos dados de cada coluna
		    while($coluna = mysqli_fetch_assoc($r_listar_reg)){
		    	# se há um registro de entrada, mas nenhum de saída
		    	if($coluna['id_colaborador'] == $id_colaborador){
		    		array_push($lista_registros_por_colaborador, $coluna['id_registro']);
		    	}
		    	
		    }
		    
		    
		}
	}
}

?>