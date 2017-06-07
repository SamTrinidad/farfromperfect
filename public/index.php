<?php
$document_root = str_repeat('../',(substr_count(getenv('SCRIPT_URL'),'/')));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Far From Perfect</title>
    <link rel="stylesheet" href="<?= $document_root ?>/farfromperfect/public/styles/style.css">

</head>
<body>
<nav>
    <a href="/farfromperfect/public/" id="navlogo">
        <object type="image/svg+xml" data="<?= $document_root ?>/farfromperfect/public/media/ffp.svg" class="navLogo"></object>
    </a>
    <a href="<?= $document_root ?>/farfromperfect/public/about/" class="link">About</a>
    <a href="<?= $document_root ?>/farfromperfect/public/music/" class="link">Music</a>
    <a href="<?= $document_root ?>/farfromperfect/public/shows/" class="link">Shows</a>
    <a href="<?= $document_root ?>/farfromperfect/public/blog/" class="link">Blog</a>
    <a href="<?= $document_root ?>/farfromperfect/public/contact/" class="link">Contact</a>
</nav>

<div id="burgercontainer">
	<svg id="burger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150">
    <style>.a{fill:#FFF;}</style>
        <path d="M117.1 40.3H33.3c-1.6 0-3-1.4-3-3V25.8c0-1.6 1.4-3 3-3h83.9c1.6 0 3 1.4 3 3v11.5C120.1 38.9 118.8 40.3 117.1 40.3z" class="a"/>
        <path d="M117.1 67.2H33.1c-1.6 0-3-1.4-3-3V52.7c0-1.6 1.4-3 3-3h84.1c1.6 0 3 1.4 3 3v11.5C120.1 65.9 118.8 67.2 117.1 67.2z" class="a"/>
        <path d="M117.1 94.2H33.1c-1.6 0-3-1.4-3-3V79.7c0-1.7 1.4-3 3-3h84.1c1.6 0 3 1.3 3 3v11.5C120.1 92.9 118.8 94.2 117.1 94.2z" class="a"/>
        <path d="M117.1 121.2H33.1c-1.6 0-3-1.4-3-3v-11.5c0-1.7 1.4-3 3-3h84.1c1.6 0 3 1.3 3 3v11.5C120.1 119.9 118.8 121.2 117.1 121.2z" class="a"/>
    </svg>
    <svg id="burgerx" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150">
        <style>.a{fill:#FFF;}</style>
        <path d="M111.6 124.6L25.4 38.4c-3.6-3.6-3.6-9.4 0-13l0 0c3.6-3.6 9.4-3.6 13 0l86.1 86.1c3.6 3.6 3.6 9.4 0 13l0 0C121 128.1 115.2 128.1 111.6 124.6z" class="a"/>
        <path d="M124.6 38.4l-86.1 86.1c-3.6 3.6-9.4 3.6-13 0l0 0c-3.6-3.6-3.6-9.4 0-13l86.1-86.1c3.6-3.6 9.4-3.6 13 0l0 0C128.1 29 128.1 34.8 124.6 38.4z" class="a"/>
    </svg>
</div>
<div id="loader"></div>
<div id="container">
<?php
    require_once( $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/templates/init.php');
?>
</div>



<!--Loader-->
<div class="loader">
  <div class="loaderlogo">Loading</div>
</div>
<style>
.loader {
    -webkit-animation: load-out 1s ease-in;
    animation: load-out 1s ease-in;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}

@-webkit-keyframes load-out {
    from {
        top: 0;
        opacity: 1;
    }

    to {
        top: 100%;
        opacity: 0;
    }
}

@keyframes load-out {
    from {
        top: 0;
        opacity: 1;
    }

    to {
        top: -100%;
        opacity: 0;
    }
}
</style>
<script type="application/javascript" src="<?= $document_root ?>/farfromperfect/public/js/jquery-3.1.1.min.js"></script>
<script type="application/javascript" src="<?= $document_root ?>/farfromperfect/public/js/script.js"></script>
</body>
</html>