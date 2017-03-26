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
    <link rel="icon" href="favicon.ico">

    <title>Welcome Bro!</title>

    <link href="<?=base?>/includes/bootstrap.min.css" rel="stylesheet">

    <link href="<?=base?>/includes/admin.css" rel="stylesheet">
    <script type="text/javascript" src="<?=base?>/includes/jquery.js"></script>
  </head>
<body>
	<div class="container">
	<header>
		<h1>Welcome <?=($user->data()->username);?></h1>
		<pre>See Below To Change And Edit Web Site</pre>
	</header>
	<nav class="navbar navbar-default">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
			<li class="dropdown">
			 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
				<ul class="dropdown-menu">
				<?php 	
				$query = new Query;
				$cats = $query->catName(); 
				foreach($cats as $cat){ ?>
					<li class="small-caps"><a href="?cat=<?=safe_str(strtolower($cat->cat_name))?>"><?=safe_str(strtolower($cat->cat_name))?></a></li>
				<?php }
				?>
				</ul>
			</li>
			<li><a href="post.php?action=add">Add A Post</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>
	<main>
	<!-- All Post Statics -->
	<?php echo Session::flash('msg')?>
	<?php if(!Input::exists('get')): ?>
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Latest Posts</h3>
			</div>
			<div class="panel-body">
			<div class="col-md-4"><div class="bg bg-primary panel-heading">HTML</div>
			<div class="small-caps">
				<b>Latest Post:</b><br>
				<?php
				$query = new Query;
				$html = $query->getAll(array('cat_name', 'html'));
				if ($html->count()) {
					$html = $html->last();
				?>
				<ul class="list-group">
				<li class="list-group-item">
				<a href="post.php?action=edit&id=<?=$html->id?>"><?=$html->post_title?></a>
				<span class="badge"><?php echo @$query->hits($html->id)->hits?></span>
				</li></ul>
				<?php }else echo "No Post Sorry"; ?>
			</div>
			</div>
			<div class="col-md-4"><div class="bg bg-primary panel-heading">PHP</div>
			<div class="small-caps">
				<b>Latest Post:</b><br>
				<?php
				$query = new Query;
				$php = $query->getAll(array('cat_name', 'php'));
				if ($php->count()) {
					$php = $php->last();
				?>
				<ul class="list-group">
				<li class="list-group-item">
				<a href="post.php?action=edit&id=<?=$php->id?>"><?=$php->post_title?></a>
				<span class="badge"><?php echo @$query->hits($php->id)->hits?></span>
				</li></ul>
				<?php }else echo "No Post Sorry"; ?>
			</div>
			</div>
			<div class="col-md-4">
			<div class="bg bg-primary panel-heading">JAVASCRIPT</div>
			<div class="small-caps">
				<b>Latest Post:</b><br>
				<?php
				$query = new Query;
				$javascript = $query->getAll(array('cat_name', 'javascript'));
				if ($javascript->count()) {
					$javascript = $javascript->last();
				?>
				<ul class="list-group">
				<li class="list-group-item">
				<a href="post.php?action=edit&id=<?=$javascript->id?>"><?=$javascript->post_title?></a>
				<span class="badge"><?php echo @$query->hits($javascript->id)->hits?></span>
				</li></ul>
				<?php }else echo "No Post Sorry"; ?>
			</div>
			</div>
		</div>
	<?php endif?>
	<!-- Specific Cat Post -->
		<?php
		if (Input::exists('get')) {
			$cat = Input::get('cat');?>
		<div class="panel panel-primary">
			<div class="panel-heading">
    			<h3 class="panel-title small-caps"><?=$cat?></h3>
  			</div>
			<div class="panel-body">
			<?=Session::flash('msg')?>
			<table class="table table-bordered">
			<thead>
				<th>#</th>
			</thead>
		<?php
		$query = new Query;
		$res = $query->getAll(array('cat_name', $cat))->results();
		if(!empty($res)){
			foreach ($res as $post) {
			?>
				<tr>
				<td><?=$post->id?></td>
				<td><a href="post.php?action=edit&id=<?=$post->id?>" class="text-danger"><?=$post->post_title?></a></td>
				<td><a href="edit.php?action=delete&cat=<?=$cat?>&id=<?=$post->id?>">Delete X</a></td>
				</tr>
			<?php
			}
		}else{
		?>
		<tr><td class="bg bg-danger">No Post Sorry! Select Add Post To Add Entry</td></tr>
		<?php 
		}
		?>
		</table>
		</div>
		</div>
		<?php }
		?>
	</main>
	<div>
<?php include doc.'/includes/footer.php';
}else{
	Redirect::to('index.php');
}

