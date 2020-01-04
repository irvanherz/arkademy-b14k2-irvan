<?php

function count_char($a,$b){
	return substr_count($a,$b);
}

function count_char_manual($a,$b){
	$n = 0;
	foreach (str_split($a) as $c){
		if($c == $b) $n++;
	}
	return $n;
}

echo count_char_manual("hello world!","x");
