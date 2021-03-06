# laravel-payment-gateway
Nextpay Payment Gateway for Laravel Framework


package's home : [nextpay payment gateway by laravel](http://nextpay.ir) 

by this  package we are able to connect to all Iranian bank with one unique API.

Please inform us once you've encountered [bug](https://github.com/SSEsmaeeli/NextpayGateway/issues) or [issue](https://github.com/SSEsmaeeli/NextpayGateway/issues)  .

NextPay payment gateway for [Laravel](https://laravel.com/)
----------


**Installation**:

STEP 1 : run 
    
    composer require ssesmaeeli/nextpaygateway
    
STEP 2 : Add `provider` and `facade` in config/app.php

    'providers' => [
      ...
      SSEsmaeeli\NextpayGateway\NextpayServiceProvider::class, // <-- add this line at the end of provider array
    ],
Step 3:  

    php artisan vendor:publish --provider=NextPay\Gateway\GatewayServiceProvider
    php artisan vendor:publish --provider=NextpayPayment\Gateway\GatewayServiceProvider

Configuration file is placed in config/gateway.php , open it and enter your banks credential:

You can make connection to bank by several way (Facade , Service container):

    try {
       
       $nextpay = new NextPay();
       $nextpay->setAmount(1200);
       $nextpay->token();
       $trans_id = $nextpay->getTransId();
       $request = $nextpay->getRequestURL();
       return view('nextpay::request', compact('trans_id', 'request'));
       
    } catch (Exception $e) {
       
       	echo $e->getMessage();
    }

In `price` method you should enter the price in Toman/تومان (ایران) 

and in your callback :

    try { 
       
       $nextpay = new NextPay();
       $trans_id = Input::get('trans_id');
       $order_id = Input::get('order_id');
       $nextpay->setTransId($trans_id);
       $nextpay->setOrderId($order_id);
       $trans = $nextpay->getTransaction($trans_id, $order_id);
       $nextpay->setAmount($trans->price);
       $nextpay->setApiKey(config('gateway.nextpay.api_key', 'None'));
       $status = $nextpay->verify_request();
       switch ($status) {
           case 0:
               $status = "موفق";
               break;
           case -1:
               $status = "در انتظار واریز";
               break;
           default:
               $status = "ناموفق";
               break;
       }
       $trans_id = $nextpay->getTransId();
       return view('nextpay::callback', compact('order_id', 'trans_id', 'status'));
       
    } catch (Exception $e) {
       
       echo $e->getMessage();
    }  

If you are interested to developing this package you can help us by these ways :

 1. Improving documents.
 2. Reporting issue or bugs.
 3. Collaboration in writing codes and other banks modules.

This package is extended from PoolPort  but we've changed some functionality and improved it .
