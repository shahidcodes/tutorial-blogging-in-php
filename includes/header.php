<?php
require_once 'core/init.php';
$query = new Query;
$cats = $query->catName();
$classes = ['html'        => 'danger',
            'php'         => 'success', 
            'javascript'  => 'warning',
            'mysql'       => 'primary',
            'jquery'      => 'info',
            'python'      => 'default',
            'css'         => 'warning'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<title>Welcome to Crazy World| PHP | HTML | JAVASCRIPT | PROJECT | TUTORIAL | TRAINING</title>
	<link rel="stylesheet" type="text/css" href="<?=base?>/includes/bootstrap.min.css">
  <script type="text/javascript" src="<?=base?>/includes/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base?>/includes/app.css">  
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php if(basename($_SERVER['SCRIPT_NAME']) !== 'index.php'): ?>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#post-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="caret"></span>
          </button>
        <?php endif; ?>
          <a class="navbar-brand" href="<?=base?>">&lt;&lt;Crazy World>></a>
      </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?=base?>">Home</a></li>

            <!-- Dropdown for post and tutorials -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Tutorials <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="<?=base?>/tutorial/html">HTML</a></li>
                <li><a href="<?=base?>/tutorial/css">CSS</a></li>
                <li><a href="<?=base?>/tutorial/javascript">JAVASCRIPT</a></li>
                <li><a href="<?=base?>/tutorial/php">PHP</a></li>
                <li><a href="<?=base?>/tutorial/html/mysql">MYSQL</a></li>
                <li><a href="<?=base?>/tutorial/html/python">PYTHON</a></li>
                <!-- <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li> -->
              </ul>
            </li>
            </ul>
            <!-- /dropdown -->
            <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=base?>/about">About</a></li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
</nav>