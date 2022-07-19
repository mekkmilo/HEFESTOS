/*====================
carga tabla dinamica
=====================*/

// $.ajax({

//     url: "ajax/datatable-productos.ajax.php",
    

//     success: function(respuesta){

//         console.log("respuesta", respuesta);
//     }


// })

$('.tablaProductos').DataTable({
    ajax: "ajax/datatable-productos.ajax.php",
    "deferRnder": true,
    "retrieve": true,
    "processing": true,
    "languaje": {
        "decimal":        "",
        "emptyTable":     "No data available in table",
        "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
        "infoEmpty":      "Showing 0 to 0 of 0 entries",
        "infoFiltered":   "(filtered from _MAX_ total entries)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Show _MENU_ entries",
        "loadingRecords": "Loading...",
        "processing":     "",
        "search":         "Search:",
        "zeroRecords":    "No matching records found",
        "paginate": {
            "first":      "First",
            "last":       "Last",
            "next":       "Next",
            "previous":   "Previous"
        },
        "aria": {
            "sortAscending":  ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        }
    }
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

