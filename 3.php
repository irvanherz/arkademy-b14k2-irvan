<?php

function validate_color($code){
	if(strlen($code) == 4 || strlen($code) == 7) {
		foreach(str_split($code) as $i=>$c){
			if($i == 0) {
				if($c == "#") continue;
				else return false;
			}
			if(strpos("0123456789abcdefABCDEF",$c) === false) return false;
		}
		return true;
	} else return false;
}

var_dump(validate_color("#123def"));
