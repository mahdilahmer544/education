<?php
  include('connexion.php');
  require_once('stripe-php-7/init.php'); // Ne pas oublier cte ligne +modifier lien vers la bonne librairie

\Stripe\Stripe::setApiKey("sk_test_51KLunzB6Hpm6LpAqWUXM1yd3XTTo3iNP0WCQLI15wHOviBNlerloqRZKepwMJVNiOsftKOXoy68jEJLJ51d3NRwa00PI7dfCxU");

  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];

  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token
  ));
  $total=$_GET["total"];
  $total=$total*100;
  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $total,
      'currency' => 'eur',
      'description' => 'Discover France Guide by Erasmus of Paris',
      'receipt_email' => $email  
  ));
  $query="INSERT INTO commande (prix_total,nom_client,tel,adresse,etat) 
  VALUES ('".$_GET["total"]."','".$_SESSION["nom"]."','".$_SESSION["tel"] ."','".$_SESSION["adresse"]."','".$paye."')  ";
  $resultat =$connexion->query($query );
  echo "<script>alert('Payment accepted!');</Script>";
  echo"<script>javascript:window.close()</script>";
?>