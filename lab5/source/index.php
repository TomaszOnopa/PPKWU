<?php
	$json_data = file_get_contents('php://input');
	$data = json_decode($json_data);
	if (property_exists($data, "str")) {
		$str = $data->{'str'};
		
		$lowercase = 0;
		$uppercase = 0;
		$digit = 0;
		$special = 0;
		
		$str_array = str_split($str, 1);
		foreach ($str_array as $value) {
			if (ctype_upper($value)) {
				$uppercase += 1;
			}
			else if (ctype_lower($value)) {
				$lowercase += 1;
			}
			else if (is_numeric($value)) {
				$digit += 1;
			}
    		else {
    			$special += 1;
    		}
		}
		echo json_encode(array(
			"lowercase" => $lowercase,
			"uppercase" => $uppercase,
			"digit" => $digit,
			"special" => $special));
	}
	if (property_exists($data, "num1") && property_exists($data, "num2")) {
		$num1 = $data->{'num1'};
		$num2 = $data->{'num2'};
		echo "num1,num2";
	}
	if (property_exists($data, "str") && property_exists($data, "num1") && property_exists($data, "num2")) {
		
	}
?>
