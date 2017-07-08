<?php

session_start();

if(isset($_SESSION['id'])){
    $document_root = str_repeat('../',(substr_count(getenv('SCRIPT_URL'),'/')));
?>
<div class="userContainer">
    <div class="uname"><?=$_SESSION['uname']?></div>
    <a href="<?= $document_root ?>/farfromperfect/public/blog/addpost">Add Post</a>
    <a href="<?= $document_root ?>/farfromperfect/public/blog/logout">Logout</a>
</div>
<?php
}
?>


<h1>Blog</h1>