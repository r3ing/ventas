<?php
	function Mayus($variable) {
		$variable = strtr(strtoupper($variable),"�����������������","�����������������");
		return $variable;
	}
?>