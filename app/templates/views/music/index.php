<!-- <link rel="stylesheet" href="/farfromperfect/public/styles/about.css"> -->
<script src="//api.html5media.info/1.2.2/html5media.min.js"></script>
<script src="/farfromperfect/public/js/music.js"></script>
<div id="musicplayer">
<div id="currentSong"><audio preload="" id="audio1" controls="controls" src="/farfromperfect/app/songs/004.mp3">Your browser does not support HTML5 Audio!</audio></div>

<?php
//reverse chronological order
$playlist = array_reverse($data['playlist']->getSongs(), true);

//iterate through all the songs
foreach($playlist as $song){
    $object = new stdClass();

    $object->sid = $song->getId();
    $object->title = $song->getTitle();
    $object->year = $song->getYear();
    $object->duration = $song->getDuration();

    //change the hh:mm:ss to mm:ss
    $object->duration = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $object->duration);
    sscanf($object->duration, "%d:%d:%d", $hours, $minutes, $seconds);

    $object->path = $song->getPath();
    
    $json = json_encode($object);
?>
<script>playlist.push(<?= $json?>);</script>
<!--HTML FOR EACH SONG-->
    <div class="song">
        <div class="songtitle"><?= $object->title?> (<?= $object->year ?>)</div>
        <div class="songduration"><?= $object->duration ?></div>
    </div>
<?php
}
?>
</div>
<script></script>
