var jogador = 'o';

function atualizarPlacar(){
    if(jogador == 'o'){
        $('.placar img').attr('src', 'circle.png');
    }else{
        $('.placar img').attr('src', 'delete.png');
    }
}

function verificarCampeao(){
    var a1 = $('.a1').attr('data-marcado');
    var a2 = $('.a2').attr('data-marcado');
    var a3 = $('.a3').attr('data-marcado');

    var b1 = $('.b1').attr('data-marcado');
    var b2 = $('.b2').attr('data-marcado');
    var b3 = $('.b3').attr('data-marcado');

    var c1 = $('.c1').attr('data-marcado');
    var c2 = $('.c2').attr('data-marcado');
    var c3 = $('.c3').attr('data-marcado');
    
    var ganhador = '';

    for(var i = 0;i <= 1;i++){
        
        if(i == 0){
            var op = 'o';
        }else {
            var op = 'x';
        }

        if(a1 == op && b1 == op && c1 == op){
            ganhador = op;
        }else if(a2 == op && b2 == op && c2 == op){
            ganhador = op;
        }else if(a3 == op && b3 == op && c3 == op){
            ganhador = op;
        }else if(a1 == op && a2 == op && a3){
            ganhador = op;
        }else if(b1 == op && b2 == op && b3 == op){
            ganhador = op;
        }else if(c1 == op && c2 == op && c3 == op){
            ganhador = op;
        }else if(a1 == op && b2 == op && c3 == op){
            ganhador = op;
        }else if(c1 == op && b2 == op && a3 == op){
            ganhador = op;
        }

        if(ganhador != ''){

            if(ganhador == 'o'){
                $('#vencedor').css('display','block');
                $('#vencedor').html('<img src="circle.png"/>');
                alert('Vencedor : O');
            }else{
                $('#vencedor').css('display','block');
                $('#vencedor').html('<img src="delete.png"/>');
                alert('Vencedor : X');
            }

            $('.area').html('');
            $('.area').attr('data-marcado','');
            $('#vencedor').css('display','none');
        }else if(a1 != '' && a2 != '' && a3 != '' && b1 != '' && b2 != '' && b3 != '' && c1 != '' && c2 !='' && c3 != ''){
            $('.area').html('');
            $('.area').attr('data-marcado','');
            $('#vencedor').css('display','none');
        }

    }
}

$(function(){

    atualizarPlacar();

    $('.area').on('click',function(){
        if($(this).find('img').length == 0){
            if(jogador == 'o'){
                $(this).html('<img src="circle.png"/>');
                $(this).attr('data-marcado', 'o');
                jogador = 'x';
            }else{
                $(this).html('<img src="delete.png" border="0" height="50"/>');
                $(this).attr('data-marcado', 'x');
                jogador = 'o';
            }

            atualizarPlacar();
            verificarCampeao();
        }
    });
});