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
                <a href="/HEFESTOS/" id="enlace-inicio" class="btn-header"> Inicio</a>   
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

                <table class="table table-bordered table-striped ">

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

