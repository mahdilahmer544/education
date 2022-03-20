<?php
include("connexion.php");
session_start();
$token=$_POST['stripeToken'];
$email=$_SESSION["email"];
$name=$_SESSION["nom"];
if (filter_var($email,FILTER_VALIDATE_EMAIL)&&!empty($name)&&!empty($token)){
    $ch=curl_init();
    $data =[
        'source'=> $token,
        'description'=>$name,
        'email'=>$email 
    ];
    curl_setopt_array($ch,[
        CURLOPT_URL =>'https://api.stripe.com/v1/custom',
        CURLOPT_RETURNTRANSFER =>true,
        CURLOPT_USERPWD =>'sk_test_51KLunzB6Hpm6LpAqWUXM1yd3XTTo3iNP0WCQLI15wHOviBNlerloqRZKepwMJVNiOsftKOXoy68jEJLJ51d3NRwa00PI7dfCxU',
        CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        CURLOPT_POSTFIELDS=>http_build_query($data)

    ]);
    $response=json_decode(curl_exec($ch));
    curl_close($ch);
    var_dump($response);
    die();
}