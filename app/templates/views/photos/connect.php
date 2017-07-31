<?php

session_start();

$_SESSION['id'] = $data['id'];
$_SESSION['uname'] = $data['uname'];

$document_root = str_repeat('../',(substr_count(getenv('SCRIPT_URL'),'/')));

?>
<style>
    #welcomecontainer{
        position: relative;
        max-width: 200px;
        text-align: center;
        margin: auto;
        top: 40%;
    }
</style>
<div id="welcomecontainer">
<h2 id="welcomelogin">Hello <?= $_SESSION['uname']?></h2>
<a id="welcomebutton" href="<?= $document_root . '/farfromperfect/public/photos/' ?>"><button>Continue to Photos</button></a>
</div>
