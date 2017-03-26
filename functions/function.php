<?php

function safe_str($string)
{
	$string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
	return $string;
}

function escape($string)

{

	return htmlentities($string, ENT_QUOTES, 'UTF-8');

}

function danger_div($msg, $alert_class = 'danger')
{
	return '<div class="alert alert-'.$alert_class.'" role="alert">'.$msg.'</div>';
}

function ui($url)
{
	return urlencode($url);
}