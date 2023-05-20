<?php

// Importar la conexion
require './includes/app.php';
$db = conectarDB();

// Crear un email y password
$email = 'correo@correo.com';
$password = '12345678';

$passwordHash = password_hash($password, PASSWORD_DEFAULT);


// Query para crear usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email','$passwordHash')";

// Agregarlo a la DB
mysqli_query($db, $query);