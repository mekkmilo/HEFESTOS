//subir foto de usuario

$(".nuevaFoto").change(function(){

    var imagen = this.files[0];//importante poner el indice para que funcione la funcion
    

    //validar formato de imagen

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

        $(".nuevaFoto").val("");
        
        Swal.fire({

            title: "error al subir la foto",
            text:"¡Solo imagenes JPG o PNG!",
            type: "error",
            confirmButtonText: "!Cerrar¡"
            

        });
    }else if(imagen["size"] > 2000000){

        $(".nuevaFoto").val("");
        
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

 /*================================
 editar usuario
 ================================*/

 $(".btnEditarUsuario").click(function(){

    var idUsuario = $(this).attr("idUsuario");  
    
    console.log("idUsuario", idUsuario);

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){


            console.log("respuesta", respuesta);


            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);

        }

    })
 })