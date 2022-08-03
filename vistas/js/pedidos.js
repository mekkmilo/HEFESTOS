/*================================
estudiar para mejorar tablas
================================*/

var table = $('.tablaPedidos').DataTable({
    
    "deferRnder": true,
    "retrieve": true,
    "processing": true,

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


/*================================
validar servicio
================================*/

$(".btnPedido").click(function(){

    var idPedido = $(this).attr("idPedido");
    var estadoPedido = $(this).attr("estadoPedido");

    var datos = new FormData();
    datos.append("activarId", idPedido);
    datos.append("activarPedido", estadoPedido);

    $.ajax({

        url: "ajax/pedidos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

        }


    })

    if(estadoPedido == 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Pendiente');
        $(this).attr('estadoPedido',1);

    }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Realizado');
        $(this).attr('estadoPedido',0);

    }


})

/*================================
cancelar servicio
================================*/

$(".btnEliminarPedido").click(function(){

    var idPedido = $(this).attr("idPedido");
    var nombre = $(this).attr("nombre");



    Swal.fire({

        title: '¿Seguro desea eliminar el servicio?',
        text:"¡Si no esta seguro, Cancele!",
        type: 'warning',
        showCancelButton:true,
        confirmButtonColor: '#cba052',
        cancelButtonColor: '#cba052',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar'       
    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=serviceP&idPedido="+idPedido+"&nombre="+nombre;

        }

    })

        

})
