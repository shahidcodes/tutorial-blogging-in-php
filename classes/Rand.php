<?php

/**
* Randomly generation of captcha
*/
class Rand
{
	public static function generate()
	{
		$text = rand(1, 9);
		$suf = str_shuffle('abcdefghijklmnopqrtuvwxyz');
		$text .= substr($suf, rand(1,9), 2);
		$text .= rand(9, 20);
		$text = str_shuffle($text);
		return $text;
	}
}