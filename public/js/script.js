
$(document).ready(function(){

    //event of clicking the nav burger
    $('#burgercontainer').click(function() {
        $('nav').slideToggle(200, function() {
            $('nav').animate({ top: -20 }, 100).animate({ top: 0 }, 100).animate({ top: -10 }, 100).animate({ top: 0 }, 100);
        });
        $('#burgercontainer svg').toggle();
    });
    
});

function navSwitch() {
    $('nav').slideToggle(200, function() {
            $('nav').animate({ top: -20 }, 100).animate({ top: 0 }, 100).animate({ top: -10 }, 100).animate({ top: 0 }, 100);
    });
    $('#burgercontainer svg').toggle();
}