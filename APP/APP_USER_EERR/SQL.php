<?php
	function get_escenarios()
	{
		$SQL = "EXEC EERR_ESCENARIOS"; 
		return get_sql_adoDb($SQL);	
	}
	function get_jerarquia_ctacble()
	{
		include('../../MASTER/include/verifyAPP.php');
		$id_usuario		= $vari[0]; 
		//$id_usuario	= 218;
		
		$SQL = "EXEC [EERR_JERARQUIA_CUENTASCONTABLES] ".$id_usuario.""; 
		return get_sql_adoDb($SQL);	
	}
	function get_total_ctacble()
	{
		include('../../MASTER/include/verifyAPP.php');
		
		$agno 			= 	date("Y"); 
		$id_usuario		= 	$vari[0]; 
		//$id_usuario	= 218;
		
		$SQL = "EXEC [EERR_TOTAL_CUENTASCONTABLES] ".$agno.", ".$id_usuario." "; 
		return get_sql_adoDb($SQL);	
	}
	function get_total_ctacble_otec()
	{
		include('../../MASTER/include/verifyAPP.php');
		
		$agno 			= 	date("Y"); 
		$id_usuario		= 	$vari[0]; 
		//$id_usuario	= 218;
		
		$SQL = "EXEC [EERR_TOTAL_CUENTASCONTABLES_OTEC] ".$agno.", ".$id_usuario." "; 
		return get_sql_adoDb($SQL);	
	}
	function get_total_agrupadores()
	{
		include('../../MASTER/include/verifyAPP.php');
		$agno 	= 	date("Y");  
		$id_usuario		= 	$vari[0]; 
		
		$SQL = "EXEC EERR_TOTAL_AGRUPADORES ".$agno.", ".$id_usuario.""; 
		return get_sql_adoDb($SQL);	
	} 
	function get_total_agrupadores_otec()
	{
		include('../../MASTER/include/verifyAPP.php');
		$agno 	= 	date("Y");  
		$id_usuario		= 	$vari[0]; 
		
		$SQL = "EXEC EERR_TOTAL_AGRUPADORES_OTEC ".$agno.", ".$id_usuario.""; 
		return get_sql_adoDb($SQL);	
	} 
	
	function get_total_ctacble_search()
	{
		include('../../MASTER/include/verifyAPP.php');
		
		// A�O SELECCIONADO 
		if ($_GET['agno'] != '')
			$agno 	= 	$_GET['agno']; 
		else 
			$agno 	= 	''; 
			
		// MESES SELECCIONADOS 
		if ($_GET["meses"] == 'Todo')
		$meses 			= 	''; 
		else 
		$meses 			= 	$_GET["meses"];  
		
		// SEDE SELECCIONADA
		if ($_GET['N1'] != '')
			$sede		= 	$_GET['N1']; 
		else 
			$sede 		= 	''; 
		
		// ID PADRE CENTRO DE COSTO
		if ($_GET['IDP_CC'] != '')
			$IDP_CC	= 	$_GET['IDP_CC'];  
		else 
			$IDP_CC = 	''; 
			
		// CENTROS DE COSTO SELECCIONADOS 
		if ($_GET['CC'] != '')
			$CC		= 	$_GET["CC"];  
		else 
			$CC 	= 	''; 
			
		// ID USUARIO QUE INICI� SESI�N 
		$id_usuario		= 	$vari[0];
		 
		$SQL = "EXEC [EERR_TOTAL_CUENTASCONTABLES_SEARCH] ".$agno.", '".$meses."', '".$sede."', '".$IDP_CC."', '".$CC."', ".$id_usuario." "; 
		
		//echo $SQL; 
		return get_sql_adoDb($SQL);	
	}
	function get_total_agrupadores_search()
	{
		include('../../MASTER/include/verifyAPP.php');
		// A�O SELECCIONADO 
		if ($_GET['agno'] != '')
			$agno 	= 	$_GET['agno']; 
		else 
			$agno 	= 	''; 
		
		// MESES SELECCIONADOS 
		if ($_GET["meses"] == 'Todo')
		$meses 			= 	''; 
		else 
		$meses 			= 	$_GET["meses"]; 
		
		// SEDE SELECCIONADA
		if ($_GET['N1'] != '')
			$sede		= 	$_GET['N1']; 
		else 
			$sede 		= 	''; 
			
		// ID PADRE CENTRO DE COSTO
		if ($_GET['IDP_CC'] != '')
			$IDP_CC	= 	$_GET['IDP_CC']; 
		else  
			$IDP_CC	= ''; 
		
		// CENTROS DE COSTO SELECCIONADOS 
		if ($_GET['CC'] != '')
			$CC		= 	$_GET["CC"];  
		else 
			$CC 	= ''; 
			
		// ID USUARIO QUE INICI� SESI�N 
		$id_usuario		= 	$vari[0];
			
		$SQL = "EXEC EERR_TOTAL_AGRUPADORES_SEARCH ".$agno.", '".$meses."', '".$sede."', '".$IDP_CC."', '".$CC."', ".$id_usuario." "; 
		return get_sql_adoDb($SQL);	
	} 
	
	function get_total_escenarios()
	{
		$SQL = "SELECT COUNT(*) FROM PPTO_Scenarios WHERE estado <> 0"; 	
		return get_sql_adoDb($SQL);	
	}
?>