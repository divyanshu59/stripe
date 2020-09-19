<?php
require_once('vendor/autoload.php');
$amount = $_POST['amount'];
$token = $_POST['stripeToken'];
$email = $_POST['email'];


$stripe = new \Stripe\StripeClient(
    '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'
);
<<<<<<< HEAD
$paymentIntent = $stripe->paymentIntents->create([
    'amount' => $amount,
    'currency' => 'usd',
    'payment_method_types' => ['card'],
    'payment_method' => $payment_method_id,
    'receipt_email' => $email,
    'confirm' => true
]);

echo json_encode($paymentIntent);
=======

$charge = $stripe->charges->create([
    'amount' => $amount,
    'currency' => 'usd',
    'source' => $token,
    'email' => $email,
  ]);
>>>>>>> 7b0cdcf3f8873a3eafc72653a7d2a0d427904d2f

echo $charge;
