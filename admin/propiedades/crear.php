<?php

require '../../includes/app.php';

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

$auth = estaAutenticado();

$db = conectarDB();

// Consultar vendedores 
$consulta =  "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);


$errores = Propiedad::getErrores();

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';

$creado = date('Y/m/d');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $propiedad = new Propiedad($_POST);

  $nombreImagen = date('YmdHis') . md5(uniqid(rand(), true)) . '.jpg';

  if ($_FILES['imagen']['tmp_name']) {
    $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
    $propiedad->setImagen($nombreImagen);
  }




  $errores = $propiedad->validar();


  if (empty($errores)) {




    if (!is_dir(CARPETA_IMAGENES)) {
      mkdir(CARPETA_IMAGENES);
    }

    // Guardar img en el servidor
    $image->save(CARPETA_IMAGENES . $nombreImagen);

    $resultado = $propiedad->guardar();

    if ($resultado) {
      // Redireccionar al usuario 

      header("Location: ../index.php?resultado=1");
    }
  }
}



incluirTemplate('header');
?>

<main class="contenedor">
  <h1>Crear</h1>

  <a href="../index.php" class="boton boton-verde">Volver</a>

  <?php foreach ($errores as $error) : ?>
    <div class="alert alert-danger mt-4">
      <?php echo $error ?>
    </div>
  <?php endforeach; ?>

  <form class="form" method="POST" action="crear.php" enctype="multipart/form-data">
    <fieldset>
      <legend>Informacion general</legend>

      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" name="titulo" placeholder="Titulo de propiedad" value="<?php echo $titulo; ?>">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" placeholder="Precio de propiedad" value="<?php echo $precio; ?>">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

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

      <select name="vendedores_id">
        <option value="">-- Seleccione --</option>
        <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
          <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>


        <?php endwhile; ?>
      </select>
    </fieldset>

    <input type="submit" value="Crear Propiedad" class="boton boton-verde">
  </form>

</main>

<?php
incluirTemplate('footer');
?>