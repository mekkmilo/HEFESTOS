  <head>
    <meta charset="utf-8">
    <title>Hefestos</title>
    <link rel="stylesheet" href="vistas/css/pedido.css">
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
      <h4>Has tu pedido!</h4>
      <br>
      <input  type="text" name="nuevoCliente" id="nuevoNombre" placeholder="Ingrese su Nombre">
      <input  type="text" name="nuevoCorreo" id="nuevoCorreo" placeholder="Ingrese su Correo">
      <input  type="text" name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingrese su telefono">
      <textarea  type="text" class="form-control input-lg" name="nuevoPedido" id="nuevoPedido" placeholder="Ingrese su pedido"  rows="5" cols="35"></textarea>
      <p>Conoce nuestros <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Terminos y Condiciones</a></p>
      <br>
      <br>
       <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
    <?php

      $crearPedido = new ControladorPedidos();
      $crearPedido -> ctrCrearPedido();

    ?>
  </body>



                           
                         
                            
                          
