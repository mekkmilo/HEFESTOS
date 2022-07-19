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
        <h1 style="color:#000">USUARIOS</h1>
        <h2 style="color:#000">Momento de decidir su destino</h2>
    </div>
</header>

<div style="height:120px"></div>


<!--Ejemplo tabla con DataTables-->

<section class="content">

    <div class="box">
        <div class="box-header with-border">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                Agregar usuario
            </button>

            <div style="height:12px"></div>


            <div class="box-body">

                <table class="table table-bordered table-striped tablas">

                    <thead>

                        <tr>
                            <th style="width:5px">#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>foto</th>
                            <th>perfil</th>
                            <th>Estado</th>
                            <th>Ultimo login</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php 

                    $item = null;
                    $valor = null;
                    
                    $usuarios = ControladorUsuarios :: ctrMostrarUsuarios($item, $valor);
                    
                    //recorrido de variables

                    foreach ($usuarios as $key => $value) {

                        echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["usuario"].'</td>';

                        if($value["foto"] !=""){//columna para fotos
                            
                            echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                        }else{

                            echo '<td><img src="vistas/iconos/hades.png" class="img-thumbnail" width="40px"></td>';

                        }
                        
                        

                        echo'<td>'.$value["perfil"].'</td>';

                        if ($value["estado"] != 0){//condicion para inicio de sesion

                            echo'<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">
                            Activado</button></td>';
                        }else{
                            echo'<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">
                            Desactivado</button></td>';
                        }
                        

                        echo '<td>'.$value["ultimo_login"].'</td>
                        <td>
                            <div class="btn-group">

                                <button class="btn btn-warning btnEditarUsuario" 
                                idUsuario="'.$value["id"].'" data-toggle="modal" 
                                data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                                <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'"
                                usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

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

<!-- Modal agregar usuario -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <div class="modal-header" style="background:#000">

                    <h4 class="modal-title">Agregar Usuario</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">
                            <!--nombre -->

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre"
                                    placeholder="Ingresar nombre" required>

                            </div>

                        </div>


                        <!--usuario -->
                        <div class="form-group">


                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoUsuario"
                                    placeholder="Ingresar usuario" id="nuevoUsuario" required>

                            </div>

                        </div>

                        <!--contraseña -->
                        <div class="form-group">


                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="nuevoPassword"
                                    placeholder="Ingresar contraseña" required>
                               

                            </div>

                        </div>

                        <!--perfil -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevoPerfil">

                                    <option value=""> Seleccionar Perfil </option>

                                    <option value="AdminE"> Super Administrador </option>

                                    <option value="Admin"> Administrador </option>

                                    <option value="Usuario"> Usuario </option>
                                </select>

                            </div>

                        </div>

                        <!--foto -->
                        <div class="form-group">


                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" class="nuevaFoto" name="nuevaFoto">
                            <p class="help-block">Peso maximo de la foto 2mb</p>
                            <img src="vistas/iconos/hades.png" class="img-thumbnail previsualizar" width="100px">
                            

                        </div>


                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Usuario</button>

                </div>
                <?php

                //objeto para crear usuario
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario -> ctrCrearUsuario();


                ?>
            </form>
        </div>
    </div>
</div>

<!-- Modal editar usuario -->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <div class="modal-header" style="background:#000">

                    <h4 class="modal-title">Editar Usuario</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">
                            <!--nombre -->

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" id="editarNombre"
                                 name="editarNombre"
                                    value="" required>

                            </div>

                        </div>


                        <!--usuario -->
                        <div class="form-group">


                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" id="editarUsuario"
                                name="editarUsuario"
                                    value="" readonly>

                            </div>

                        </div>

                        <!--contraseña -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                
                                <input type="password" class="form-control input-lg" name="editarPassword"
                                    placeholder="Escriba nueva contraseña">

                                    <input type="hidden" id="passwordActual" name="passwordActual">

                            </div>

                        </div>

                        <!--perfil -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="editarPerfil">

                                    <option value="" id="editarPerfil"> </option>

                                    <option value="AdminE"> Super Administrador </option>

                                    <option value="Admin"> Administrador </option>

                                    <option value="Usuario"> Usuario </option>
                                </select>

                            </div>

                        </div>

                        <!--foto -->
                        <div class="form-group">


                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" class="nuevaFoto" name="editarFoto">
                            <p class="help-block">Peso maximo de la foto 2mb</p>
                            <img src="vistas/iconos/hades.png" class="img-thumbnail previsualizar" width="100px">
                            <input type="hidden" name="fotoActual" id="fotoActual">

                        </div>


                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                </div>
                <?php

                 //objeto para editar usuario
                 $editarUsuario = new ControladorUsuarios();
                 $editarUsuario -> ctrEditarUsuario();


                ?> 
            </form>
        </div>
    </div>
</div>

<?php

$borrarUsuario = new ControladorUsuarios();
$borrarUsuario -> ctrBorrarUsuario();

?>