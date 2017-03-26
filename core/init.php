<?php
//error_reporting(0);
session_start();
ob_flush();
define('doc', $_SERVER['DOCUMENT_ROOT'].'/blog');
header('X-Frame-Options : DENY');
define('base', 'http://127.0.0.1/blog');

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'db' => 'blog'
		),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
		),
	'session' => array(
		'session_name' => 'user',
		'token_name'	=> 'token'
		)
	);
function my_auto_loader($class){
	require_once doc.'/classes/'. $class .'.php';
}
spl_autoload_register('my_auto_loader');
require_once doc.'/functions/function.php';

$cookie_name = Config::get('remember/cookie_name');

if (Cookie::exists($cookie_name) && !Session::exists(Config::get('session/session_name'))) {
	//check stored hash in db
	$hash = Cookie::get($cookie_name);
	$cookie = DB::getInstance()->get('users_session', array('hash', '=', $hash));
	if ($cookie->count()) {
		$user = new User($cookie->first()->user_id);
		$user->login();
	}
}