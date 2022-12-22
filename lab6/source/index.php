<?php
	$xmlString = file_get_contents('php://input');
	$xml = new SimpleXMLElement($xmlString);
	$num1 = $xml->num1;
	$num2 = $xml->num2;
	$str = $xml->str;
	$array = array(
			"sum" => $num1+$num2,
			"sub" => $num1-$num2,
			"mul" => $num1*$num2,
			"div" => (int)($num1/$num2),
			"mod" => $num1%$num2);
	
?>
