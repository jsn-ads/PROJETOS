function verificarNotificacao(){

    $.ajax({
     
        url:'verificar.php',
        type:'POST',
        dataType:'json',
        success:function(json){

            if(json.qt > 0){
                $('.notificaçoes').addClass('not00');
                $('.notificaçoes').html(json.qt);
            }else{
                $('.notificaçoes').removeClass('not00');
                $('.notificaçoes').html('0');
            }
        }
    });
}

$(function(){
    
    setInterval(verificarNotificacao, 5000);
    verificarNotificacao();

    $('.addNotif').on('click', function(){
        
        $.ajax({
            url: 'add.php'
        });

    });

});