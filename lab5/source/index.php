<?php
	$json_data = file_get_contents('php://input');
	$data = json_decode($json_data);
	if (property_exists($data, "str") && !property_exists($data, "num1") && !property_exists($data, "num2") ) {
		$str = $data->{'str'};
		
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
	else if (!property_exists($data, "str") && property_exists($data, "num1") && property_exists($data, "num2")) {
		$num1 = $data->{'num1'};
		$num2 = $data->{'num2'};
		
		if ($num2 == 0) {
			echo "num2 nie może być równe zero";
		}
		else {
			echo json_encode(array(
			"sum" => $num1+$num2,
			"sub" => $num1-$num2,
			"mul" => $num1*$num2,
			"div" => (int)($num1/$num2),
			"mod" => $num1%$num2));
		}
	}
	else if (property_exists($data, "str") && property_exists($data, "num1") && property_exists($data, "num2")) {
		$str = $data->{'str'};
		
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
		
		$num1 = $data->{'num1'};
		$num2 = $data->{'num2'};
		
		if ($num2 == 0) {
			echo "num2 nie może być równe zero";
		}
		else {
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
	}
?>
