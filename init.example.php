<?php
require_once 'autoload.php';
define('MERCHANT_ID' , 1545859);
define('MERCHANT_PASSWORD' , 'test');
define('IPSP_GATEWAY' ,  'payment.albpay.io');
$client = new Ipsp_Client( MERCHANT_ID , MERCHANT_PASSWORD, IPSP_GATEWAY );
$ipsp   = new Ipsp_Api( $client );

$order_id = time();
$data = $ipsp->call('checkout',array(
 'order_id'    => $order_id,
 'order_desc'  => 'Short Order Description',
 'currency'    => $ipsp::USD ,
 'amount'      => 2000, // 20 USD
 'response_url'=> 'http://site_url/callback.php'
))->getResponse();
// redirect to checkoutpage
$data->redirectToCheckout();
