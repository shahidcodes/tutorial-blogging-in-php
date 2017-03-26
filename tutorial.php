<?php
require_once 'core/init.php';
if(isset($_GET['name']) && $_GET['name'] !== ''){
	$name = safe_str($_GET['name']);
	?>
	<!-- header -->
	<?php include 'includes/header.php'; ?>
	<!-- /header -->
	<div class="container">
	<div class="col-md-12 flex">
	<hr>
	<!-- nav -->
		<div class="col-md-4 tut-nav" id="post-nav">
		<div class="panel panel-default">
			<div class="panel-heading">
			<h3 class="panel-title">Lesson Navigation : </h3>
		</div>
		<?php
		$query = new Query;
		$res = $query->getAll(array('cat_name', $name))->results();
		echo '<ul class="list-group">';
		foreach ($res as $post) {
			$id[] = $post->id; //id of each post
			$pid[$post->id] = $post->slug; //slug of each post and key of array as post id
			//echo '<li><a href="post.php?name=',$name,'&slug=',$post->slug,'" class="text-danger">',$post->post_title,'</a></li>';
			echo '<li class="list-group-item"><a href="',base,'/post/',safe_str($name),'/',safe_str($post->slug),'" class="text-danger">',$post->post_title,'</a></li>';
		}
		echo '</ul>';
		?>
		</div>
		</div>
	<!-- /nav -->
	<!-- post -->
		<div class="col-md-8 tut-post">
		<?php
		$post = $query->getAll(array('cat_name', $name));
		if($post->count()){
			$post = $post->first()
			?><br>
			<h1 class="post-heading"><?=nl2br($post->post_title)?></h1>
			<p>
			<?php
			$query->add_hits($post->id);
			echo nl2br($post->post_content);
		}else{
			echo '<h1>Sorry, No Post In this Category</h1>';
		}
		?>
		</p>
		<div class="prev-next-buttons">
		<?php if(isset($id[1])): ?>
		<a class="text-warning" href="<?=base?>/post/<?=$name?>/<?=safe_str($pid[$id[1]])?>"><font style="font-size:2em;">Next Lesson&gt;</font></a>
		<?php endif;?>
		</div>
		</div>
	<!-- /post -->
	</div>
	</div>
<?php
	include 'includes/footer.php';
}else{
	header('Location: '.base.'/tutorial/html');
}
?>