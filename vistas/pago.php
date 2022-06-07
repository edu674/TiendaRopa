<?php 
require("cabecero.php");
 ?>

<main style="min-height:500px">
	<div class="row">
		<div class="s12">

			<h1 align="center" style="margin-top: 25vh">¡Ya Casi Son Tuyos!</h1>
			<h6 align="center" style="color: white">Estas a punto de pagar: <?php echo number_format($_SESSION['total'], 2, '.', ',')?></h6>
			<br>
			<div align="center" id="paypal-button-container"></div>		
		</div>
	</div>
</main>
<?php 
require("footer.php");
?>
<!-- script para procesar el pago atraves de paypal  -->
<script src="https://www.paypal.com/sdk/js?client-id=AQS77ljM6yn5InALQQIUPrFm2OtpsxwBwWDBfymwtUbvUX8dvAP4TPLZBaz-47Dhuvxo388Nr2mdS_Dk&currency=MXN"></script>
       
<script>
      paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $_SESSION["total"]; ?>' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
              }
            }]
          });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                console.log(data);
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

            // When ready to go live, remove the alert and show a success message within this page. For example:
            // var element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            window.location.href="../controlador/Pago.php?paypal="+transaction.id;
            // actions.redirect('index.php');
          });
        }
      }).render('#paypal-button-container');

    </script>
