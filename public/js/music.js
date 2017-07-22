"use strict"
//global variables
var playlist = [];
var p;

//music player module
var MusicPlayer = function() {

        var max, current,
        playing = false,

        //binding functions to audio player events
        audio = $('#audio').bind('play', function(){
            playing = true;
        }).bind('pause', function(){
            playing = false;
        }).bind('ended', function(){
            if(current === 1){
                playing = false;
                audio.get(0).pause();
            }else{
                playing = true;
                next();
            }
        }),
        changeTitle = function() {

            //adjust sid to match the playlist
            var sid = max - current;

            //change the title of the current song playing
            $('#currentTitle').text(playlist[sid].title);
            $('#currentYear').text("(" + playlist[sid].year + ")");
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
            audio.get(0).play(); //gotta use get(0) to access the dom
        }

        function next() {
            if(current === 1){
                    current = max;
            }else{
                current--;
            }
            play(current);
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
            "next" : next,
            "current" : function() {
                return current;
            },
            "set" : function(num){
                current = num;
                play(current)
            },
            "getStatus": function(){
                return playing;
            },
            "play" : play
        }
};

$(document).ready(function(){
    p = new MusicPlayer();
    p.init(playlist.length);

    //click commands for the music player
    $(".song").click(function(){  
        var songId = $(this).attr('id').replace('sid','');;
        p.set(songId);
    });
    $('#prevsong').click(function() {
        p.prev();
    });
    $('#nextsong').click(function() {
        p.next();
    })
});

