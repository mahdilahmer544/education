<?php $total=$_GET["total"]; ?>
<form action='paiement-stripe.php?total=<?php echo"$total"; ?>' method="POST">
  
<script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_live_51KLunzB6Hpm6LpAqI6lyLEvdilRtTcIVZg1F6sKIUKooMcVJaSU9qN4oV5E7PWtkRgq30nWoScZoY5B88oAvnnkk007h8lsirU"
    data-amount=<?php $total=$_GET["total"]; $total=$total*100;echo"$total" ?>
    data-name="Formation en developpement"
    data-description="Discover France Guide"
    data-image="logo-stripe.png"
    data-locale="auto"
    data-currency="eur"
    data-label="cliquez ici pour payer" >
  </script>
</form>