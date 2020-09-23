<?php
require_once('vendor/autoload.php');

if (isset($_GET['amount'])) {
    $amount = $_GET['amount'];
} else {
    $amount = 0;
}

if (isset($_GET['stripeToken'])) {
    $token = $_GET['stripeToken'];
} else {
    $token = "";
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    $email = "";
}
if (isset($_GET['description'])) {
    $description = $_GET['description'];
} else {
    $description = "";
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
} else {
    echo "Invalid DAta";
    echo "$amount $token $email $description";
}
