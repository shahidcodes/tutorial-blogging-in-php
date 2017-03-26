<?php
require_once '../core/init.php';
$user = new User();
if ($user->isLogged()) {
  Redirect::to('home.php');
}else{
  if (Input::exists()) {
    if (Token::check(Input::get('token')) && Captcha::check(Input::get('captcha'))) {
      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'username' => array('required' => true, 'min' => '4', 'max' => '20'),
        'password' => array('required' => true, 'min' => '6')
        ));
      if ($validation->passed()) {
        $user = new User();
        $username = Input::get('username');
        $password = Input::get('password');
        $remember = (Input::get('remember') == 'on')? true : false;
        $user_login = $user->login($username, $password, $remember);
        if ($user_login) {
          Redirect::to('home.php');
        }
      }else{
        foreach($validation->errors() as $error){
          echo '> ',$error,'<br>';
        }
      }
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sign In To Manage</title>

    <link href="<?=base?>/includes/bootstrap.min.css" rel="stylesheet">

    <link href="<?=base?>/includes/app.css" rel="stylesheet">
  </head>

  <body class="signin-body">

    <div class="container">
    <div class="signin">
      <form class="form-signin" method="POST" action="">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input name="username" type="text" class="form-control" placeholder="Email username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember"> Remember me
          </label>
        </div>
        <?php Session::put('secure', Rand::generate()); ?>
        <img src="<?=base?>/captcha.php" alt="captcha" /><br>
        <input type="text" name="captcha" class="form-control" placeholder="Enter Text In Image"/>
        <?php if (Captcha::error()) {?>
          <p class="text text-danger">Captcha Mismatch!</p>
        <?php } ?>
        <input type="hidden" name="token" value="<?=Token::generate()?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      </div>
    </div> <!-- /container -->
  </body>
</html>
<?php
}?>