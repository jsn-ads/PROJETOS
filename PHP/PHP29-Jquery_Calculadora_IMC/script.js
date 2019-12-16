$(function(){
    $('button').on('click',function(){
        var altura = $('#altura').val();
        var peso = $('#peso').val();

        altura = altura.replace(',','.');
        peso = peso.replace(',','.');

        var imc = peso / (altura * altura);
        
        var traducao = [
            "Baixo peso muito grave",
            "Baixo peso grave",
            "Baixo peso",
            "Peso normal",
            "Sobrepeso",
            "Obesidade grau I",
            "Obesidade Grau II",
            "Obesidade Grau III"
                        ];
        var valor = [16 , 16.99, 17, 18.49, 18.50, 24.99, 25, 29.99, 30, 34.99, 35, 39.99, 40];

        if(imc < valor[0]){
            $('#resultado').html("Seu IMC é: "+imc+" kg/m2 "+traducao[0]);
        }else if(imc >= valor[0] && imc < valor[1]){
            $('#resultado').html("Seu IMC é: "+imc+" kg/m2 "+traducao[1]);
        }else if(imc >= valor[2] && imc < valor[3]){
            $('#resultado').html("Seu IMC é: "+imc+" kg/m2 "+traducao[2]);
        }else if(imc >= valor[4] && imc < valor[5]){
            $('#resultado').html("Seu IMC é: "+imc+" kg/m2 "+traducao[3]);
        }else if(imc >= valor[6] && imc < valor[7]){
            $('#resultado').html("Seu IMC é: "+imc+" kg/m2 "+traducao[4]);
        }else if(imc >= valor[8] && imc < valor[9]){
            $('#resultado').html("Seu IMC é: "+imc+" kg/m2 "+traducao[5]);
        }else if(imc >= valor[10] && imc < valor[11]){
            $('#resultado').html("Seu IMC é: "+imc+" kg/m2 "+traducao[6]);
        }else if(imc >= valor[12]){
            $('#resultado').html("Seu IMC é: "+imc+" kg/m2 "+traducao[7]);
        }
    });
});