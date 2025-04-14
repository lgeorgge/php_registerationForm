<?php
function validateNumber($Number):bool{
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://whatsapp-number-validator3.p.rapidapi.com/WhatsappNumberHasItWithToken",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => json_encode([
		'phone_number' => '+2'.$Number
	]),
	CURLOPT_HTTPHEADER => [
		"Content-Type: application/json",
		"x-rapidapi-host: whatsapp-number-validator3.p.rapidapi.com",
		"x-rapidapi-key: 21d2b79df3msh953dd43a47f8d81p1d5f8fjsn5de0276f1c07"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else { 
    $response = json_decode($response, true); 
    $res = $response['status'];
    var_dump($res);
        return $res==='string(5) "valid"';
}
}
?>
