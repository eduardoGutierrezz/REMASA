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
    
    //---------------
    //Método para BUSCAR usuario por cuenta y contraseña
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
    }//consultaUsuario


    //Método para REGISTRAR información en la tabla usuario
    public function registrarUsuario(){
        //1-Definir la instruccion SQL de inserción
        $registrar = "insert into usuario (apellidos, ciudad, codigopostal, contrasena, correo, direccion, estado, nombre, telefono, tipousuario) values ('".$this->getApellidos()."','".$this->getCiudad()."',".$this->getCodigopostal().",'".$this->getContrasena()."','".$this->getCorreo()."','".$this->getDireccion()."','".$this->getEstado()."','".$this->getNombre()."',".$this->getTelefono().",'cliente')";
        //echo $registrar."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$registrar);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Mensaje informativo
        echo "Usuario registrado.<br>";
    }//registrarUsuario
    
}//class