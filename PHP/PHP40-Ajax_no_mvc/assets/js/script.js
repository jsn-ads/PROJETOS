$(function(){
    $('button').on('click', function(){

        var nome = $('#nome').val();

        $.ajax({
            url: '/Projetos/05-PROJETOS/PHP/PHP40-Ajax_no_mvc/ajax',
            type:'POST',
            data:{nome:nome},
            dataType:'json',
            success:function(json){
                $('.borda').html(json.frase);
            }
        });
    });
});