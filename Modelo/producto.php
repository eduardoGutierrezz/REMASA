<?php


class Producto{
    //Atributos(igual que los campos de la tabla)
    private $cantidad;
    private $descripcion;
    private $id;
    private $medida;
    private $nombre;
    private $precio;
    private $marca;
    private $rutaimagen;
    //Atributo de conectividad con la BD
    private $conexion;
    
    //Métodos
    //-Constructor
    public function __construct(){
        $this->cantidad=1;
        $this->descripcion="none";
        $this->id=1;
        $this->medida=1;
        $this->nombre="none";
        $this->precio=1;
        $this->marca="none";
        $this->rutaimagen="none";
    }
    
    //Set's y Get's
    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }
    
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setMedida($medida){
        $this->medida = $medida;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function setRutaimagen($rutaimagen){
        $this->rutaimagen = $rutaimagen;
    }

    
    public function getCantidad(){
        return $this->cantidad;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getMedida(){
        return $this->medida;
    }
    
    public function getNombre(){
        return $this->nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function getRutaimagen(){
        return $this->rutaimagen;
    }
    
    //Método para conectar a la tabla alumnos de la BD
    private function EstableceConexion(){
        $this->conexion = mysqli_connect('127.0.0.1:3306','test','REMASA');
        
        if(!$this->conexion){
            echo "La conexion no se ha podido establecer.<br>";
        } else{
            mysqli_select_db($this->conexion,"remasa");
        }
    }//EstableceConexion
    
    //----------------------------------------------------------------------------------------------------------------------------------
    //Método para BUSCAR productos Mercedez-Benz
    public function buscarProductosMercedes(){
        //1-Definir la instruccion SQL de consulta
        $consulta = "select id, nombre, descripcion, medida, precio, rutaimagen from producto where marca='Mercedes-Benz'";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consulta productos Mercedez-Benz

    //----------------------------------------------------------------------------------------------------------------------------------
    //Método para BUSCAR productos MAN
    public function buscarProductosMAN(){
        //1-Definir la instruccion SQL de consulta
        $consulta = "select id, nombre, descripcion, medida, precio, rutaimagen from producto where marca='MAN'";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consulta productos MAN

    //----------------------------------------------------------------------------------------------------------------------------------
    //Método para BUSCAR productos Scania
    public function buscarProductosScania(){
        //1-Definir la instruccion SQL de consulta
        $consulta = "select id, nombre, descripcion, medida, precio, rutaimagen from producto where marca='Scania'";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consulta productos Scania

    //----------------------------------------------------------------------------------------------------------------------------------
    //Método para BUSCAR productos Volvo
    public function buscarProductosVolvo(){
        //1-Definir la instruccion SQL de consulta
        $consulta = "select id, nombre, descripcion, medida, precio, rutaimagen from producto where marca='Volvo'";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consulta productos Volvo

    //----------------------------------------------------------------------------------------------------------------------------------
    //Método para BUSCAR categoria conecciones
    public function buscarProductosCategoriaConecciones(){
        //1-Definir la instruccion SQL de consulta
        $consulta = "select id, nombre, descripcion, medida, precio, rutaimagen from producto where categoria='Conecciones'";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consulta productos categoria conecciones

    //----------------------------------------------------------------------------------------------------------------------------------
    //Método para BUSCAR categoria lubricantes
    public function buscarProductosCategoriaLubricantes(){
        //1-Definir la instruccion SQL de consulta
        $consulta = "select id, nombre, descripcion, medida, precio, rutaimagen from producto where categoria='Lubricantes'";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consulta productos categoria lubricantes

    //----------------------------------------------------------------------------------------------------------------------------------
    //Método para BUSCAR categoria filtracion
    public function buscarProductosCategoriaFiltracion(){
        //1-Definir la instruccion SQL de consulta
        $consulta = "select id, nombre, descripcion, medida, precio, rutaimagen from producto where categoria='Filtracion'";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consulta productos categoria filtracion

    //----------------------------------------------------------------------------------------------------------------------------------
    //Método para BUSCAR categoria direccion
    public function buscarProductosCategoriaDireccion(){
        //1-Definir la instruccion SQL de consulta
        $consulta = "select id, nombre, descripcion, medida, precio, rutaimagen from producto where categoria='Direccion'";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consulta productos categoria direccion

    //----------------------------------------------------------------------------------------------------------------------------------
    //Método para BUSCAR categoria frenos
    public function buscarProductosCategoriaFrenos(){
        //1-Definir la instruccion SQL de consulta
        $consulta = "select id, nombre, descripcion, medida, precio, rutaimagen from producto where categoria='Frenos'";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consulta productos categoria frenos

    //----------------------------------------------------------------------------------------------------------------------------------
    //Método para BUSCAR categoria suspencion
    public function buscarProductosCategoriaSuspencion(){
        //1-Definir la instruccion SQL de consulta
        $consulta = "select id, nombre, descripcion, medida, precio, rutaimagen from producto where categoria='Suspencion'";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consulta productos categoria suspencion



    //Método para REGISTRAR información en la tabla usuario
    

    //-----------------------------------------------------------------------------------------------------------------------------

    public function obtenerDetallesProducto($producto_id) {
      
    
        // Consulta SQL para obtener detalles del producto por ID
        $sql = "SELECT id, nombre, descripcion, medida, precio FROM producto WHERE id = $producto_id";
    
         //3-Ejecutar la instrucción SQL en la conexion (BD)
         $result = mysqli_query($this->conexion,$sql);
    
        // Verificar si se obtuvieron resultados
        if ($result->num_rows > 0) {
            // Obtener los detalles del producto
            $row = $result->fetch_assoc();
    
            // Crear un array con los detalles del producto
            $producto = array(
                'id' => $row["id"],
                'nombre' => $row["nombre"],
                'descripcion' => $row["descripcion"],
                'medida' => $row["medida"],
                'precio' => $row["precio"],
                'cantidad' => 1, // Puedes establecer la cantidad predeterminada
            );
             // Asignar los valores utilizando los setters
            $this->setId($producto['id']);
            $this->setNombre($producto['nombre']);
            $this->setDescripcion($producto['descripcion']);
            $this->setMedida($producto['medida']);
            $this->setPrecio($producto['precio']);
            $this->setCantidad($producto['cantidad']);
    
            //4-Cierro la conexión con la BD
             mysqli_close($this->conexion);
    
            return $producto;
        } else {
            // Si no se encuentra el producto, puedes manejarlo como desees (lanzar una excepción, devolver un valor predeterminado, etc.)
             //4-Cierro la conexión con la BD
             mysqli_close($this->conexion);
            return null;
        }
    }
    

 
    

    //-----------------------------------------------------------------------------------------------------------------------------
     // Método para obtener los detalles del producto
    
    
}//class

