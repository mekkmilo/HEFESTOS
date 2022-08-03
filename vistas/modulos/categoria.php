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
        <h1 style="color:#000">CATEGORIAS</h1>
        <h2 style="color:#000">Nacera un nuevo dios?</h2>
    </div>
</header>

<div style="height:120px"></div>

<!--Ejemplo tabla con DataTables-->

<section class="content">

    <div class="box">
        <div class="box-header with-border">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
                Agregar Categoria
            </button>
            <div style="height:12px"></div>


            <div class="box-body">

                <table class="table table-bordered table-striped ">

                    <thead>

                        <tr>
                            <th style="width:10px">#</th>
                            <th>Categoria</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    $item = null;
                    $valor = null;

                    $categorias= ControladorCategorias :: ctrMostrarCategorias($item, $valor);

                    //var_dump($categorias);

                    foreach ($categorias as $key => $value){

                        echo'<tr>
                        <td>'.($key+1).'</td>

                        <td>'.$value["categoria"].'</td>
                       
                        <td>
                            <div class="btn-group">

                                <button class="btn btn-warning btnEditarCategoria" 
                                idCategoria="'.$value["id"].'" data-toggle="modal" 
                                data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btnEliminarCategoria" idCategoria= "'.$value["id"].'"><i class="fa fa-times"></i></button>   
                                                  
                        </td>
                    </tr>';

                    }

                    ?>
                        

                    </tbody>

                </table>


            </div>
        </div>

    </div>


</section>

<!-- Modal -->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="form" method="post" >

                <div class="modal-header" style="background:#000">

                    <h4 class="modal-title">Agregar categoria</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">
                            <!-- categoria  -->

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaCategoria"
                                    placeholder="Ingresar Categoria" required>

                            </div>

                        </div>
                       
                    </div>

                </div>
                <!-- footer del modal -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Categoria</button>

                </div>
                <?php

                $crearCategoria = new ControladorCategorias();
                $crearCategoria -> ctrCrearCategoria();

                ?>
            </form>


        </div>           
            
    </div>
</div>

<!-- Modal editar -->
<div id="modalEditarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="form" method="post" >

                <div class="modal-header" style="background:#000">

                    <h4 class="modal-title">Editar categoria</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">
                            <!-- categoria  -->

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg" name="editarCategoria" 
                                id="editarCategoria" required>
                                <input type="hidden"  name="idCategoria"  id="idCategoria" required>

                            </div>

                        </div>
                       
                    </div>

                </div>
                <!-- footer del modal -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                </div>
                <?php

                $editarCategoria = new ControladorCategorias();
                $editarCategoria -> ctrEditarCategoria();

                ?>
            </form>


        </div>           
            
    </div>
</div>

<?php

$borrarCategoria = new ControladorCategorias();
$borrarCategoria -> ctrBorrarCategoria();

?>
