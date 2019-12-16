$(function(){
    $('#cpf').mask('000.000.000-00', {reverse:true});
    $('#tel').mask('(00) 0000-0000');
    $('#cel').mask('(00) 0 0000-0000');
    $("#rg").mask('0000000');
    $('#nome , #pai, #mae, #prof').keyup(function(){
        this.value = this.value.replace(/[^A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g,'');
    });
});

$(function(){
    $('form').on('submit',function(e){

        e.preventDefault();

        var nome = $('#nome').val();
        var rg = $('#rg').val();
        var cpf = $('#cpf').val();
        var pai = $('#pai').val();
        var mae = $('#mae').val();
        var data = $('#data').val();
        var email = $('#email').val();
        var tel = $('#tel').val();
        var cel = $('#cel').val();
        var prof = $('#prof').val();
        var escol = $('#escolaridade').val();

        if(nome == ''){
            $('#nome').css('background-color','rgb(252,191,191)').css('border','solid 1px red');
        }else if(rg == ''){
            $('#rg').css('background-color','rgb(252,191,191)').css('border','solid 1px red');
        }else if(cpf == ''){
            $('#cpf').css('background-color','rgb(252,191,191)').css('border','solid 1px red');
        }else if(pai == ''){
            $('#pai').css('background-color','rgb(252,191,191)').css('border','solid 1px red');
        }else if(mae == ''){
            $('#mae').css('background-color','rgb(252,191,191)').css('border','solid 1px red');
        }else if(data == ''){
            $('#data').css('background-color','rgb(252,191,191)').css('border','solid 1px red');
        }else if(email == ''){
            $('#email').css('background-color','rgb(252,191,191)').css('border','solid 1px red');
        }else if(tel == ''){
            $('#tel').css('background-color','rgb(252,191,191)').css('border','solid 1px red');
        }else if(cel == ''){
            $('#cel').css('background-color','rgb(252,191,191)').css('border','solid 1px red');
        }else if(prof == ''){
            $('#prof').css('background-color','rgb(252,191,191)').css('border','solid 1px red');
        }else if(escol == ''){
            $('#escolaridade').css('background-color','rgb(252,191,191)').css('border','solid 1px red');
        }
        
        else{
            $.ajax({
                type: 'POST',
                url:'funcionario.php',
                data:{nome:nome , rg:rg, cpf:cpf, pai:pai, mae:mae, data:data, email:email, tel:tel, cel:cel, prof:prof, escol:escol},
                success: function(msg){
                    alert(msg);
                }
            });
        }
    });

    $('#btn2').on('click', function(){
        window.location.href = "index.php";
    });
});

