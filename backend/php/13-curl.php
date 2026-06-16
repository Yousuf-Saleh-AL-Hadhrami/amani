<?php

// Thawani Integration from my php application
$publishableKey = 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy';
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://uatcheckout.thawani.om/api/v1/checkout/session",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'client_reference_id' => '123412',
    'mode' => 'payment',
    'products' => [
        [
            'name' => 'product 1',
            'quantity' => 1,
            'unit_amount' => 1 * 1000  // المبلغ بالبيسة (100 بيسة = 0.1 ريال عماني)
        ]
    ],
    'success_url' => 'https://thw.om',
    'cancel_url' => 'https://thw.om',
    'metadata' => [
        'Customer name' => 'somename',
        'order id' => 0
    ]
  ]),
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json",
    "thawani-api-key: rRQ26GcsZzoEhbrP2HZvLYDbn9C9et" // تم وضع الـ Secret Key الخاص بك هنا
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $responseData = json_decode($response, true);

  if (isset($responseData['success']) && $responseData['success'] === true) {
      
      $sessionId = $responseData['data']['session_id'];

      // ✅ تم تصحيح الرابط هنا ليتجه لبيئة الاختبار ومسار الدفع الصحيح
      // $redirectUrl = "https://uatcheckout.thawani.om/pay/".$sessionId;

    $redirectUrl = "https://uatcheckout.thawani.om/pay/" . $sessionId . "?key=" . $publishableKey;

      header("Location:".$redirectUrl);
      exit; 
      
  } else {
      echo "<h2>Failed to create checkout session:</h2>";
      echo "<pre>";
      print_r($responseData);
      echo "</pre>";
  }
}
