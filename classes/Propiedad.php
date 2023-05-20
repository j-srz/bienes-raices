<?php

namespace App;

// use App\Propiedad as AppPropiedad;

class Propiedad
{



    // DB

    protected static $db;
    protected static $columnasDB = [
        'id',
        'titulo',
        'precio',
        'imagen',
        'descripcion',
        'habitaciones',
        'wc',
        'estacionamiento',
        'creado',
        'vendedores_id'
    ];


    // Errores
    protected static $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;


    // Definir la conexion a la DB
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function guardar()
    {

        // Sanitizar los datos
        $atributos = $this->sanitizarDatos();



        $query = "INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";



        $resultado = self::$db->query($query);

        return $resultado;
    }

    // identificar y unir los atributos de DB
    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarDatos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];


        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Subida de archivos
    public function setImagen($imagen) {

        // Asignar al atributo de img el name de la img


        if ($imagen) {
           $this->imagen = $imagen;
        }
    }

    // Validacion
    public static function getErrores()
    {
        return self::$errores;
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = 'Debes añadir un titulo';
        }

        if (!$this->precio) {
            self::$errores[] = 'Debes añadir el precio';
          }
        
          if (strlen($this->descripcion) < 50) {
            self::$errores[] = 'Debes añadir una descripcion y tener al menos 50 caracteres';
          }
        
          if (!$this->habitaciones) {
            self::$errores[] = 'Debes añadir el numero de habitaciones';
          }
        
          if (!$this->wc) {
            self::$errores[] = 'Debes añadir el numero de baños';
          }
        
          if (!$this->estacionamiento) {
            self::$errores[] = 'Debes añadir el numero de estacionamientos';
          }
        
          if (!$this->vendedores_id) {
            self::$errores[] = 'Elije un vendedor';
          }

          if (!$this->imagen) {
            self::$errores[] = 'Debes subir una imagen';
          }


        return self::$errores;
    }


    // Lista todas las propiedades
    public static function all() {
        $query = "SELECT * FROM propiedades";
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function consultarSQL($query) {
        // Consultar la DB
        $resultado = self::$db->query($query);

        // Iterar la db
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        }



        // Liberar la memoria
        $resultado->free();

        // Retornar
        return $array;
    }

    protected static function crearObjeto($registro) {
        $objeto = new self;

        
        foreach($registro as $key => $value) {
            if(property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
}
