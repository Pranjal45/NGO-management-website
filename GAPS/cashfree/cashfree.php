<?php
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$url="https://api.cashfree.com/pg/orders";
$clientID="TEST39343264dfae472d4efc91dd7e234393";
$secret="TEST827a479b786ac609f58c2510e8d795e26cb7a9a6";
$id = date('y'.'m'.'d'.'H'.'i'.'s'); 

$ch=curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST,true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_HTTPHEADER,array(
    "Content-Type: application/json",
    "x-api-version: 2022-09-01",
    "x-client-id: $clientID",
    "x-client-secret: $secret"
));

$data = <<< JSON
{
  "order_id": "order_$id",
  "order_amount": 10.12,
  "order_currency": "INR",
  "order_note": "Additional order info",
  "customer_details": {
  "customer_id": "$id",
  "customer_name": "name",
  "customer_email": "$email",
  "customer_phone": "$mobile"
 }
}
JSON;
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
$response = curl_exec($ch);
$decode = json_decode($response);
$link = $decode->payment_link;
?>