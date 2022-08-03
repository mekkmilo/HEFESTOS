/*====================
carga tabla dinamica
=====================*/

// $.ajax({

//     url: "ajax/datatable-productos.ajax.php",
    

//     success: function(respuesta){

//         console.log("respuesta", respuesta);
//     }


// })

var table = $('.tablaProductos').DataTable({
    ajax: "ajax/datatable-productos.ajax.php",
    "deferRnder": true,
    "retrieve": true,
    "processing": true,


    "columDefs":[

        {
        "targets":-9,
        "data":null,
        "defaultContent":'< img class="img-thumbnail imgTabla" width="40px">'
        
        },
        
        {
        
        "targets":-1,
        "data":null,
        "defaultContent": '<div class="btn-group><button class="btn btn-warning btnEditarProducto" idProducto data-toggle="modal" data-target="#modalEditarProducto"><i class="fa fa-pencil"></i></button><button class="btn btn-danger btnEliminarProducto" idProducto codigo imagen><i class=fa fa-times"></i></button></div>'
        
        }
        
        ],


    "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

}

} );


/*====================================
Activar botones del id correspondiente
=====================================*/

$('.tablaProductos tbody').on('click', 'button', function(){

    var data =table.row($(this).parents('tr')).data();

    $(this).attr("idProducto", data[9])

    $(this).attr("codigo", data[2])
    $(this).attr("imagen", data[1])
});

/*===============
CAPTURA CATEGORIA
================*/

$("#nuevaCategoria").change(function(){

    var idCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false, 
        dataType: "json",
        success: function(respuesta){

            if(!respuesta){

                var nuevoCodigo = idCategoria + "01";
                $("#nuevoCodigo").val( nuevoCodigo);

            }else{

                
           var nuevoCodigo = Number (respuesta["codigo"]) +1;
           $("#nuevoCodigo").val( nuevoCodigo);


            }

        }

    })

})

//subir foto de item

$(".nuevaImagen").change(function(){

    var imagen = this.files[0];//importante poner el indice para que funcione la funcion
    

    //validar formato de imagen

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

        $(".nuevaImagen").val("");
        
        Swal.fire({

            title: "error al subir la foto",
            text:"¡Solo imagenes JPG o PNG!",
            type: "error",
            confirmButtonText: "!Cerrar¡"
            

        });
    }else if(imagen["size"] > 2000000){

        $(".nuevaImagen").val("");
        
        Swal.fire({

            title: "error al subir la foto",
            text:"¡La imagen no debe pesar mas de 2mb!",
            type: "error",
            confirmButtonText: "!Cerrar¡"
            

        });

    }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);

        })
    }

    
    
 })


 /*===============
editar producto
================*/

$(".tablaProductos tbody").on("click", "button.btnEditarProducto", function(){

    var idProducto = $(this).attr("idProducto");
    
    var datos = new FormData();
    datos.append("idProducto", idProducto);

    $.ajax({

        url:"ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

            var datosCategoria = new FormData();
            datosCategoria.append("idCategoria",respuesta["id_categoria"]);
  
             $.ajax({
  
                url:"ajax/categorias.ajax.php",
                method: "POST",
                data: datosCategoria,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success:function(respuesta){
                    
                    $("#editarCategoria").val(respuesta["id"]);
                    $("#editarCategoria").html(respuesta["categoria"]);
  
                }
  
            })

            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarPrecioCompra").val(respuesta["precio"]);

           if(respuesta["imagen"] != ""){

           	$("#imagenActual").val(respuesta["imagen"]);

           	$(".previsualizar").attr("src",  respuesta["imagen"]);
           }

        }
    })

})

/*=============================================
ELIMINAR PRODUCTO
=============================================*/

$(".tablaProductos tbody").on("click", "button.btnEliminarProducto", function(){

	var idProducto = $(this).attr("idProducto");
	var codigo = $(this).attr("codigo");
	var imagen = $(this).attr("imagen");
	
	Swal.fire({

		title: '¿Está seguro de borrar el item?',
		text: "¡Si no lo está puede cancelar!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#cba052',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar!'
        }).then(function(result){
        if (result.value) {

        	window.location = "index.php?ruta=inventario&idProducto="+idProducto+"&imagen="+imagen+"&codigo="+codigo;

        }


	})

})
