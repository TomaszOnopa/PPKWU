<?php
	if (isset($_GET["cmd"])) {
		if ($_GET["cmd"] == "time") {
			date_default_timezone_set("Europe/Warsaw");
			echo date("H:i:s");
		}
		elseif ($_GET["cmd"] == "rev") {
			
		}
	}
	else
		echo "Hello World!\n"; 
?>
