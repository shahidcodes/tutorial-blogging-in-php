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

    <title>Manage Post</title>

    <link href="<?=base?>/includes/bootstrap.min.css" rel="stylesheet">
    
    <link href="<?=base?>/includes/admin.css" rel="stylesheet">
    <script type="text/javascript" src="<?=base?>/includes/jquery.js"></script>
    <!-- <script type="text/javascript" src="<?=base?>/includes/tinymce/tinymce.min.js"></script>-->
  </head>
<body>
<div class="container">
<!-- Header -->
    <header>
        <h1>Welcome <?=($user->data()->username);?></h1>
        <pre>See Below To Change And Edit Web Site</pre>
    </header>
    <!-- Nav -->
    <nav class="navbar navbar-default">
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?=base?>/admin">Home</a></li>
            <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <?php
                $query = new Query;
                $cats = $query->catName(); 
                foreach($cats as $cat){ ?>
                    <li class="small-caps"><a href="?cat=<?=$cat->cat_name?>"><?=safe_str($cat->cat_name)?></a></li>
                <?php }?>
                </ul>
            </li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav><!-- /end-nav -->

    <?php
    //action-center

    if (Input::get('action') !== '') {
        $action = strtolower(Input::get('action'));
        if($action === 'add' || $action === 'edit'){
            if($action == 'edit' && Input::get('id')){
                $e = ($action === 'edit')? true : false;
                if ($e) {
                    $id = Input::get('id');
                    $query = new Query();
                    $post  = $query->getAll(array('id', $id));
                    $post = $post->first();
                }
            }elseif($action === 'add'){
                $e = false;
            }else{
                Session::flash('msg', danger_div('No Intrusion Please'));
                Redirect::to('home.php');
            }
        ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?=safe_str(ucfirst($action))?> Post</h3>
                    </div>
                <div class="panel-body">
                <?=Session::flash('msg')?>
                    <div class="col-md-8">
                        <form class="form" role="form" method="POST" action="<?=$action?>.php">
                            <div class="form-group">
                                <label for="title">Title: </label>
                                <input type="text" class="form-control" <?php if($e)echo 'value="',$post->post_title,'"' ?> name="title" id="title" placeholder="Post title">
                            </div>
                            <div class="form-group">
                                <label for="content">Content: </label>
                                <textarea id="editor1" name="content" rows="10" class="form-control"><?php if($e)echo trim($post->post_content)?></textarea>
                            </div>
                    </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label for="tags">Tags: (comma separated) </label>
                            <input type="text" class="form-control" name="tags" <?php if($e)echo 'value="',$post->tags,'"' ?> placeholder="Post tags">
                        </div>
                        <div class="form-group">
                            <label for="cat">Category: </label>
                            <select name="cat" class="form-control">
                            <?php foreach($cats as $cat):?>
                                <option <?php if($e && $post->cat_name === $cat->cat_name)echo 'selected="selected"';?>><?=$cat->cat_name?></option>
                            <?php endforeach?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Url Slug: </label>
                            <input type="text" class="form-control" name="slug" <?php if($e)echo 'value="',$post->slug,'"' ?> placeholder="Url Slug">
                        </div>
                </div>
                        <?php if($e):?>
                        <input type="hidden" name="modified" id="date" >
                        <input type="hidden" name="id" value="<?=$post->id?>">
                        <?php endif?>
                        <input type="hidden" name="date" <?php if($e)echo 'value="',$post->date,'"';else echo ' id="date"'?>>
                        <input type="submit" class="btn btn-default" value="<?=safe_str(ucfirst($action))?>">
                        </form>
                </div>
                </div>
<?php
}//$action
    }else{
        Session::flash('error', danger_div('Something Happened'));
        Redirect::to('home.php');
    }
    ?>
<div>
<script type="text/javascript" src="<?=base?>/includes/edit.js"></script>
<script type="text/javascript">
    tinymce.init({
        'selector' : 'textarea#editor1',
        entity_encoding: "raw"
        });
</script>
<?php
require_once doc.'/includes/footer.php';
}else{
    echo "Cmon! Dont Try Your Skills";
}
