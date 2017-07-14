<?php

session_start();

if(isset($_SESSION['id'])){
    $document_root = str_repeat('../',(substr_count(getenv('SCRIPT_URL'),'/')));
?>
<div class="userContainer">
    <div class="uname"><?=$_SESSION['uname']?></div>
    <button id="addPost">Add Post</button>
    <a href="<?= $document_root ?>/farfromperfect/public/blog/logout"><button>Logout</button></a>
</div>

<div id="formContainer">
    <form action="blog/addpost">
        <input type="text" placeholder="Title" name="title" required><br>
        <input type="file" placeholder="Image (optional)"><br>
        <textarea name="message" rows="10" cols="30"></textarea>
        <input type="submit" value="submit">
    </form>
</div>
<?php
}
?>
<h1>Blog</h1>
<?php
//retrieving each post from controller
    foreach($data['blog']->getPosts() as $post){
?>
<div class="postContainer">
    <div class="postTitle"><h2><?= $post->getTitle()?></h2></div>
    <div class="postDate"><?= $post->getDate()?></div>
    <div class="postText"><?= $post->getText()?></div>
</div>
<?php
    }
?>