<?php
	$xmlString = file_get_contents('php://input');
	$xml = new SimpleXMLElement($xmlString);
	
	$num1 = $xml->num1;
	$num2 = $xml->num2;
	$str = $xml->str;
	
	if (isset($xml->str) && isset($xml->num1) && isset($xml->num1)) {
		
		$lowercase = 0;
		$uppercase = 0;
		$digit = 0;
		$special = 0;
		
		$str_array = str_split($str, 1);
		$len = count($str_array);
		for ($i = 0; $i < $len; $i++) {
			if (ctype_upper($str_array[$i])) {
				$uppercase += 1;
				continue;
			}
			if (ctype_lower($str_array[$i])) {
				$lowercase += 1;
				continue;
			}
			/*if (is_int($str_array[$i])) {
				$digit += 1;
				continue;
			}
	    	$special += 1;*/
		}
		echo json_encode(array(
			"lowercase" => $lowercase,
			"uppercase" => $uppercase,
			"digit" => $digit,
			"special" => $special,
			"sum" => $num1+$num2,
			"sub" => $num1-$num2,
			"mul" => $num1*$num2,
			"div" => (int)($num1/$num2),
			"mod" => $num1%$num2));
	}
	if (!isset($xml->num1) && !isset($xml->num1) && isset($xml->str)) {
		$lowercase = 0;
		$uppercase = 0;
		$digit = 0;
		$special = 0;
		
		$str_array = str_split($str, 1);
		$len = count($str_array);
		for ($i = 0; $i < $len; $i++) {
			if (ctype_upper($str_array[$i])) {
				$uppercase += 1;
				continue;
			}
			if (ctype_lower($str_array[$i])) {
				$lowercase += 1;
				continue;
			}
			/*if (is_int($str_array[$i])) {
				$digit += 1;
				continue;
			}
	    	$special += 1;*/
		}
		echo json_encode(array(
			"lowercase" => $lowercase,
			"uppercase" => $uppercase,
			"digit" => $digit,
			"special" => $special));
	}
	
	if (isset($xml->num1) && isset($xml->num1) && !isset($xml->str)) {
		echo json_encode(array(
			"sum" => $num1+$num2,
			"sub" => $num1-$num2,
			"mul" => $num1*$num2,
			"div" => (int)($num1/$num2),
			"mod" => $num1%$num2));
	}
?>
