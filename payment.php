<?php

$password ="CBSSEEDF4PSJF24K"; 
$signature = "AbxVN7WRiGN6q-eXonxK63NkzfBkAPcRQ1CheTd4NEiBlZmw.oW394cX" ;
$user = "brophal_api1.hotmail.com";

$tabExpress = array('METHOD' => "SetExpressCheckout",
					'USER' => $user,
					'SIGNATURE' => $signature,
					'PWD' => $password,
					'RETURNURL'=> "http://e1395340.webdev.cmaisonneuve.qc.ca/pi2M/payment.php",
					'CANCELURL'=>"http://e1395340.webdev.cmaisonneuve.qc.ca/pi2M/cancel.php", //ici page pour canceler la transactions et unset la session
					)  











?>