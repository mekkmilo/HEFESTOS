<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hefestos login</title>
    <link rel="stylesheet" href="vistas/css/login.css">
  </div>
  <nav id="nav" class="nav1">
    <div class="contenedor-nav">
        <div class="enlaces" id="enlaces"><!-- enlaces de la parte superior -->
            <a href="/HEFESTOS/" id="enlace-inicio" class="btn-header"> Inicio</a>        
           
        </div>
    </div>                        
</nav>
</div>
  </head>
  <body>

    <div class="login-box">
      <img src="vistas/img/logoL.png" class="avatar" alt="Avatar Image">
      <h1>HEFESTOS</h1>
      <form method="post">
        <!-- Entrada de usuario -->
        <label for="username">Usuario</label>
        <input type="text" class= "form-control" placeholder="Enter Username" name="ingUsuario" required>
        <!-- Entrada de contraseña -->
        <label for="password">Contraseña</label>
        <input type="password" class= "form-control" placeholder="Enter Password" name="ingPassword" required>
        <input type="submit" value="Ingresar">

        <?php
          //objeto
        $login = new ControladorUsuarios();
        //METODO
        $login -> ctrIngresoUsuario();


        ?>
      </form>
    </div>
  </body>
</html>
