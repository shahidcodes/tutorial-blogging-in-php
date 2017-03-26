<?php

require_once '../core/init.php';
$user = new User();
if ($user->isLogged()) {
	if (Input::exists()) {
		$post_title = Input::get('title');
		$post_content = trim(Input::get('content'));
		$tags = Input::get('tags');
		$slug = Input::get('slug');
		$cat_name = Input::get('cat');
		$date = Input::get('date');

		$field = array(	'post_title' => $post_title,
						'post_content' 	=> $post_content,
						'tags'			=> $tags,
						'slug'			=> $slug,
						'cat_name'		=> $cat_name,
						'date'			=> $date
						);
		$post = new Post;
		if ($post->insert('posts',$field)) {
			Session::flash('msg', danger_div('Successfully Added! You Can Edit Now!'));
			Redirect::to('post.php?action=edit&id='.$post->last_insert());
		}else{
			echo "Error";
		}
	}else{
		Redirect::to('index.php');
	}
}else{
	Redirect::to('index.php');
}