$(function(){

    var valor;

    $('input').on('focus', function(){
        var pos = $(this).offset();
        var width = $(this).width();

        $('.horaescolha').css('left', pos.left + width - 470);
        $('.horaescolha').css('top', pos.top)
        $('.horaescolha').show();

        valor = $(this);
    });

    $('input').on('blur', function(){

        setTimeout(function(){
            $('.horaescolha').hide();
        },200);
    });

    $('.horaescolha button').on('click',function(){
        var hora = $(this).html();
        valor.val(hora);
    });
});