<?php

require_once '../core/init.php';
$user = new User();
if ($user->isLogged()) {
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
<body>

</body>
</html>

<?php
require_once doc.'/includes/footer.php';
}else{
	Redirect::to('index.php');
}

