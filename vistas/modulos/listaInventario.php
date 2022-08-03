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
            <div class="enlaces" id="enlaces">

                <!-- enlaces de la parte superior -->
           
                
                <a href="/HEFESTOS/" id="enlace-inicio" class="btn-header"> Inicio</a>  

                
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPedido">
                Has tu pedido!!
            </button>
              
                
                 
            </div>
        </div>
        <div class="icono" id="open">
            <span>&#9776;</span><!-- menu lateral de 3 lineas -->
        </div>
    </nav>
    <div class="textos">
        <h1 style="color:#000">Nuestros Productos</h1>
        <h2 style="color:#000">Conoce el arte del dios hefestos!</h2>
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
                            <th>imagen</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                           
                            

                        </tr>

                    </thead>

                    <tbody>
                              
                        <?php 

                            $item= null;
                            $valor= null;

                             $inventario=ControladorInventario::ctrMostrarInventario($item, $valor);

                             foreach($inventario as $key => $value){

                                echo '<tr>
                                <td>'.($key+1).'</td>

                                <td><img src="vistas/img/portafolio/man.png" class="img-thumbnail" width="40px"></td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["descripcion"].'</td>';

                                $item = "id";
                                $valor = $value["id_categoria"];

                                $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                                echo'<td>'.$categoria["categoria"].'</td>
                                <td>$'.$value["precio"].'</td>
                               
                            </tr>';

                             }


                        ?>                       
                                                  

                    </tbody>

                </table>


            </div>
        </div>

    </div>


</section>

<!-- Modal agregar pedido -->
<div id="modalAgregarPedido" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <div class="modal-header" style="background:#000">

                    <h4 class="modal-title">Realizar Pedido</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">
                            <!--nombre -->

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoCliente"
                                    placeholder="Ingresar nombre" required>

                            </div>

                        </div>


                        <!--usuario -->
                        <div class="form-group">


                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoTelefono"
                                    placeholder="Ingresar Telefono" id="nuevoTelefono" required>

                            </div>

                        </div>

                        <!--contraseña -->
                        <div class="form-group">


                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoEmail"
                                    placeholder="Ingresar correo electronico" required>
                               

                            </div>

                        </div>

                        

                        <!--pedido -->
                        <div class="form-group">
                            <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <textarea  type="text" class="form-control input-lg" name="nuevoPedido" id="nuevoPedido" placeholder="Ingrese su pedido"  rows="5" cols="35"></textarea>
                            
                            </div>

                        </div>


                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Realizar pedido</button>

                </div>
                <?php

                //objeto para crear pedidos
                $crearPedido = new ControladorPedidos();
                $crearPedido -> ctrCrearPedido();


                ?>
            </form>
        </div>
    </div>
</div>

<!-- cargar de tablas -->

 <script src="vistas/js/listain.js"></script> 
