<?php

require 'includes/config/database.php';
$db = conectarDB();


$errores = [];

// Autenticar el usuario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // var_dump($_POST);


  $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $password = mysqli_real_escape_string($db, $_POST['password']);


  if (!$email) {
    $errores[] = 'El email es obligatorio o no es valido';
  }
  if (!$password) {
    $errores[] = 'La contraseña es obligatoria';
  }

  if (empty($errores)) {
    // Revisar si el usuario existe 
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($db, $query);

    // var_dump($resultado);

    if ($resultado->num_rows) {
      $usuario = mysqli_fetch_assoc($resultado);

      // verificar password
      $auth = password_verify($password, $usuario['password']);
    
      if ($auth) {
        // El usuario esta autenticado
        session_start();


        $_SESSION['usuario'] = $usuario['email'];
        $_SESSION['login'] = true;


        header('Location: /bienesraices/admin/index.php');


      } else {
        $errores[] = 'El password es incorrecto';
      }
    } 
    else {
      $errores[] = 'El usuario no existe';
    }
  }
}







require './includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor">


  <h1>Iniciar Sesión</h1>

  <?php foreach ($errores as $error) : ?>
    <div class="alert alert-danger mt-4">
      <?php echo $error ?>
    </div>
  <?php endforeach; ?>

  <form class="form" method="POST">
    <fieldset>
      <legend>Email y password</legend>

      <label for="email">email</label>
      <input type="text" placeholder="Tu email:" id="email" name="email">

      <label for="password">contraseña</label>
      <input type="password" placeholder="Tu contraseña:" id="password" name="password">

    </fieldset>

    <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
  </form>
</main>

<?php
incluirTemplate('footer');
?>