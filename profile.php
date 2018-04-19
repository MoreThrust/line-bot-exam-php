<?php


$access_token = '04jXv6we9MYpqRctFYw7mNbBUIU0Wb22RVFrmfSaJup0Ii+Uf3INLI5FzsSdP1uysuqnv/YvY300eOcXdgPygsQJ/QPsY1CTHe9QAoR2E14pw346tN2johPVIVUMO3CaBx/7W9TkKsXdTFRqL2+UJgdB04t89/1O/w1cDnyilFU=';

$userId = 'ee683a19a016dc7af6706b608f71d4c5';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

