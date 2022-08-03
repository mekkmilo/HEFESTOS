<!-- Bootstrap CSS -->
<link rel="stylesheet" href="vistas/bootstrap/css/bootstrap.min.css">
<!-- CSS personalizado -->
<link rel="stylesheet" href="vistas/css/main.css">







<header>
    <nav id="nav" class="nav1">
        <div class="contenedor-nav">
            <div class="logo">
                <img src="vistas/img/logo.png" alt="">
            </div>
            <?php

                            if ($_SESSION["perfil"]=="Admin" || $_SESSION["perfil"]=="AdminE"){
                                echo'
                            <div class="enlaces" id="enlaces"><!-- enlaces de la parte superior -->
                                <a href="wellcome" id="enlace-inicio" class="btn-header"> Inicio</a>
                                <a href="serviceP" id="Pendientes" class="btn-header">Cotizaciones</a>
                                <a href="usuarios" id="Clientes" class="btn-header">Usuarios</a>
                                <a href="categoria" id="categoria" class="btn-header">Categorias</a>
                                <a href="inventario" id="Inventario" class="btn-header">Portafolio</a>
                                <a href="salir" id="Inventario" class="btn-header">Salir</a>
                                <a href="#" class= "dropdown-toggle" data-toggle="dropdown">';
                            }

                            if ($_SESSION["perfil"]=="Usuario" ){
                                echo'
                            <div class="enlaces" id="enlaces"><!-- enlaces de la parte superior -->
                                <a href="wellcome" id="enlace-inicio" class="btn-header"> Inicio</a>
                                <a href="serviceP" id="Pendientes" class="btn-header">Cotizaciones</a>                            
                                <a href="categoria" id="categoria" class="btn-header">Categorias</a>
                                <a href="inventario" id="Inventario" class="btn-header">Portafolio</a>
                                <a href="salir" id="Inventario" class="btn-header">Salir</a>
                                <a href="#" class= "dropdown-toggle" data-toggle="dropdown">';
                            }
                                ?>
                            <?php 
                            if($_SESSION["foto"] != ""){
                                echo '<img src="'.$_SESSION["foto"].'" class="user-image">';
                            }else{
                                echo '<img src="vistas/iconos/hades1.png" class="user-image">';
                            }

                            ?>
                            
                            
                            <span  class="hidden-xs"><?php echo $_SESSION["perfil"] ?></span>
                            </a>
            </div>
        </div>
        <div class="icono" id="open">
            <span>&#9776;</span><!-- menu lateral de 3 lineas -->
        </div>
    </nav>
    <div class="textos">
        <h1 style="color:#000">COTIZACIONES</h1>
        <h2 style="color:#000">Zeus a encargado rayos!</h2>
    </div>
</header>

<div style="height:120px"></div>

<!--Ejemplo tabla con DataTables-->

<section class="content">

    <div class="box">
        <div class="box-header with-border">

           
            <div style="height:12px"></div>


            <div class="box-body">

                <table class="table table-bordered table-striped tablaPedidos">

                    <thead>

                        <tr>
                            <th style="width:10px">#</th>
                            <th>Cliente</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Pedido</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>
                    <?php 

$item= null;
$valor= null;

 $pedido=ControladorPedidos::ctrMostrarPedido($item, $valor);

 foreach($pedido as $key => $value){

    echo '<tr>
            <td>'.($key+1).'</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["correo"].'</td>
            <td>'.$value["telefono"].'</td>
            <td>'.$value["pedido"].'</td>';

            if ($value["estado"] !=0 ){

                echo '<td><button class= "btn btn-success btn-xs btnPedido" idPedido ="'.$value["id"].'" estadoPedido="0">Realizado</button></td>';
            }else{

                echo '<td><button class= "btn btn-danger btn-xs btnPedido" idPedido= "'.$value["id"].'" estadoPedido="1" >Pendiente</button></td>';

            }

    echo'
            <td>'.$value["fecha"].'</td>
            <td>
                <div class="btn-group">

                <button class="btn btn-danger btnEliminarPedido" idPedido="'.$value["id"].'" nombre="'.$value["nombre"].'"><i class="fa fa-times"></i></button>

            </td>
    
            </tr>';

                }


            ?>      

                        

                    </tbody>

                </table>


            </div>
        </div>

    </div>

    <?php 
    
    $borrarPedido = new ControladorPedidos();
    $borrarPedido -> ctrBorrarpedido();

    ?>


</section>



      	<!-- cargar de tablas -->

	<script src="vistas/js/pedidos.js"></script>   