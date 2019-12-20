$(document).ready(function() {
     console.log("Script cargado correctamente");

     //#region Click button borrar carrito
     $('#deleteChart').click(function(data){
          $.ajax({
               type:'POST',
               url: './php/script/producto/borrarCarroCompras.php',
               success:function(data){
                    if(data.trim() === "Carrito eliminado"){
                         $('section.main').html("<h1>Carrito de compras vacio</h1>");
                    }
               }
          })
     })
     //#endregion


})