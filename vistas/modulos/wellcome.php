<body class="hidden">
    <div class="centrado" id="onload">
        <div class="lds-roller"><div></div><div></div><div></div></div>
    </div>
            <header>
                <nav id="nav" class="nav1">
                    <div class="contenedor-nav">
                        <div class="logo" >
                            <img class="" src="vistas/img/logo.png" alt="">
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
                    <h1 style="color:#000" >BIENVENIDO</h1>
                    <h2 style="color:#000" >Es momento de crear algo mitico!</h2>
                </div>

                

               
            
            </div>

               
            