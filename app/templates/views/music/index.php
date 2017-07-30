 <link rel="stylesheet" href="/farfromperfect/public/styles/music.css"> 
<script src="//api.html5media.info/1.2.2/html5media.min.js"></script>
<script src="/farfromperfect/public/js/music.js"></script>
<div id="musicplayer">
<div id="currentSong"><h2><div id="currentTitle"></div></h2>&nbsp;&nbsp;<div id="currentYear"></div><div id="currentDuration"></div></div>
<div id="next-prev"><div id="prevsong">&laquo;</div><div id="nextsong">&raquo;</div></div>
<audio preload="" id="audio" controls="controls" src="/farfromperfect/app/songs/4.mp3">Your browser does not support HTML5 Audio.</audio>

<?php
//reverse chronological order
$playlist = $data['playlist']->getSongs();
$tracknum = 1;

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
    $object->duration = $minutes . ":" . $seconds;

    $object->path = $song->getPath();
    
    $json = json_encode($object);
?>
<script>playlist.push(<?= $json?>);</script>
    <div class="song" id="sid<?=$object->sid ?>">
        <div class="trackNum"><?= $tracknum++ ?>.</div>
        <div class="songtitle"><?= $object->title?> (<?= $object->year ?>)</div>
        <div class="songduration"><?= $object->duration ?></div>
    </div>
<?php
}
?>
</div>
