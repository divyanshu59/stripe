<?php
require_once('vendor/autoload.php');



$stripe = new \Stripe\StripeClient(
    'sk_test_qZpYd0NW2ekyE6W9PtKVrYDB00es75TvLu'
);
$customer = $stripe->paymentIntents->create([
    'amount' => 2000,
    'currency' => 'usd',
    'payment_method_types' => ['card'],
]);
echo $customer;

//header('Location:' . $customer['charges']['url']);
