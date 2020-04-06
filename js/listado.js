$(document).ready(function() {
    
    //Inicializando

    $('#consultPrice').click(function(){
        let minPrice = $('.sidebarPrice>.body>.inputs>input:nth-child(1)').val();
        let maxPrice = $('.sidebarPrice>.body>.inputs>input:nth-child(2)').val();
        $.ajax({
            type: 'POST',
            url: './php/script/producto/ObtenerInstrumentosEnRangoDePrecio.php',
            data: {minPrice,maxPrice},
            success: function(data){
                var instrumentos = JSON.parse(data);
                console.log(instrumentos);
                $('.productos>.productos').html('');
                for (let i = 0; i < instrumentos.length ; i ++){
                $('.productos>.productos').append(`<div class="card">
                                                                    <img src="${ instrumentos[i]['imagen']}">
                                                                         <div class="card-body">
                                                                            <h5 class="card-title">${ instrumentos[i]['nombre']}</h5>
                                                                            <p>${ instrumentos[i]['precio']}</p>
                                                                            <a href="producto-detalle?intrument=${ instrumentos[i]['id']}" class="btn btn-primary btn-block">Ver más</a>
                                                                        </div>
                                                                    </div>`)
                }
            }
        })
    })


    //Click en lista de marcas
    $('.sidebarMarcas>.body>ul>li').click(function(){
        $('.sidebarMarcas>.body>ul>li').each(function() {
            $(this).css("color","black");
          });
        $(this).css("color","#e67a7a");
        let marca = $(this).children('p').data('id');
        $.ajax({
            type: 'POST',
            url: './php/script/producto/ObtenerInstrumentosPorMarca.php',
            data: {marca},
            success: function(data){
                 var instrumentos = JSON.parse(data);
                console.log(instrumentos);
                $('.productos>.productos').html('');
                for (let i = 0; i < instrumentos.length ; i ++){
                $('.productos>.productos').append(`<div class="card">
                                                                    <img src="${ instrumentos[i]['imagen']}">
                                                                         <div class="card-body">
                                                                            <h5 class="card-title">${ instrumentos[i]['nombre']}</h5>
                                                                            <p>${ instrumentos[i]['precio']}</p>
                                                                            <a href="producto-detalle?intrument=${ instrumentos[i]['id']}" class="btn btn-primary btn-block">Ver más</a>
                                                                        </div>
                                                                    </div>`)
                }

            }
        })
    })







})