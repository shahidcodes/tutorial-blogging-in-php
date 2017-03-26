<?php
require_once 'core/init.php';
if((isset($_GET['name']) && isset($_GET['slug'])) && ($_GET['name'] !== '' && $_GET['slug'] !== '') ){
	$name = safe_str($_GET['name']);
	$slug = safe_str($_GET['slug']);
	?>
	<!-- header -->
	<?php include 'includes/header.php'; ?>
	<!-- /header -->
	<div class="container">
		<div class="col-md-12 flex">
			<hr>
			<!-- tut-nav -->
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
						$id[] = $post->slug;
						//echo '<li><a href="post.php?name=',$name,'&slug=',$post->slug,'" class="text-danger">',$post->post_title,'</a></li>';
						echo '<li class="list-group-item"><a href="',base,'/post/',ui($name),'/',ui($post->slug),'" class="text-danger">',safe_str($post->post_title),'</a></li>';
					}
					echo '</ul>';
					?>
				</div>
			</div>
			<!-- /tut-nav -->
			<!-- post -->
			<div class="col-md-8 tut-post">
				<?php 
				$post = $query->getAll(array('slug', $slug))->first();
				?>
				<h1><?=$post->post_title?></h1>
				<p>
				<?php
				echo nl2br($post->post_content),'</p>';
				$query = new Query;
				$query->add_hits($post->id);
				$key = array_search($slug, $id);
				$next = ((count($id)-1)>$key)?$key+1:NULL;
				$prev = ($key>0)?$key-1:NULL;
				?>
				<!-- Prev Button -->
				<div class="prev-next-buttons">
					<?php if (isset($prev)): ?>
					<a class="" href="<?=base?>/post/<?=$name?>/<?=ui($id[$prev])?>"><font style="font-size:2em;">&lt;Prev Lesson</font></a>
					<?php endif; ?>
					<!-- Next Button -->
					<?php if (isset($next)): ?>
					<a class="pull-right" href="<?=base?>/post/<?=$name?>/<?=ui($id[$next])?>"><font style="font-size:2em;">Next Lesson&gt;</font></a>
					<?php endif; ?>	
				</div>
				<!-- /Prev Button -->
			</div>
			<!-- /post -->
		</div>
		
<?php
	include 'includes/footer.php';
}else{
	header('Location: '.base);
}
?>