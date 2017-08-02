 <link rel="stylesheet" href="/farfromperfect/public/styles/photos.css"> 

<?php
session_start();

if(isset($_SESSION['id'])){
    $document_root = str_repeat('../',(substr_count(getenv('SCRIPT_URL'),'/')));
?>
<div class="userContainer">
    <div class="uname"><?=$_SESSION['uname']?></div>
    <button id="addPhoto">Add Photo</button>
    <a href="<?= $document_root ?>/farfromperfect/public/photos/logout"><button>Logout</button></a>
</div>
    <form id="photoform" action="blog/addpost">
        <input type="file" placeholder="Image"><br>
        <textarea name="Description" rows="10" cols="30"></textarea>
        <input type="submit" value="submit">
    </form>
<?php
}
?>
<div id=albumContainer>
<?php
//get the photos from the controller
$album = $data['album']->getPhotos();

$json = new stdClass();

foreach($album as $photo){
    $object = new stdClass();

    $object->pid = $photo->getId();
    $object->description = $photo->getDescription();
    $object->path = $photo->getPath();
    $object->date = $photo->getDate();
    
    $json->{$object->pid} = $object;
?>
    <div class="photo" id="pid<?=$object->pid ?>">
        <img data-src="<?= $object->path?>">
    </div>
<?php
}
?>
<script>
pl = <?= json_encode($json)?>
</script>
</div>
<script src="/farfromperfect/public/js/photos.js"></script>