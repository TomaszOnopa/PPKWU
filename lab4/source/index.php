<?php
	if (isset($_GET["num1"]) && isset($_GET["num2"])) {
		$num1 = (int)$_GET["num1"];
		$num2 = (int)$_GET["num2"];
		if ($num2 == 0) {
			echo "num2 nie może być równe zero";
		}
		else {
			echo json_encode(array(
			"sum" => $num1+$num2,
			"sub" => $num1-$num2,
			"nul" => $num1*$num2,
			"div" => (int)($num1/$num2)));
		}
	}
	else
		echo "Nie podano parametrów";
?>
