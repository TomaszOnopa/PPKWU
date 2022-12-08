<?php
	$json_data = file_get_contents('php://input');
	$data = json_decode($json_data);
	if (property_exists($data, "str")) {
		echo "str";
	}
	if (property_exists($data, "num1") && property_exists($data, "num2")) {
		echo "num1,num2";
	}
?>
