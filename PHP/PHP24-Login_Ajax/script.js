$(function(){
    $('#tbl-login').on('submit', function(e){
        e.preventDefault();

        var login = $('#nome').val();
        var password = $('#password').val();

        $.ajax({
            type:'POST',
            url:'login.php',
            data:{login:login, senha:password},
            success:function(msg){
                alert(msg);
            }
        });

    });
});