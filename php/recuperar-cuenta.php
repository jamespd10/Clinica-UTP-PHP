<!--James Pico, 8-924-154, 1LS-131-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="../img/logo_utp.png">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="../css/fontawesome-free-5.11.2-web/css/all.css">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="../css/recuperar-cuenta.css">
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="../css/bootstrap-4.3.1-dist/css/bootstrap.css">
    <title>Clínica Universitaria</title>
</head>
    <body>
        <div class="dark-overlay">
            <div class="container" id="main">
                <div class="container-fluid" id="jumbotron">
                      <h1 class="display-4">
                        <img src="../img/logo_utp_1_300.jpg" width="70" height="70" class="d-inline-block align-center" alt="logo utp" style="border-radius:160px;">
                        Clínica UTP
                      </h1>
                      <p class="lead">Bienvenido al sistema de la clínca de la Universidad Tecnológica de Panamá</p>
                    </div>
              <div class="card mx-auto mt-5" id="formulario" style="border-top-color: #681a5d; border-left: #681a5d; border-right: #681a5d;">
                <div class="card-header text-white" style="background: #681a5d;">Recuperar Cuenta</div>
                <div class="card-body">
                  <p>Ingrese su correo para enviarle un código de recuperación</p>
                  <form action="./nueva-contrasena.php" method="POST">
                    <div class="form-group" id="form">
                        <i class="fa fa-envelope"></i>
                          <input type="email" class="form-control" title="Ingresar su correo" placeholder="Correo" required="required" name="email">
                      </div>
                      <button type="submit" class="btn btn-primary" id="btn">Ingresar</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <div class="footer">
        <p>
            <a href="utp.ac.pa">Universidad Tecnológica de Panamá - 2019</a>
        </p>
    </div>
    <!--BOOTSTRAP SCRIPTS-->
    <script  src="../css/bootstrap-4.3.1-dist/js/jquery/popper.min.js"></script>
    <script  src="../css/bootstrap-4.3.1-dist/js/jquery/jquery-3.4.1.min.js"></script>
    <script  src="../css/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    
  </body>
</html>