<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=mojito",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 1"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

$Array = json_decode($response,true);
print_r ($Array);
echo $Array["drinks"][0]["idDrink"];
if ($err) {
  echo "cURL Error #:" . $err;
} else {
//  foreach ($Array as $books) {
//echo $books;
}
