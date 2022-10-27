<?php
	if (isset($_GET["cmd"])) {
		if ($_GET["cmd"] == "time") {
			date_default_timezone_set("Europe/Warsaw");
			echo date("H:i:s");
		}
		elseif ($_GET["cmd"] == "rev") {
			if (isset($_GET["str"]))
				echo strrev($_GET["str"]);
			else
				echo "Brak parametru str";
		}
	}
	else
		echo "Hello World!\n"; 
?>
