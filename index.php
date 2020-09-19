<?php
require_once('vendor/autoload.php');

if (isset($_POST['amount'])) {
    $amount = $_POST['amount'];
}

if (isset($_POST['stripeToken'])) {
    $token = $_POST['stripeToken'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}

$testKey = "sk_test_qZpYd0NW2ekyE6W9PtKVrYDB00es75TvLu";
$liveKey = "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";
if ($amount != null && $token != null && $email != null && $description != null) {
    $stripe = new \Stripe\StripeClient(
        $testKey
    );

    $charge = $stripe->charges->create([
        'amount' => $amount,
        'currency' => 'usd',
        'source' => $token,
        'receipt_email' => $email,
        'description' => $description,
    ]);

    echo json_encode($charge);
}
