<?php
session_start(); // Agrega esto al principio del script
include 'menu.php';
include 'Modelo/venta.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sitio web REMASA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon2.png">

    <link rel="stylesheet" href="assets/css/carritostyle.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Cargar fuentes -->
    <link rel="stylesheet" href="https://use.typekit.net/nwm6dld.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--------------------------------------------------------------------------------Codigo gabo--------------------------------------------->
    <!-- Replace the "test" client-id value with your client-id -->
    <script src="https://www.paypal.com/sdk/js?client-id=AU53wQEsG_cDrwz7ga56YgGlmHRufyOoxYTci0plCtnDKGREBlOxwBhcSAL6tUr9JHz7JJeodj0nyqp1&currency=MXN"></script>
<!--------------------------------------------------------------------------------Codigo gabo--------------------------------------------->

</head>

<style>

.paypal{
    display: flex;
    justify-content: center;
    align-items: center;
 }

 #total-container th {
        display: inline-block; /* Para que el elemento sea centrado por text-align: center */
 }

 #total-container {
        text-align: center;
        font-size: 24px;
    }

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
    <nav class="navbar navbar-expand-lg navbar-light d-none d-lg-block" id="templatemo_nav_top" style="background-color: #21386C;">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fab fa-whatsapp"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="https://wa.me/3339521166"> 33 39 52 11 66</a>
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


    <?php
    /////////////////////////////////////////////codigo gabo ///////////////////////////////////////////
//include 'menu.php';
//include 'Modelo/venta.php';
$detalleVenta = new Venta;
/////////////////////////////////////////////////codigo gabo////////////////////////////////////////////
$menu = new menu();
$menu->barraMenu();
$venta = new Venta;

// Consultar detalles de venta y almacenarlos en la variable de sesión
$detalleVenta->consultaUltimoIdVenta(); // Puedes considerar si realmente necesitas esta consulta
$total = $detalleVenta->sumaTotalVenta();
$detalleVentas = $detalleVenta->consultarDetalleVenta();

// Verificar si se obtuvieron detalles de venta
if ($detalleVentas !== null) {
    ?>

    <!-- Mostrar la tabla con productos en el carrito -->
    
    <div class="table-container">
    <table id="customers" id="customers" class="table">
        <thead>
            <tr class="table text-center">
                <th>Código</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Precio Total</th>
                <th></th>
                <!-- Otros campos -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalleVentas as $detalleVentaItem) : ?>
                <tr>
                    <td><?php echo $detalleVentaItem['idproducto']; ?></td>
                    <td><?php echo $detalleVentaItem['descripcion']; ?></td>
                    <td><?php echo $detalleVentaItem['cantidad']; ?></td>
                    <td><?php echo $detalleVentaItem['preciounitario']; ?></td>
                    <td><?php echo $detalleVentaItem['preciototal']; ?></td>
                    <td>
                        <a  href='Controlador/procesaMovimiento.php?idproducto=<?php echo $detalleVentaItem['idproducto']; ?>'>Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-center mt-3 mb-3">
        <button class="tiendabtn" id="tiendabtn" type="button" onclick="window.location.href='tienda.php'">Regresar</button>
    </div>
            </div>

    <!-- Mostrar el total a pagar -->
    <div id="total-container">
        <th>Total a pagar <?php echo $total ?></th>
    </div>
    <!------------------------------------------------------codigo gabo------------------------------------------------------>
    <div class="paypal">
        <div id="paypal-button-container" ></div>
        <p id="result-message"></p>
    </div>

<script>
    paypal.Buttons({
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: <?php echo json_encode($total); ?>
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (orderData) {
                document.getElementById('result-message').innerText = 'Transacción exitosa';

                // Llamada AJAX para procesar la venta en el servidor
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "Controlador/procesar_pago.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // La respuesta del servidor después de procesar el pago
                        console.log(xhr.responseText);
                    }

                };
                xhr.send();
                

            });
        }
    }).render('#paypal-button-container');
</script>


    <!------------------------------------------------------codigo gabo------------------------------------------------------>

    <?php
} else {
    echo "No se encontraron detalles de venta.";
}
?>


<!---------------------------------------------------Tabla carrito-------------------------------------------------------------------->



    <!-- Footer -->
    <footer id="tempaltemo_footer" style="background-color: #1A2B50;">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 border-bottom pb-3 border-light logo" style="color: #1BB280;"><b>REMASA</b></h2>
                    <ul class="list-unstyled text-light footer-link-list">

                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            <a class="text-decoration-none" href="https://www.google.com.mx/maps/place/REMASA/@20.620459,-103.2890316,19.38z/data=!4m6!3m5!1s0x8428b36cc0d9c15b:0x59f89a6ff9183a46!8m2!3d20.6203304!4d-103.2883587!16s%2Fg%2F1vljgn9n?entry=ttu"> Carretera a Los Altos No. 1776 <br> San Pedrito, Tlaquepaque, Jalisco.</a>
                        </li>

                        <li>
                        <i class="fab fa-whatsapp fa-fw"></i>
                        <a class="text-decoration-none" href="https://wa.me/3339521166"> 33 39 52 11 66</a>
                        </li>

                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">33 36 00 15 49 / 33 36 00 15 70</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">remasamg@hotmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Productos</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Suspensión</a></li>
                        <li><a class="text-decoration-none" href="#">Frenos</a></li>
                        <li><a class="text-decoration-none" href="#">Dirección</a></li>
                        <li><a class="text-decoration-none" href="#">Filtración</a></li>
                        <li><a class="text-decoration-none" href="#">Lubricantes</a></li>
                        <li><a class="text-decoration-none" href="#">Conexiones</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Acceso rápido</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="index.php">Inicio</a></li>
                        <li><a class="text-decoration-none" href="acercaDeNosotros.php">Acerca de nosotros</a></li>
                        <li><a class="text-decoration-none" href="contactanos.php">Contáctanos</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4" style="background-color: #1A2B50;">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">

                    <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://wa.me/3339521166"><i class="fab fa-whatsapp fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.facebook.com/p/Refaccionaria-Miguel-De-Autobuses-Sa-De-Cv-100054638641322/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/remasa_mx/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div style="background-color: #058F71;">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2023 REMASA 
                            | Desarrollado por: <a rel="sponsored" target="_blank">Software Solutions</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- Footer -->

    <!-- Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!--Script -->
</body>

</html>