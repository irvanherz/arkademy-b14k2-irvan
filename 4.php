<?php

function palindrom($str){
	$str = preg_replace("/[^a-zA-Z]/","",$str);
	$rts = strrev($str);
	if(strcasecmp($str,$rts) == 0){
		$sm = preg_match_all("/[a-z]/",$str);
		$lg = strlen($str) - $sm;
		if($lg == 0 || $sm == 0) {
			echo "Palindrom Murni";
		} else if($lg == 1) {
			echo "Palindrom kapital";
		} else if($sm == 1) { 
			echo "Palindrom kecil";
		} else { 
			echo "Palindrom Mix";
		}
	} else echo "Bukan Palindrom";
}

palindrom("MALAM");
