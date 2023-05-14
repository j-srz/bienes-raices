<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes Raices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/bienesraices/build/css/app.css" />
  </head>
  <body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
      <div class="contenedor contenido-header">
        <div class="barra">
          <a href="/bienesraices/index.php">
            <img src="/bienesraices/build/img/logo.svg" alt="Logotipo de bienes raices" />
          </a>

          <div class="mobile-menu">
            <img src="/bienesraices/build/img/barras.svg" alt="icono menu responsive" />
          </div>

          <div class="derecha">
            <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg" alt="" />
            <nav class="navegacion">
              <a href="nosotros.php">Nosotros</a>
              <a href="anuncios.php">Anuncios</a>
              <a href="blog.php">Blog</a>
              <a href="contacto.php">Contacto</a>
            </nav>
          </div>
        </div>
        <?php if ($inicio) { ?>
        <h1>Venta de casas y departamentos exclusivos de lujo</h1>
        <?php } ?>
      </div>
    </header>