<?php
	$data = $_POST['aoData'];
	
	$sEcho = 0;
	$iDisplayStart = 0; // 起始索引
	$iDisplayLength = 0;//分页长度
	$datalist = json_decode($data);
   
    foreach($datalist as $value){
    // var_export($value);
			if($value->name=="sEcho"){
					
			    $sEcho=$value->value;
		  }
		  if($value->name=="iDisplayStart"){
			  	
			    $iDisplayStart=$value->value;
		  }
		  if($value->name=="iDisplayLength"){
			    $iDisplayLength=$value->value;
		  }
    	}
    	
    
	
	//include ("conex.php");
	$db = new PDO("mysql:dbname=usuarios;host=127.0.0.1","root","123456");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    // 设置sql语句查询如果出现问题
	$consulta = "SELECT * FROM usuarios limit ".$iDisplayStart.",".$iDisplayLength;
	$registro = $db->query($consulta);
	$count = $db->query('select count(*) as c from usuarios');
	$ss = $count->fetchColumn();
	
	$tabla = "";
	while($row=$registro->fetch()){		
		$editar = '<a href=\"edicionUsuario.php?a='.$row['Login'].'&b='.$row['Password'].'&c='.$row['Nombre'].'&d='.$row['TipoLogin'].'&e='.$row['status'].'\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>';
		$eliminar = '<a href=\"actionDelete.php?id='.$row['Login'].'\" onclick=\"return confirm(\'¿Seguro que desea eliminiar este usuario?\')\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\" class=\"btn btn-danger\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>';
		
		$tabla.='{
				  "login":"'.$row['Login'].'",
				  "password":"'.$row['Password'].'",
				  "name":"'.$row['Nombre'].'",
				  "type":"'.$row['TipoLogin'].'",
				  "status":"'.$row['status'].'",
				  "acciones":"'.$editar.$eliminar.'"
				},';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"sEcho":'.$sEcho.',"iTotalRecords":'.$ss.',"iTotalDisplayRecords":'.$ss.',"data":['.$tabla.']}';	

?>