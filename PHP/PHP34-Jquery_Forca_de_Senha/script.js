$(function(){
    $('#senha').on('keyup',function(){

        var senha = $(this).val();
        var forca = 0;

        //Expressao Regular de apenas Letras
        var reg1 = new RegExp(/[a-z]/i);
        //Expressao Regular de apenas Numeros
        var reg2 = new RegExp(/[0-9]/i);
        //Expressao Regular de caracteres especiais
        var reg3 = new RegExp(/[^a-z0-9]/i);


        if(senha.length > 6){
            forca += 25;
        }

        if(reg1.test(senha)){
            forca += 25;
        }

        if(reg2.test(senha)){
            forca += 25;
        }

        if(reg3.test(senha)){
            forca += 25;
        }

        if(forca == 0){
            $('#forca').html('');
        }else if(forca == 25){
            $('#forca').html('Fraca').css('color','red');
        }else if(forca == 50){
            $('#forca').html('Media').css('color','yellow');
        }else if(forca == 75){
            $('#forca').html('Moderada').css('color','green');
        }else if(forca == 100){
            $('#forca').html('Forte').css('color','blue');
        }

    });
});