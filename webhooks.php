<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = '04jXv6we9MYpqRctFYw7mNbBUIU0Wb22RVFrmfSaJup0Ii+Uf3INLI5FzsSdP1uysuqnv/YvY300eOcXdgPygsQJ/QPsY1CTHe9QAoR2E14pw346tN2johPVIVUMO3CaBx/7W9TkKsXdTFRqL2+UJgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			if($event['message']['text'] == 'แสงสว่าง'){
				$replyToken = $event['replyToken'];

				$messages = [
					'type' => 'text',
					'text' => "koo"
				];
/*				
				$messages = [
					"type" => "image",
					"originalContentUrl" => "https://scontent.fbkk1-2.fna.fbcdn.net/v/t1.0-1/c0.1.100.100/p100x100/29343246_450150078777035_7169313599809126400_n.jpg?_nc_cat=0&oh=f9baa54cfe0e04cb0ba0c6bf580e6e80&oe=5B6616B3",
					"previewImageUrl" => "https://scontent.fbkk1-2.fna.fbcdn.net/v/t1.0-1/c0.1.100.100/p100x100/29343246_450150078777035_7169313599809126400_n.jpg?_nc_cat=0&oh=f9baa54cfe0e04cb0ba0c6bf580e6e80&oe=5B6616B3"
				];
			}

			if($event['message']['text'] == 'แอร์'){
				$replyToken = $event['replyToken'];
				
				$messages = [
					"type" => "location",
					"title" => "MoreThrust LAB",
					"address" => "198 ม.6 บ.เดื่อ อ.เมือง จ.อุดรธานี 41000",
					"latitude" => 17.423152,
					"longitude" => 102.800753
				];
			}

			if($event['message']['text'] == 'สถานะ'){
				$replyToken = $event['replyToken'];
				
				$messages = [
					"type" => "template",
  					"altText" => "this is a confirm template",
  					"template" => array(
    					"type" => "confirm",
    					"actions" => array(
      						array(
        						"type" => "message",
        						"label" => "Yes",
        						"text" => "Yes"
      						),
      						array(
        						"type" => "message",
        						"label" => "No",
        						"text" => "No"
      						)
    					),
    					"text" => "Continue? ok"
  					)
				];
			}*/
  }

		// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";


		}
	}
}
echo "OK";
