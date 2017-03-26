<?php

require_once '../core/init.php';
$user = new User();
if ($user->isLogged()) {
	if (Input::exists() || Input::exists('get')) {
		if(Input::get('action') && Input::get('action') === 'delete'){
			//delete-post

			$query = new Query;
			if ($query->delete(array('id', '=', Input::get('id')))) {
				Session::flash('msg', danger_div('Successfully Deleted!'));
				Redirect::to('home.php?cat='.Input::get('cat'));
			}

		}else{
			//add-post
			$post_title 	= Input::get('title');
			$post_content 	= trim(Input::get('content'));
			$tags 			= Input::get('tags');
			$slug 			= Input::get('slug');
			$cat_name 		= Input::get('cat');
			$modified 		= Input::get('modified');
			$date			= Input::get('date');
			$id 			= Input::get('id');
			$field = array(	'post_title' => $post_title,
							'post_content' 	=> $post_content,
							'tags'			=> $tags,
							'slug'			=> $slug,
							'cat_name'		=> $cat_name,
							'modified'		=> $modified,
							'date'			=> $date
							);
			$query = new Query;
			if ($query->update($id, $field)) {
				Session::flash('msg', danger_div('Successfully Edited'));
				Redirect::to('post.php?action=edit&id='.$id);
			}else{
				echo "Error: ", print_r($query->last_error());
			}
		}
	}else{
		Redirect::to('home.php');
	}
}else{
	Redirect::to('index.php');
}