<?php
	function xml_encode($mixed, $domElement=null, $DOMDocument=null) {
		if (is_null($DOMDocument)) {
		    $DOMDocument =new DOMDocument;
		    $DOMDocument->formatOutput = true;
		    xml_encode($mixed, $DOMDocument, $DOMDocument);
		    echo $DOMDocument->saveXML();
		}
		else {
		    // To cope with embedded objects 
		    if (is_object($mixed)) {
		      $mixed = get_object_vars($mixed);
		    }
		    if (is_array($mixed)) {
		        foreach ($mixed as $index => $mixedElement) {
		            if (is_int($index)) {
		                if ($index === 0) {
		                    $node = $domElement;
		                }
		                else {
		                    $node = $DOMDocument->createElement($domElement->tagName);
		                    $domElement->parentNode->appendChild($node);
		                }
		            }
		            else {
		                $plural = $DOMDocument->createElement($index);
		                $domElement->appendChild($plural);
		                $node = $plural;
		                if (!(rtrim($index, 's') === $index)) {
		                    $singular = $DOMDocument->createElement(rtrim($index, 's'));
		                    $plural->appendChild($singular);
		                    $node = $singular;
		                }
		            }

		            xml_encode($mixedElement, $node, $DOMDocument);
		        }
		    }
		    else {
		        $mixed = is_bool($mixed) ? ($mixed ? 'true' : 'false') : $mixed;
		        $domElement->appendChild($DOMDocument->createTextNode($mixed));
		    }
		}
	}

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
		echo xml_encode(array(
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
		echo xml_encode(array(
			"lowercase" => $lowercase,
			"uppercase" => $uppercase,
			"digit" => $digit,
			"special" => $special));
	}
	
	if (isset($xml->num1) && isset($xml->num1) && !isset($xml->str)) {
		echo xml_encode(array(
			"sum" => $num1+$num2,
			"sub" => $num1-$num2,
			"mul" => $num1*$num2,
			"div" => (int)($num1/$num2),
			"mod" => $num1%$num2));
	}
?>
