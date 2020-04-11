$(document).ready(function(){


    var globalProductName = "";
    var globalProductDescription = "";
    var globalProductPrice = "";
    var globalProductImg = "";
    var globalProductMarca = "";
    var globalProductStock = "";
    var globalProductTipo = "";
    var globalProductCategoria = "";

// Funciones
$('.deleteProduct').click(function(){
    console.log("Eliminando producto");
    Swal.fire({
        title: 'Esta seguro?',
        text: "Este producto se eliminara permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
          //Ejecutras AJAX
          $(this).parent().parent().fadeOut();
          Swal.fire(
            'Eliminado con éxito.',
            'El producto fue eliminado',
            'success'
          )
        }
      })
})


$('.editProduct').click(function(){
    console.log("Editando producto");


    let productName = $(this).parent().parent().children('tr > td:nth-child(1)').text();
    globalProductName = productName;
    let productDescription = $(this).parent().parent().children('tr > td:nth-child(2)').text();
    globalProductDescription = productDescription
    let productPrice = $(this).parent().parent().children('tr > td:nth-child(3)').text();
    globalProductPrice = productPrice;
    let productImg = $('.productImg').attr('src');
    globalProductImg = productImg;
    let productStock = $(this).parent().parent().children('tr > td:nth-child(5)').text();
    globalProductStock = productStock
    let productMarca = $(this).parent().parent().children('tr > td:nth-child(6)').text();
    globalProductMarca = productMarca
    let productTipo = $(this).parent().parent().children('tr > td:nth-child(7)').text();
    globalProductTipo = productTipo
    let productCategoria = $(this).parent().parent().children('tr > td:nth-child(8)').text();
    globalProductCategoria = productCategoria


    console.log(productImg);

    $("#img").attr("src", productImg);
    
    $('#productName').val(productName);
    $('#productDescription').val(productDescription);
    $('#productPrice').val(productPrice);
    
    console.log($('#inputMarca option:selected').text(productMarca));
    // console.log($('#inputTipo option:selected').text(productTipo));
    // console.log($('#inputCategoria option:selected').text(productCategoria));





    // Swal.fire({
    //     title: 'Esta seguro?',
    //     text: "Este producto se eliminara permanentemente",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Eliminar',
    //     cancelButtonText: 'Cancelar'
    //   }).then((result) => {
    //     if (result.value) {
    //       //Ejecutras AJAX
    //       $(this).parent().parent().fadeOut();
    //       Swal.fire(
    //         'Eliminado con éxito.',
    //         'El producto fue eliminado',
    //         'success'
    //       )
    //     }
    //   })
})

    $('body').on('click','#updateProduct',function(){
        let newProductName = $('#productName').val();
        let newProductDescription = $('#productDescription').val();
        let newProductPrice = $('#productPrice').val();
        // let newProductName = $('#productName').val();

        if(newProductName !== globalProductName &&
           newProductDescription  !== globalProductDescription &&
           newProductPrice !== globalProductPrice 
            
            ){
            // console.log("Nombre fue modificado");
        }else{
            // console.log("Nombre no fue modificado");
        }



        // console.log(globalProductName);
        // console.log(newProductName);

        
    });


})