<?php
require_once('vendor/autoload.php');
$amount = $_GET['amount'];
$payment_method_id = $_GET['payment_method_id'];
$email = $_GET['email'];


$stripe = new \Stripe\StripeClient(
    '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'
);
$paymentIntent = $stripe->paymentIntents->create([
    'amount' => $amount,
    'currency' => 'usd',
    'payment_method_types' => ['card'],
    'payment_method' => $payment_method_id,
    'receipt_email' => $email,
    'confirm' => true
]);

echo json_encode($paymentIntent);

//header('Location:' . $customer['charges']['url']);
