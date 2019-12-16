$(function(){

    //lembrete : caso queria pegar um dado ou imagem fora de um formulario basta rever a aula 29 php super avanaço

    //invalida o submit
    $('#formulario').on('submit', function(e){
        e.preventDefault();

        //pega todos dados do formulario
        var form = $('#formulario')[0];
        //coverte o formulario
        var data = new FormData(form);

        $.ajax({
            type:'POST',
            url: 'recebedor.php',
            data:data,
            contentType:false,
            processData:false,
            success:function(msg){
                alert(msg);
            }
        });
    });
});