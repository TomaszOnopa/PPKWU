<?php
	if (isset($_GET["num1"]) && isset($_GET["num2"])) {
		if ($_GET["num2"] == 0)
			echo "num2 nie może być równe zero";
	}
	else
		echo "Nie podano parametrów";
?>
