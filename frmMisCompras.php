<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>REMASA - Principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon2.png">


    <link rel="stylesheet" href="assets/css/tablaMisCompras.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Cargar fuentes -->
    <link rel="stylesheet" href="https://use.typekit.net/nwm6dld.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<style>

.tiendabtn[type="button"] {

  background-color: #21386C;
  color: white;
  padding: 10px 14px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  margin: 0;
}

/* Cambio de color en botón */
.tiendabtn[type="button"]:hover {
  background-color: #008E72;
}

#customers {
  border-collapse: collapse;
  width: 100%;
  border-radius: 10px; 
    
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #008E72;
  color: white;

}
</style>

<body>

    <!-- Navegación -->
   <nav class="navbar navbar-expand-lg navbar-light d-none d-lg-block" id="templatemo_nav_top" style="background-color: #20386B;">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fab fa-whatsapp"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href=""> 33 39 52 11 66</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340"> 33 36 00 15 49 / 33 36 00 15 70</a>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com"> remasamg@hotmail.com</a>
                </div>
                <div>
                    <a class="text-light" href="https://www.facebook.com/p/Refaccionaria-Miguel-De-Autobuses-Sa-De-Cv-100054638641322/" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/remasa_mx/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navegación -->
    
    <!-- Header -->
    <?php
        //Llamada al menú de navegación
        include 'menulogin.php';
        $menu = new menuLogin();
        $menu ->barraMenuLogin();
    ?>
    <!-- Header -->

    <!-- Separación del menu con el resto de la pagina-->
    <div style="clear:both;"></div>
    <section>
        <!--tabla de consulta-->

        <div class="table-container">
        <div style="overflow-x: auto;">
        <h1 class="h1" style="text-align:center">Compras realizadas</h1>
        <br>
        <table id="customers" id="customers" class="table-compras">
                <thead>
                    <tr>
                        <th>Número de venta</th>
                        <th>Código</th>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Precio Unitario</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        include 'Modelo/venta.php';
                        $venta = new Venta();
                        $datos = $venta->consultaVenta();
                
                        while ($fila = mysqli_fetch_array($datos)) {
                            echo "<tr><td>" . $fila['idventa'] . "</td><td>" . $fila['idproducto'] . "</td><td>" . $fila['cantidad'] . 
                            "</td><td>" . $fila['descripcion'] . "</td><td>" . $fila['preciounitario'] . "</td><td>" . $fila['venta_fecha'] . "</td></tr>";
                        }
                    ?>                    
                </tbody>
            </table>
        </div>

    </section>

</body>
</html>