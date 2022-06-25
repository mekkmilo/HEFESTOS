/*=======================
editar categoria
======================*/

$(".btnEditarCategoria").click(function(){

    var idCategoria = $(this).attr("idCategoria");

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){

           $("#editarCategoria").val(respuesta["categoria"]);
           $("#idCategoria").val(respuesta["id"]);

            

        }

    })

})

/*=======================
eliminar categoria
======================*/

$(".btnEliminarCategoria").click(function(){

    var idCategoria = $ (this).attr("idCategoria");

    Swal.fire({

        title: '¿Seguro desea eliminarlo?',
        text:"¡Si no esta seguro, Cancele!",
        type: 'warning',
        showCancelButton:true,
        confirmButtonColor: '#cba052',
        cancelButtonColor: '#cba052',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar'       
    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=categoria&idCategoria="+idCategoria;
        }

    })


})