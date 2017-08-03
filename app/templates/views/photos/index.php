 <link rel="stylesheet" href="/farfromperfect/public/styles/photos.css"> 

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
        <span class="phelp"></span><img data-src="<?= $object->path?>">
    </div>
<?php
}
?>
<script>
pl = <?= json_encode($json)?>
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/templates/views/templating/footer.php'; ?>
</div>
<script src="/farfromperfect/public/js/photos.js"></script>

