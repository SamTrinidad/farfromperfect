
//global variables
var playlist = [];
var p;

//music player module
var MusicPlayer = function() {

        var max, current,
        playing = false,
        audio = $('#audio').bind('play', function(){
            playing = true;
        }).bind('pause', function(){
            playing = false;
        }),
        changeTitle = function() {

            //adjust to the playlist
            var sid = max - current;

            $('#currentTitle').text(playlist[sid].title);
            $('#currentYear').text(playlist[sid].year);
            $('#currentDuration').text(playlist[sid].duration);
        }

        function init(num){
            max = num;
            current = max;
            changeTitle();
        }
        
        function play(num){
            changeTitle();
            audio.attr("src", "/farfromperfect/app/songs/" + current + ".mp3");
            audio.get(0).play();
        }

        return {
            "init" : init,
            "prev": function(){
                if(current === max){
                current = 1;
                }else{
                    current++;
                }
                play(current);
            },
            "next" : function() {
                if(current === 1){
                    current = max;
                }else{
                    current--;
                }
                play(current);
            },
            "current" : function() {
                return current;
            },
            "set" : function(num){
                current = num;
                play(current)
            },
            "play" : play
        }
};

$(document).ready(function(){
    p = new MusicPlayer();
    p.init(playlist.length);

    $(".song").click(function(){  
        var songId = $(this).attr('id').replace('sid','');;
        p.set(songId);
        console.log(songId);
    });


    $('#prevsong').click(function() {
        p.prev();
    });
    $('#nextsong').click(function() {
        p.next();
    })
});

