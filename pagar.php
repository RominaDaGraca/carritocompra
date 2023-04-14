<?php
include "global/config.php";
include "global/conexion.php";
include "carrito.php";
include "templates/cabecera.php";

?>
<?php
if ($_POST) {
    $total = 0;
    $SID = session_id();
    $Correo = $_POST['email'];

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']);
    }
    if (!isset($_SESION["idVenta"])) {
        $sentencia = $pdo->prepare("INSERT INTO `tblventas`
    (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) 
    VALUES (NULL, :ClaveTransaccion, '', NOW(), :Correo , :Total, 'pendiente');");
        $sentencia->bindParam(":ClaveTransaccion", $SID);
        $sentencia->bindParam(":Correo", $_POST["email"]);
        $sentencia->bindParam(":Total", $total);
        $sentencia->execute();
        $idVenta = $pdo->lastInsertId();
        //Guardamos el idVenta en la sesión para no insertar
        //si ya hemos insertado.
        $_SESION["idVenta"] = $idVenta;
        foreach ($_SESSION['CARRITO'] as $indice => $producto) {

            $sentencia = $pdo->prepare("INSERT INTO `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) VALUES (NULL, :IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO, :CANTIDAD, '0');");
            $sentencia->bindParam(":IDVENTA", $idVenta);
            $sentencia->bindParam(":IDPRODUCTO", $producto['ID']);
            $sentencia->bindParam(":PRECIOUNITARIO", $producto['PRECIO']);
            $sentencia->bindParam(":CANTIDAD", $producto['CANTIDAD']);

            $sentencia->execute();
        }

        // echo "<h3>".$total."</h3>";
    } else {
        $idVenta = $_SESSION["idVenta"];
    }
} else {
    header("Location:index.php");
}
?>
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo clienteIDPayPal ?>&currency=EUR"></script>


<div class="jumbotron text-center">
    <h1 class="display-4">¡ Paso Final !</h1>
    <hr class="my-4">
    <p class="lead"> Estas a punto de pagar con paypal la cantidad de:
    <h4>$<?php echo number_format($total, 2); ?></h4>
    <div id="paypal-button-container"></div>
    </p>
    <p>Los productos podrán ser descargados una vez que se procese el pago <br>
        <strong>(Para aclaraciones: romina@gmail.com)</strong>
    </p>
</div>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay',
            height: 40
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $total ?>',
                        currency: 'EUR'
                    },
                    description: 'Compra de productos en tienda:$<?php echo number_format($total, 2); ?>',
                    reference_id: '<?php echo $SID ?>#<?php echo openssl_encrypt($idVenta, COD, KEY) ?>'

                }]

            });
        },
        onCancel: function(data) {
            alert("Pago cancelado");
            console.log(data);
        },

        // Call your server to finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture()
                .then(function(details) {
                    /*
                    console.log("Pago completado")
                    console.log(details);
                    let custom=details.purchase_units[0].reference_id.split("#");
                    let user=details.payer.email_address;
                    let status=details.status;
                    let importe=details.purchase_units[0].amount.value;
                    let resp={
                    custom,
                    user,
                    status,
                    importe
                    }
                    window.location="verificador.php?respuestaventa="+JSON.stringify(resp);
                    */
                    fetch("verificador2.php", {
                            method: "POST",
                            headers: {
                                'content-type': 'application/json'
                            },
                            body: JSON.stringify({
                                datos: details
                            })
                        }).then(data => data.text())
                        .then(datos => {
                            console.log(datos);
                        }).catch(err => {
                            console.log(err);
                        })
                })
        }
    }).render('#paypal-button-container');
</script>
<?php
include("templates/pie.php")
?>