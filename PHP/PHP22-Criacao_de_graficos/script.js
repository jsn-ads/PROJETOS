window.onload = function(){
    var contexto = document.getElementById("grafico").getContext("2d");
    var grafico = new Chart(contexto, {
        type:'line',
        data:{
            labels: ['Janeiro','Fevereiro','Março','Abril'],
            datasets: [{
                label: 'Vendas',
                backgroundColor:'#FF0000',
                borderColor:'#FF0000',
                data:[3,6,7,4],
                fill:false
            },{
                label:'Custos',
                backgroundColor:'#00FF00',
                borderColor:'#00FF00',
                data:[2,5,8,3],
                fill:false
            }]
        }
    });
}