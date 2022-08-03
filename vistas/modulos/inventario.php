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
        <h1 style="color:#000">PORTAFOLIO</h1>
        <h2 style="color:#000">Las creaciones del un dios!</h2>
    </div>
</header>

<div style="height:120px"></div>

<!--Ejemplo tabla con DataTables-->

<section class="content">

    <div class="box">
        <div class="box-header with-border">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarItem">
                Agregar Item
            </button>
            <div style="height:12px"></div>


            <div class="box-body">

                <table class="table table-bordered table-striped  tablaProductos">

                   <thead>
               <tr>
                            <th style="width:10px">id</th>
                            <th>imagen</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>fecha</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>
                                <!-- llamado de los productos(visualizacion) -->
                     <!-- <?php 

                            $item= null;
                            $valor= null;

                             $inventario=ControladorInventario::ctrMostrarInventario($item, $valor);

                             foreach($inventario as $key => $value){

                                echo '<tr>
                                <td>'.($key+1).'</td>

                                <td><img src="vistas/img/portafolio/man.png" class="img-thumbnail" width="40px"></td>
                                <td>'.$value["codigo"].'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["descripcion"].'</td>';

                                $item = "id";
                                $valor = $value["id_categoria"];

                                $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                                echo'<td>'.$categoria["categoria"].'</td>
                                <td>$'.$value["precio"].'</td>
                                <td>'.$value["fecha"].'</td>
                                <td>
                                <div class="btn-group">

                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                            
                            </td>
                            </tr>';

                             }


                        ?>                       
                                                  

                    </tbody> -->

                </table>


            </div>
        </div>

    </div>

    </section>
<div>

<!-- Modal agregar item -->
<div id="modalAgregarItem" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <div class="modal-header" style="background:#000">

                    <h4 class="modal-title">Agregar Item</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">
                            <!--codigo -->

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoCodigo" id="nuevoCodigo"
                                    placeholder="Ingresar codigo" read only required>

                            </div>

                        </div>


                        <!-- nombre -->
                        <div class="form-group">


                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre"
                                    placeholder="Ingresar Nombre" id="nuevoNombre" required>

                            </div>

                        </div>

                        <!--descripcion -->
                        <div class="form-group">


                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" id="nuevaDescripcion" name="nuevaDescripcion"
                                    placeholder="Ingresar Descripcion" required>
                               

                            </div>

                        </div>

                        <!--categoria -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>

                                    <option value=""> Seleccionar Categoria </option>
                                    <?php

                                    $item= null;
                                    $valor= null;
                                    
                                    $categorias= ControladorCategorias :: ctrMostrarCategorias ($item, $valor);

                                    foreach ($categorias as $key => $value){

                                        echo'<option value="'.$value["id"].'"> '.$value["categoria"].'</option>';

                                    }

                                    ?>

                                </select>

                            </div>

                        </div>

                        <!--precio -->
                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra"
                                   min="0" placeholder="Ingresar Precio" required>                               

                            </div>

                            

                        <!--foto -->
                        <div class="form-group">


                            <div class="panel">SUBIR IMAGEN</div>
                            <input type="file" class="nuevaImagen" name="nuevaImagen">
                            <p class="help-block">Peso maximo de la imagen 2mb</p>
                            <img src="vistas/img/portafolio/man.png" class="img-thumbnail previsualizar" width="100px">
                            

                        </div>


                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Item</button>

                </div>

            

                <?php 
                    
                    $crearProducto = new ControladorInventario();
                    $crearProducto -> ctrCrearProducto();

                ?>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal editar item -->
<div id="modalEditarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <div class="modal-header" style="background:#000">

                    <h4 class="modal-title">Agregar Item</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">
                            <!--codigo -->

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo"
                                    readonly required>

                            </div>

                        </div>


                        <!-- nombre -->
                        <div class="form-group">


                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" name="editarNombre"
                                 id="editarNombre" required>

                            </div>

                        </div>

                        <!--descripcion -->
                        <div class="form-group">


                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion"
                                    required>
                               

                            </div>

                        </div>

                        <!--categoria -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg"  name="editarCategoria" readonly required>

                                    <option id="editarCategoria">  </option>
                                   
                                </select>

                            </div>

                        </div>

                        <!--precio -->
                        <div class="form-group">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra"
                                   min="0" required>                               

                            </div>

                            

                        <!--foto -->
                        <div class="form-group">


                            <div class="panel">SUBIR IMAGEN</div>
                            <input type="file" class="nuevaImagen" name="editarImagen">
                            <p class="help-block">Peso maximo de la imagen 2mb</p>
                            <img src="vistas/img/portafolio/man.png" class="img-thumbnail previsualizar" width="100px">

                            <input type="hidden" name= "imagenActual" id="imagenActual">
                            

                        </div>


                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                </div>

            </form>

            <?php

            $editarProducto = new ControladorInventario();
            $editarProducto -> ctrEditarProducto();


            ?>

             
        </div>
    </div>
</div>

<?php

$eliminarProducto = new ControladorInventario();
$eliminarProducto -> ctrEliminarProducto();


?>


	<!-- cargar de tablas -->

	<script src="vistas/js/productos.js"></script>

      



               
