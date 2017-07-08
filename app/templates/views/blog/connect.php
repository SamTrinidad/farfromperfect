<?php

session_start();

$_SESSION['id'] = $data['id'];
$_SESSION['uname'] = $data['uname'];

echo 'Hello ' . $data['uname'];

$document_root = str_repeat('../',(substr_count(getenv('SCRIPT_URL'),'/')));

?>
<a href="<?= $document_root . '/farfromperfect/public/blog/' ?>">Continue</a>

