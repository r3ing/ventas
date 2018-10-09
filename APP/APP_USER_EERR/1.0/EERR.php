<?php
	include('../../MASTER/include/verifyAPP.php');
	
	include ("../../../../lib/adodb/adodb.inc.php");
	include('../../MASTER/config/conect.php');			
?> 
<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head> 
<link rel="stylesheet" type="text/css" href="css/jquery.treeTable.css" media="screen" />
<style> 
	#tree { 
		width: 100%;
		overflow: auto;
		border: 1px solid #888;
		border-collapse: collapse;
		
	}
	
	#tree thead {
		background: url(images/bg-table-thead.png) repeat-x scroll left top #AAAAAA
		
	}
	#tree thead th {
		padding-left: 2em;
		text-align: left;
		font-family:Verdana, Arial, Helvetica, sans-serif; 
		font-size:12px; 
	}
	
	#tree tbody td {
		width: 33%;
		padding-left: 2em;
		font-family:Verdana, Arial, Helvetica, sans-serif; 
		font-size:12px; 
	}
	
	
	#tree span {
		background-position: left center;
		background-repeat: no-repeat;
		padding: 0.2em 0 0.2em 1.5em;
	}
	#tree span.folder {
		background-image: url(images/folder.png);
	}
	#tree span.file {
		background-image: url(images/page_white_text.png);
	}
	#tree span.rar {
		background-image: url(images/rar.png);
	}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>  
<!-- <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>  -->
 
<script src="js/jquery.treeTable.js" type="text/javascript"></script> 
 
<script type="text/javascript">
	$(document).ready(
		function() {
			$("#tree").treeTable();
			//$("#tree").treeTable("expandNode", "2");  
		}
	);
</script>
<?php 
	include ("../HEAD.php"); 
?>  
<!-- MODAL -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" type="text/javascript" charset="utf-8"></script>

 	<script src="js/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="highlight/jquery.modal.css" type="text/css" media="screen" />
	
	<script src="highlight/highlight.pack.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8"> hljs.initHighlightingOnLoad(); </script>
	<link rel="stylesheet" href="highlight/github.css" type="text/css" media="screen" />
  
   	<style type="text/css" media="screen"> 
		body { font: normal 18px/1.6 'Open Sans', "Helvetica Neue", Arial, sans-serif; font-weight: 300; color: #777; padding: 2em 5%; width: 80%; max-width: 1500px; margin: 0 auto; background: #fff; }
		small { color: #aaa; }
		h1,h2,h3,h4 { color: #444; font-weight: 700; font-size: 1.6em; letter-spacing: -1px; }
		p code, li code {background:#ffffcc; color: #444; }
		pre { font-size: 12px; line-height: 18px; }
		pre code { overflow: scroll; padding: 1em; border-radius: 10px; }
		hr { height: 10px; background: #eee; border: none; }
 
	
		body > .modal {
		  display: none; 
		}
	
		/* Example 2 (login form) */
		.login_form.modal {
		  border-radius: 0;
		  line-height: 18px;
		  padding: 0;
		  font-family: "Lucida Grande", Verdana, sans-serif;
		}
	
		.login_form h3 {
		  margin: 0;
		  padding: 10px;
		  color: #fff;
		  font-size: 11px;
		  background: -moz-linear-gradient(top, #2e5764, #1e3d47);
		  background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #1e3d47),color-stop(1, #2e5764));
		}
	
		.login_form.modal p { padding: 20px 30px; border-bottom: 1px solid #ddd; margin: 0;
		  background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #eee),color-stop(1, #fff));
		  overflow: hidden;
		}
		.login_form.modal p:last-child { border: none; }
		.login_form.modal p label { float: left; font-weight: bold; color: #333; font-size: 13px; width: 110px; line-height: 22px; }
		.login_form.modal p input[type="text"],
		.login_form.modal p input[type="password"] {
		  font: normal 12px/18px "Lucida Grande", Verdana;
		  padding: 3px;
		  border: 1px solid #ddd;
		  width: 200px;
		}
	
	
		.part {
		  display: none;
		}
	
	  </style>
	  
</head>
<!-- END HEAD -->
<!-- BEGIN BODY --> 
<body style="background-color:#FFFFFF;width:98%;"> 
	<script type="text/javascript">
		var nuevoalias = jQuery.noConflict();
		nuevoalias(document).ready(function() {
		   // alert("Si salgo es que no hay conflicto!!!");
		});
	</script>
	<script language="JavaScript" type="text/javascript">
	<!--
		a = new Date();
		a = a.getTime();
	//-->
	</script>  
	<?php  
		include ("../../../../lib/adodb/adodb.inc.php");
		include('../../MASTER/config/conect.php');		
		
		function Mayus($variable) {
			$variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
			return $variable;
		}

		$id_usuario	= $vari[0]; 
		
		error_reporting(E_ALL ^ E_NOTICE);
			
		$agno = date("Y");
		
		include ("LIB.php");
		include ("SQL.php");

		$ctacbles		=	get_total_ctacble($data);
		$escenarios		= 	get_escenarios($data);  	
		$jer_ctacble	= 	get_jerarquia_ctacble($data);
		$agrupadores	= 	get_total_agrupadores($data);
		$total_escenarios = get_total_escenarios($data); 																		  
	?>  
	<table id="tree" class="treeTable">
		<thead>
			<tr>
				<?php
					foreach ($total_escenarios as $ROW_ESC){   
				?>
				<th colspan="<?php echo $ROW_ESC[0]+1; ?>" bgcolor="#366092"><center><h2 style="color:#FFFFFF;">PRESUPUESTO <?php echo $agno; ?></h2></center></th> 
				<?php } ?>
			</tr>
			<tr>	
				<th bgcolor="#366092" width="30%"><h5 style="color:#FFFFFF;">EE.RR.</h5></th>	 
				<?php  				 
					foreach ($escenarios as $e){ 
				?>
			  	<th bgcolor="#366092" style="width:10%">
					<h5 style="color:#FFFFFF;">
						<a style="color:#FFFFFF;" href="DEF_ESC.php?id=<?php echo utf8_encode($e[0]); ?>" rel="modal:open"><?php echo utf8_encode($e[2]); ?></a>
					</h5>
				</th> 
				<?php 
					} 
				?>  				
			</tr>			
		</thead>
		<tbody> 
			<?php  
			include ("../../../../lib/adodb/adodb.inc.php");
			include('../../MASTER/config/conect.php');		
								
			// MENU PRINCIPAL
			$SQL1 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_N1 ".$id_usuario.""; 
			$C1 = $DB2->Execute($SQL1); 
			foreach($C1 as $k => $R1) 
			{	 
				echo '<tr id="node-'.$R1[0].'">';
					echo '<td>'.utf8_encode($R1[1]).'</td>'; 
					//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ************************** // 
					foreach ($escenarios as $e){ 
					echo '<td>';
						
						foreach ($agrupadores as $a){   
							if ($R1[0] == $a[1] && $e[0] == $a[2])
							{
								if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
								else if ($a[3] > 0)	$color = 'style="color:#000000;"';
										
								//echo '<a '.$color.' href="DETAILS.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R1[0].'&nivel='.$R1[6].'" rel="modal:open">'; 
							?>
								<a href="DETAILS.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R1[0]; ?>&nivel=<?php echo $R1[6]; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>> 
							<?php 
									if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
									if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
									if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
									if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
								echo '</a>'; 																																		
							}
						} 	
					echo '</td>';  
					} 
					//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END ***************************** //  
				echo '</tr>';
			   
				if ($R1[3] =="submenu")
				{
					// SUB MENU
					$i2=1;
					$SQL2="EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R1[0]." ";
					$C2 = $DB2->Execute($SQL2); 
					foreach($C2 as $k => $R2) 
					{
						if($R2[4] == 'Agrupador'){
							$color = 'style="background:#dce6f1; color:#000;"';
						}
						else{
							$color = 'style="background:#FFF; color:#000;"';
						} 
						
						echo '<tr '.$color.' id="node-'.$R1[0].$R1[0].$i2.'" class="child-of-node-'.$R1[0].'">';
								echo '<td>'.utf8_encode($R2[1]).'</td>';  
								
								//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ************************** // 
								foreach ($escenarios as $e){ 
								echo '<td>'; 
									foreach ($agrupadores as $a){   
										if ($R2[0] == $a[1] && $e[0] == $a[2])
										{
											if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
											else if ($a[3] > 0)	$color = 'style="color:#000000;"';
													
											// echo '<a '.$color.' href="DETAILS.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R2[0].'&nivel='.$R2[6].'" rel="modal:open">'; 
											?>
												<a href="DETAILS.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R2[0]; ?>&nivel=<?php echo $R2[6]; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>> 
											<?php 
												if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
												if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
												if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
												if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
											echo '</a>'; 																																		
										}
									} 	
								echo '</td>';  
								} 
								//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END ***************************** //  
						echo '</tr>';						
							$N3 = $R1[0].$R1[0].$i2;  
							$i2++;
										
							if ($R2[3] =="submenu")
							{
								$i3=1; 
								$SQL3=" EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R2[0]."  ";
								$C3 = $DB2->Execute($SQL3); 
								foreach($C3 as $k => $R3) 
								{
									if($R3[4] == 'Agrupador'){
										$color = 'style="background:#dce6f1; color:#000;"';
									}
									else{
										$color = 'style="background:#FFF; color:#000;"';
									}
						 
								echo '<tr '.$color.' id="node-'.$N3.$R2[0].$i3.'" class="child-of-node-'.$N3.'">';
									echo '<td>'.utf8_encode($R3[1]).'</td>'; 
									
									//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ************************** // 
									foreach ($escenarios as $e){ 
									echo '<td>'; 
										foreach ($agrupadores as $a){   
											if ($R3[0] == $a[1] && $e[0] == $a[2])
											{
												if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
												else if ($a[3] > 0)	$color = 'style="color:#000000;"';
														
												//echo '<a '.$color.' href="DETAILS.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R3[0].'&nivel='.$R3[6].'" rel="modal:open">'; 
												?>
													<a href="DETAILS.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R3[0]; ?>&nivel=<?php echo $R3[6]; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>> 
												<?php 
													if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
													if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
													if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
													if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
												echo '</a>'; 																																		
											}
										} 	
									echo '</td>';  
									} 
									//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END ***************************** //  									
								echo '</tr>';
								$N4 = $N3.$R2[0].$i3; 	
								$i3++;
												
								if ($R3[3] =="submenu")
								{
									$i4 = 1; 
									$SQL4 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R3[0].""; 
									$C4 = $DB2->Execute($SQL4); 
									foreach($C4 as $k => $R4) 
									{
										if($R4[4] == 'Agrupador'){
											$color = 'style="background:#dce6f1; color:#000;"';
										}
										else{
											$color = 'style="background:#FFF; color:#000;"';
										} 
										echo '<tr '.$color.' id="node-'.$N4.$R3[0].$i4.'" class="child-of-node-'.$N4.'">';
											echo '<td>'.Mayus(utf8_encode($R4[1])).'</td>'; 
											
											//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ************************** // 
											foreach ($escenarios as $e){ 
											echo '<td>'; 
												foreach ($agrupadores as $a){   
													if ($R4[0] == $a[1] && $e[0] == $a[2])
													{
														if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
														else if ($a[3] > 0)	$color = 'style="color:#000000;"';
																
														// echo '<a '.$color.' href="DETAILS.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R4[0].'&nivel='.$R4[6].'" rel="modal:open">'; 
														?>
															<a href="DETAILS.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R4[0]; ?>&nivel=<?php echo $R4[6]; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>> 
														<?php 
															if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
															if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
															if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
															if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
														echo '</a>'; 																																		
													}
												}  	
											echo '</td>';  
											} 
											//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END ***************************** //  
											
										echo '</tr>';	
										$N5 = $N4.$R3[0].$i4; 
										$i4++;	
										
										if ($R4[3] =="submenu"){	
											$i5 = 1; 
											$SQL5 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R4[0].""; 
											$C5 = $DB2->Execute($SQL5); 
											foreach($C5 as $k => $R5) 
											{
												if($R5[4] == 'Agrupador'){
													$color = 'style="background:#dce6f1; color:#000;"';
												}
												else{
													$color = 'style="background:#FFF; color:#000;"';
												}
			 
												echo '<tr '.$color.' id="node-'.$N5.$R4[0].$i5.'" class="child-of-node-'.$N5.'">';
													echo '<td><b>'.utf8_encode($R5[1]).'</b></td>'; 
													
													//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ************************** // 
													foreach ($escenarios as $e){ 
													echo '<td>'; 
														foreach ($agrupadores as $a){   
															if ($R5[0] == $a[1] && $e[0] == $a[2])
															{
																if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
																else if ($a[3] > 0)	$color = 'style="color:#000000;"';
																		
																//echo '<a '.$color.' href="DETAILS.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R5[0].'&nivel='.$R5[6].'" rel="modal:open">'; 
																?>
																	<a href="DETAILS.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R5[0]; ?>&nivel=<?php echo $R5[6]; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>> 
																<?php 
																	if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
																	if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
																	if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
																	if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
																echo '</a>'; 																																		
															}
														}  	
													echo '</td>';  
													}
													//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END ***************************** // 
													
												echo '</tr>';
												$N6 = $N5.$R4[0].$i5; 	
												$i5++;	
												
												if ($R5[3] =="submenu"){	
													$i6 = 1; 
													$SQL6 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R5[0].""; 
													$C6 = $DB2->Execute($SQL6); 
													foreach($C6 as $k => $R6) 
													{	
														if($R6[4] == 'Agrupador'){
															$color = 'style="background:#dce6f1; color:#000;"';
														}
														else{
															$color = 'style="background:#FFF; color:#000;"';
														}
		 
														echo '<tr '.$color.' id="node-'.$N6.$R5[0].$i6.'" class="child-of-node-'.$N6.'">';
															echo '<td>'.utf8_encode($R6[1]).'</td>'; 
															
															//******** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ********// 
															foreach ($escenarios as $e){ 
															echo '<td>'; 
																foreach ($agrupadores as $a){   
																	if ($R6[0] == $a[1] && $e[0] == $a[2])
																	{
																		if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
																		else if ($a[3] > 0)	$color = 'style="color:#000000;"';
																				
																		// echo '<a '.$color.' href="DETAILS.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R6[0].'&nivel='.$R6[6].'" rel="modal:open">'; 
																		?>
																			<a href="DETAILS.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R6[0]; ?>&nivel=<?php echo $R6[6]; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>> 
																		<?php 
																			if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
																			if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
																			if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
																			if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
																		echo '</a>'; 																																		
																	}
																} 	
															echo '</td>';  
															}
															//******** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END    ********// 
															
														echo '</tr>';
														$N7 = $N6.$R5[0].$i6; 
														$i6++;
														if ($R6[3] =="submenu"){	
															$i7 = 1; 
															$SQL7 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R6[0].""; 
															$C7 = $DB2->Execute($SQL7); 
															foreach($C7 as $k => $R7) 
															{	
																if($R7[4] == 'Agrupador'){
																	$color = 'style="background:#dce6f1; color:#000;"';
																}
																else{
																	$color = 'style="background:#FFF; color:#000;"';
																} 
																echo '<tr '.$color.' id="node-'.$N7.$R6[0].$i7.'" class="child-of-node-'.$N7.'">';
																	echo '<td>'.utf8_encode($R7[1]).'</td>'; 
																	
																	//******** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ********// 
																	foreach ($escenarios as $e){ 
																	echo '<td>'; 
																		foreach ($agrupadores as $a){   
																			if ($R7[0] == $a[1] && $e[0] == $a[2])
																			{
																				if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
																				else if ($a[3] > 0)	$color = 'style="color:#000000;"';
																						
																				// echo '<a '.$color.' href="DETAILS.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R7[0].'&nivel='.$R7[6].'" rel="modal:open">'; 
																				?>
																					<a href="DETAILS.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R7[0]; ?>&nivel=<?php echo $R7[6]; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>> 
																				<?php 
																					if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
																					if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
																					if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
																					if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
																				echo '</a>'; 																																		
																			}
																		} 
																	echo '</td>';  
																	} 
																	//******** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END    ********// 
														
																echo '</tr>';
																$N8 = $N7.$R6[0].$i7; 
																$i7++;	
																if ($R7[3] =="submenu"){	
																	$i8 = 1; 
																	$SQL8 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R7[0].""; 
																	$C8 = $DB2->Execute($SQL8); 
																	foreach($C8 as $k => $R8) 
																	{
																		if($R8[4] == 'Agrupador'){
																			$color = 'style="background:#dce6f1; color:#000;"';
																		}
																		else{
																			$color = 'style="background:#FFF; color:#000;"';
																		}
 
																		echo '<tr '.$color.' id="node-'.$N8.$R7[0].$i8.'" class="child-of-node-'.$N8.'">';
																			echo '<td>'.utf8_encode($R8[1]).'</td>'; 
																			//** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  **//
																			// IMPRIMO CUENTA CONTABLE //
																			foreach ($escenarios as $e){  
																				echo '<td>'; 
																					foreach ($ctacbles as $c){ 
																						if (trim($R8[5]) == trim($c[0]) && $e[0] == $c[1])
																						{
																							if ($c[2] < 0)		$color = 'style="color:#FF0000;"'; 
																							else if ($c[2] > 0)	$color = 'style="color:#000000;"';
																									
																							//echo '<a '.$color.' href="DETAILS.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R8[0].'&nivel='.$R8[6].'" rel="modal:open">'; 
																						?>
																							<a href="DETAILS.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R8[0]; ?>&nivel=<?php echo $R8[6]; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>> 
																						<?php
																							if ($e[6] == 'Regular')   	echo number_format($c[2], 0, ".", "."); 
																							if ($e[6] == 'Negrita')		echo '<b>'.number_format($c[2], 0, ".", ".").'</b>'; 
																							if ($e[6] == 'Cursiva')		echo '<i>'.number_format($c[2], 0, ".", ".").'</i>'; 
																							if ($e[6] == 'Subrayado')	echo '<u>'.number_format($c[2], 0, ".", ".").'</u>';   
																							echo '</a>'; 																																		
																						}  
																					}  																					
																				echo '</td>';  
																			}																										
																			//** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END **// 
																		echo '</tr>'; 			 
																	} // NIVEL 8
																}  
															}
														}	 
													}
												} 
											}															
										} 
									}   
								}  	
							}           
						}   	  
					}  
				} 
			} // FIN WHILE
			$DB->Close();
			?>   	
		</tbody>
	</table>  
	<script language="JavaScript" type="text/javascript">
	<!--
		b = new Date();
		b = b.getTime();
		
		document.write("Tiempo de Respuesta: " + ((b - a) / 1000) + "s");
	//-->
	</script>  
	<script src="../../MASTER/assets/pages/scripts/ui-general.min.js" type="text/javascript"></script>
</body> 
</html> 