<?php

function validate_email($e){
	return (filter_var($e, FILTER_VALIDATE_EMAIL)) ? true : false;
}

function validate_password($p){
	return (
		preg_match_all("/[a-zA-Z]/",$p) == 5 &&
		preg_match_all("/[0-9]/",$p) == 2 &&
		preg_match_all("/[-!$%^&*()_+|~=`{}\[\]:;\"'<>?,.\/]/",$p) == 2 &&
		strlen($p) == 9
		) ? true:false;
}

