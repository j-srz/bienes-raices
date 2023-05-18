<?php

require '../includes/funciones.php';
$auth = estaAutenticado();



if(!$auth) {
  header('Location: /bienesraices/index.php');
}



// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

// Importar conexion
require '../includes/config/database.php';
$db = conectarDB();
// Escribir el query
$query = 'SELECT * FROM propiedades';


// Consultar DB
$resultadoConsulta = mysqli_query($db, $query);

// Cerrar conexion

$resultado = $_GET['resultado'] ?? null;

//! REALIZAR ESTA VALIDACION ANTES DE SACAR LOS VALORES DEL POST YA QUE 
//! SI NO SE REALIZA MARCARA EROOR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];

  $id = filter_var($id, FILTER_VALIDATE_INT);

  if ($id) {
    // ELIMINAR ARCHIVO
    $query = "SELECT imagen FROM propiedades WHERE id = $id";

    $resultado = mysqli_query($db, $query);

    $propiedad = mysqli_fetch_assoc($resultado);

    unlink('../images/' . $propiedad['imagen']);


    // ELIMINAR PROPIEDAD
    $query = "DELETE FROM propiedades WHERE id = $id";

    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      header('location: /bienesraices/admin/index.php?resultado=3');
    }
  }
}


incluirTemplate('header');
?>

<main class="contenedor">
  <h1>Administrador de bienes raices</h1>
  <?php if ($resultado == 1) : ?>
    <p class="alert alert-success">Anuncio creado correctamente</p>
  <?php elseif ($resultado == 2) : ?>
    <p class="alert alert-success">Anuncio actualizado correctamente</p>
  <?php elseif ($resultado == 3) : ?>
    <p class="alert alert-success">Anuncio eliminado correctamente</p>


  <?php endif ?>

  <a href="propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Titulo</th>
        <th scope="col">Imagen</th>
        <th scope="col">Precio</th>
        <th scope="col">Acciones</th>
      </tr>

    <tbody class="table-group-divider">

      <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
        <tr>
          <td scope='row'><?php echo $propiedad['id'] ?></td>
          <td><?php echo $propiedad['titulo'] ?></td>
          <td><img class="img-table" style="height: 100px; width: auto;" src="../images/<?php echo $propiedad['imagen'] ?>"></td>
          <td>$<?php echo $propiedad['precio'] ?></td>
          <td>
            <form method="POST">

              <input type="hidden" name="id" value="<?php echo $propiedad['id'] ?>">
              <input type="submit" class="btn btn-danger" value="Eliminar">
            </form>
            <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="btn btn-primary">Actualizar</a>
          </td>
        </tr>
      <?php endwhile; ?>



    </tbody>
    </thead>
  </table>
</main>

<?php
// Cerrar conexion
mysqli_close($db);
incluirTemplate('footer');
?>