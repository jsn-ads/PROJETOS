$(function(){
    $('a.galeria').on('click',function(){
        var img = $(this).find('img').attr('src');
        $('.divbox img').attr('src', img);
        $('.bgbox, .divbox').fadeIn('fast');
    });

    $('.bgbox, .divbox button').on('click',function(){
        $('.bgbox, .divbox').fadeOut('fast');
    });
});