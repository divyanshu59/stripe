<?php
require_once('vendor/autoload.php');
$amount = $_POST['amount'];
$token = $_POST['stripeToken'];
$email = $_POST['email'];

$stripe = new \Stripe\StripeClient(
    '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'
);

$charge = $stripe->charges->create([
    'amount' => $amount,
    'currency' => 'usd',
    'source' => $token,
    'email' => $email,
  ]);

echo $charge;
