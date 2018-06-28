<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = '7d9Nbungi0BrJr/BLKMjKli61Rnpdb90Ri2/rE74VNAJCH4SD0qCcQkAu274gHSpfEWQWLhr3MwxXFzcvSFXgPDtLdZkZScA2nWGqX4eeevxNtuZ+0eA2vr/m2SLwAIP6rraXt++tgc6Kq2pW6TS3QdB04t89/1O/w1cDnyilFU=';

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
			
			if($event['message']['text'] == 'ขอไทยเช้า'){
			  $text = 'หวยหุ้นไทยเช้า 12 13 14 23 24 34';
			  $replyToken = $event['replyToken'];
			  $messages = [
				'type' => 'text',
				'text' => $text
			];
			}elseif($event['message']['text'] == 'ขอไทยเที่ยง'){
			  $text = 'หวยหุ้นไทยเช้า 89 80 81 90 91 01';
			  $replyToken = $event['replyToken'];
			  $messages = [
				'type' => 'text',
				'text' => $text
			];
			}elseif($event['message']['text'] == 'ขอไทยบ่าย'){
			  $text = 'หวยหุ้นไทยเช้า 34 35 36 45 46 56';
			  $replyToken = $event['replyToken'];
			  $messages = [
				'type' => 'text',
				'text' => $text
			];
			}elseif($event['message']['text'] == 'ขอไทยเย็น'){
			  $text = 'หวยหุ้นไทยเช้า 90 96 93 91 92 98';
			  $replyToken = $event['replyToken'];
			  $messages = [
				'type' => 'text',
				'text' => $text
			];
			}
			
			
			//$text = $event['source']['userId'];
			//$text = 'หวยหุ้นไทยเช้า 12 13 14 23 24 34';
			// Get replyToken
			//$replyToken = $event['replyToken'];

			// Build message to reply back
			//$messages = [
			//	'type' => 'text',
			//	'text' => $text
			//];

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
			//echo "หวยหุ้นไทยเช้า 12 13 14 23 24 34" . "\r\n";
		}
	}
}
echo "OK";
//echo "หวยหุ้นไทยเช้า 12 13 14 23 24 34" . "\r\n";
