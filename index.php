<?php
require_once 'core/init.php';

?>
<!-- header -->
<?php include 'includes/header.php'; ?>
<!-- /header -->
<div class="container" style="margin-top:5%;">
    <div class="jumbotron">
    <h1>Welcome to Crazy World</h1>
    <p>A place where every developer gets crazy</p>   
    </div>
    <!-- button start -->
    <div class="col-md-12 nav2">
    <div class="nav2-float">
    </div>
    <?php
      foreach ($cats as $cat) {
        echo '<a href="'.base.'/tutorial/'.strtolower($cat->cat_name).'" class="btn btn-'.$classes[strtolower($cat->cat_name)].'"><b>'.ucfirst($cat->cat_name).'</b></a>';
        //echo '<a href="tutorial.php?name='.strtolower($cat->cat_name).'" class="btn btn-'.$classes[strtolower($cat->cat_name)].'"><b>'.ucfirst($cat->cat_name).'</b></a>';
      }
      ?>
      <!-- <a href="#" class="btn btn-success"><b>PHP</b></a>
      <a href="#" class="btn btn-warning"><b>Mysql</b></a>
      <a href="#" class="btn btn-primary"><b>Javascript</b></a>
      <a href="#" class="btn btn-danger"><b>Python</b></a>
      <a href="#" class="btn btn-info"><b>Jquery</b></a> -->
    </div>
<!-- Post Body -->
<div class="col-md-12 post-body">
<hr>
<div class="col-md-5 pb-left">
	<font class="big">HTML</font>
</div>
<div class="col-md-7 pb-right">
	<blockquote>
	<ul>
		<li>HTML Serves 100% Of Websites</li>
		<li>HTML is language of browser</li>
		<li>Its Easy to learn</li>
		<li><a href="<?=base?>/tutorial/html">Click To Know More!</a></li>
	</ul>
	</blockquote>
</div>
</div>
<!-- Javascript -->
<div class="col-md-12 post-body">
<hr>
<div class="col-md-5 pb-left">
	<font class="big">Javascript</font>
</div>
<div class="col-md-7 pb-right">
	<blockquote>
	<ul>
		<li>Javascript Make You Web Page Interactive!</li>
		<li>Javascript Handle events like mouse clicks</li>
		<li>Its Easy to learn</li>
		<li><a href="<?=base?>/tutorial/javascript">Click To Know More!</a></li>
	</ul>
	</blockquote>
</div>
</div>
<!-- PHP -->
<div class="col-md-12 post-body">
<hr>
<div class="col-md-5 pb-left">
	<font class="big">PHP</font>
</div>
<div class="col-md-7 pb-right">
	<blockquote>
	<ul>
		<li>Its Server Side!</li>
		<li>Its helps us in making of robustive web app</li>
		<li>You know Facebook was written in PHP. Now in Hack</li>
		<li><a href="<?=base?>/tutorial/php">Click To Know More!</a></li>
	</ul>
	</blockquote>
</div>
</div>
<!-- Other ones -->
<div class="col-md-12">
<hr>
	<div class="col-md-4 each-other-ones">
	<blockquote>
		<font class="less-big">
			JQuery
		</font>
		<p>Jquery is Library Of Javascript which helps us in making animations!</p>
	</blockquote>
	</div>
	
<!-- #2 -->
	<div class="col-md-4 each-other-ones">
	<blockquote>
		<font class="less-big">
			Python
		</font>
		<p>Its said to be hacker's language! And most people's fav because of its less write do more type of feature!</p>
	</blockquote>
	</div>
<!-- #3 -->
	<div class="col-md-4 each-other-ones">
	<blockquote>
		<font class="less-big">
			Mysql
		</font>
		<p>Mysql is Database! Due to its open source nature it is widely used!</p>
	</blockquote>
	</div>

</div>
<?php include 'includes/footer.php';?>