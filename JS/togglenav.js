$(document).ready(function(){
    $('span.navbar-toggler-icon').click(function(){
        $('#navbarSupportedContent').toggle('slow');
        $('span.navbar-toggler-icon').css('display', 'none');
        $('.cross-icon').css('display','block');   
    });

    $('span.cross-icon').click(function(){
        $('#navbarSupportedContent').toggle('slow');
        $('.toggler').css('display','flex');
        $('.cross-icon').css('display','none');
    });

});
