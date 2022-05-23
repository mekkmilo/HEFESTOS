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
    
    //console.log("idUsuario", idUsuario);

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


            //console.log("respuesta", respuesta);


            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);// accion para mantener el value de perfil si este no se modifica
            $("#fotoActual").val(respuesta["foto"]);

            $("#passwordActual").val(respuesta["password"]);

            if(respuesta["foto"] != ""){

               $(".previsualizar").attr("src", respuesta["foto"]);

            }

        }

    })
 })

  /*================================
Activar Usuario
 ================================*/

 $(".btnActivar").click(function(){

    var idUsuario =$(this).attr("idUsuario");
    var estadoUsuario =$(this).attr("estadoUsuario");

    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){


        }

    })

    if(estadoUsuario == 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario',1);

    }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario',0);

    }


 })

 
  /*================================
revisar usuario repetido
 ================================*/

 $("#nuevoUsuario").change(function(){

    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method:"POST",
        data:datos,
        caches:false,
        contentType:false,
        processData:false,
        dataType: "json",

        success:function(respuesta){

            //console.log("respuesta",respuesta);

            if(respuesta){

                $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Usuario en uso!</div>');

                $("#nuevoUsuario").val("");

            }
        }

    })

 })

 
  /*================================
eliminar usuario 
 ================================*/

 $(".btnEliminarUsuario").click(function(){

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");

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

            window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
        }

    })

 })