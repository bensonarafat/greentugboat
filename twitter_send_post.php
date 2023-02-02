<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.twitter.com/2/tweets',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "text": "Ben is developing the API you get it"
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: OAuth oauth_consumer_key="6gH71f36jkuvR8pVRF3vKM0A8",oauth_token="1523643984534454272-pnRrbLRJT77connPQOREq3Qg1A2hjB",oauth_signature_method="HMAC-SHA1",oauth_timestamp="1659648140",oauth_nonce="LWTHUJhchHH",oauth_version="1.0",oauth_signature="rmD0mJZxBB6T%2FEHpLWn%2BYdJj5ME%3D"',
    'Content-Type: application/json',
    'Cookie: guest_id=v1%3A165935019731409250; guest_id_ads=v1%3A165935019731409250; guest_id_marketing=v1%3A165935019731409250; personalization_id="v1_0cFQiI+ghLY2/cX7bY2Sgg=="'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
