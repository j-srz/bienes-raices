<?php
// DB
require '../../includes/config/database.php';
$db = conectarDB();

// Consultar vendedores 
$consulta =  "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);



// echo "<pre>";
// var_dump($_SERVER['REQUEST_METHOD']);
// echo "</pre>";

// msj de errores 
$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';
$creado = date('Y/m/d');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  $titulo = $_POST['titulo'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $habitaciones = $_POST['habitaciones'];
  $wc = $_POST['wc'];
  $estacionamiento = $_POST['estacionamiento'];
  $vendedores_id = $_POST['vendedor'];

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

  // echo "<pre>";
  // var_dump($errores);
  // echo "</pre>";

  // revistar que el array de errores este vacio
  if (empty($errores)) {
    // Insertar en la DB
    $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id)
    VALUES ( '$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id' ) ";


    $resultado = mysqli_query($db, $query);
    if ($resultado) {
      // Redireccionar al usuario 

      header("Location: ../index.php ");
    }
  }
}


require '../../includes/funciones.php';
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

  <form class="form" method="POST" action="crear.php">
    <fieldset>
      <legend>Informacion general</legend>

      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" name="titulo" placeholder="Titulo de propiedad" value="<?php echo $titulo; ?>">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" placeholder="Precio de propiedad" value="<?php echo $precio; ?>">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png">

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
        <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
          <option  <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?>  value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>


        <?php endwhile; ?>
      </select>
    </fieldset>

    <input type="submit" value="Crear Propiedad" class="boton boton-verde">
  </form>

</main>

<?php
incluirTemplate('footer');
?>