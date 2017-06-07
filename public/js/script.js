
$(document).ready(function(){
    // $.get('../app/templates/init.php', function(data) {
    //     $('#container').html(data);      
    // });
    // //iterate through all <a> tags and address them to the proper controller

    // $('nav').children().each(function( index ) {
    //     $(this).click(function() {

    //         $('.activelink').removeClass('activelink');
    //         $(this).addClass('activelink');

    //         var links = ['','about','music','shows','blog','contact'];
            
    //         //use get request to fill container with the content
    //         $.get('/app/templates/mvc.php?link='+links[index], function(data) {
    //             $('#container').html(data);
    //         }).fail(function(){
    //             $('#container').html("Failed to load Content");
    //         }); 
    //         navSwitch();
    //     });
    // });

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