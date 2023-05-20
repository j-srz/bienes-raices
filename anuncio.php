<?php
require './includes/app.php';
incluirTemplate('header');



$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);






$db = conectarDB();

// Optener datos de la propiedad
$consulta = "SELECT * FROM propiedades WHERE id = $id";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);

// echo '<pre>';
// var_dump($propiedad);
// echo '</pre>';


?>

<main class="contenedor contenido-centrado">
  <h1><?php echo $propiedad['titulo']; ?></h1>

  <img loading="lazy" width="200" height="300" src="images/<?php echo $propiedad['imagen']; ?>" alt="Anuncio" />


  <div class="resumen-propiedad">
    <p class="precio">$<?php echo $propiedad['precio']; ?></p>
    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
        <p><?php echo $propiedad['wc']; ?></p>
      </li>
      <li>
        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
        <p><?php echo $propiedad['estacionamiento']; ?></p>
      </li>
      <li>
        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
        <p><?php echo $propiedad['habitaciones']; ?></p>
      </li>
    </ul>

    <p>
      <?php echo $propiedad['descripcion']; ?>
    </p>


  </div>
</main>

<?php

mysqli_close($db);
incluirTemplate('footer');
?>