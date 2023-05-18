<?php

require '../../includes/funciones.php';
$auth = estaAutenticado();

if(!$auth) {
  header('Location: /bienesraices/index.php');
}

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /bienesraices/admin/index.php');
}

// DB
require '../../includes/config/database.php';
$db = conectarDB();

// Optener datos de la propiedad
$consulta = "SELECT * FROM propiedades WHERE id = ${id}";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);



// Consultar vendedores 
$consulta =  "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);



// echo "<pre>";
// var_dump($_SERVER['REQUEST_METHOD']);
// echo "</pre>";

// msj de errores 
$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedores_id = $propiedad['vendedores_id'];
$imagenPropiedad = $propiedad['imagen'];


$creado = date('Y/m/d');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";
  // exit;
  // echo "<pre>";
  // var_dump($_FILES);
  // echo "</pre>";

  // exit;

  //! NUNCA CONFIAR EN LOS USUARIOS 

  $imagen = $_FILES['imagen'];
  // echo "<pre>";
  // var_dump($imagen);
  // echo "</pre>";
  // exit;

  // var_dump($imagen);
  // exit;

  $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
  $precio = mysqli_real_escape_string($db, $_POST['precio']);
  $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
  $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
  $wc = mysqli_real_escape_string($db, $_POST['wc']);
  $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
  $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedor']);

  if (!$titulo) {
    $errores[] = 'Debes añadir un titulo';
  }

  if (!$precio) {
    $errores[] = 'Debes añadir el precio';
  }

  if (strlen($descripcion) < 50) {
    $errores[] = 'Debes añadir una descripcion y tener al menos 50 caracteres';
  }

  if (!$habitaciones) {
    $errores[] = 'Debes añadir el numero de habitaciones';
  }

  if (!$wc) {
    $errores[] = 'Debes añadir el numero de baños';
  }

  if (!$estacionamiento) {
    $errores[] = 'Debes añadir el numero de estacionamientos';
  }

  if (!$vendedores_id) {
    $errores[] = 'Elije un vendedor';
  }

  // Validar por tamaño 
  $medida = 1000 * 100;
  if ($imagen['size'] > $medida) {
    $errores[] = 'La imagen es muy pesada';
  }

  // echo "<pre>";
  // var_dump($errores);
  // echo "</pre>";

  // revistar que el array de errores este vacio





  if (empty($errores)) {

    // Crear carpeta
    $carpetaImagenes = '../../images';

    if (!is_dir($carpetaImagenes)) {
      mkdir($carpetaImagenes);
    }

    $nombreImagen = '';


    // Subida de archivos 
    if ($imagen['name']) {
      unlink($carpetaImagenes . "/" . $propiedad['imagen']);


      // Generar un name unico
      $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';



      // Subir la imagen 

      move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . '/' . $nombreImagen);
    } else {
      $nombreImagen = $propiedad['imagen'];
    }




    // Insertar en la DB
    $query = "UPDATE propiedades SET titulo = '$titulo',
                                    precio = '$precio',
                                    imagen = '$nombreImagen',
                                    descripcion = '$descripcion',
                                    habitaciones = $habitaciones,
                                    wc = $wc,
                                    estacionamiento = $estacionamiento,
                                    vendedores_id = $vendedores_id
              WHERE id = $id
    ";

    //! RECOMENDACION siempre comprobar los querys 

    // echo $query;
    // exit;

    $resultado = mysqli_query($db, $query);
    if ($resultado) {
      // Redireccionar al usuario 

      header("Location: ../index.php?resultado=2");
    }
  }
}



incluirTemplate('header');
?>

<main class="contenedor">
  <h1>Actualizar Propiedad</h1>

  <a href="../index.php" class="boton boton-verde">Volver</a>

  <?php foreach ($errores as $error) : ?>
    <div class="alert alert-danger mt-4">
      <?php echo $error ?>
    </div>
  <?php endforeach; ?>

  <form class="form" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>Informacion general</legend>

      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" name="titulo" placeholder="Titulo de propiedad" value="<?php echo $titulo; ?>">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" placeholder="Precio de propiedad" value="<?php echo $precio; ?>">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

      <img src="../../images/<?php echo $imagenPropiedad ?>" alt="">

      <label for="descripcion">Descripcion</label>
      <textarea id="descripcion" name="descripcion" cols="30" rows="10"><?php echo $descripcion; ?></textarea>
    </fieldset>

    <fieldset>
      <legend>Informacion de la propiedad</legend>


      <label for="habitaciones">habitaciones:</label>
      <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

      <label for="wc">baños:</label>
      <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

      <label for="estacionamiento">estacionamiento:</label>
      <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">


    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>

      <select name="vendedor">
        <option value="">-- Seleccione --</option>
        <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
          <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>


        <?php endwhile; ?>
      </select>
    </fieldset>

    <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
  </form>

</main>

<?php
incluirTemplate('footer');
?>