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
                <div class="enlaces" id="enlaces"><!-- enlaces de la parte superior -->
                            <a href="wellcome" id="enlace-inicio" class="btn-header"> Inicio</a>
                            <a href="serviceP" id="Pendientes" class="btn-header">Servicios Pendientes</a>
                            <a href="usuarios" id="Clientes" class="btn-header">Usuarios</a>
                            <a href="categoria" id="Categotia" class="btn-header">Categorias</a>
                            <a href="inventario" id="Inventario" class="btn-header">Portafolio</a>
                            <a href="salir" id="Inventario" class="btn-header">Salir</a>
                            <a href="#" class= "dropdown-toggle" data-toggle="dropdown">
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
                            <th>Categotia</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>

                            <td>SERVICIOS DE DISEÑO</td>
                           
                            <td>
                                <div class="btn-group">

                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                            
                            </td>


                        </tr>

                        <tr>
                            <td>2</td>

                            <td>PRODUCTOS DE DISEÑO</td>

                            <td>
                            <div class="btn-group">
                           
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                            </td>


                        </tr>
                        

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
            </div>
            </div>
            </div>