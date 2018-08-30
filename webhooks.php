<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'XXAXYGNcIogeHDYMP+fSZ3/j3L/IWi5BgMFHk1FFmOXROxRETkstzwcv9DTH4QwaEGTznnIj6498MIj7TiZzC2yPEW/Rg4D03t//SWkjVr7Clnwz+iqZVP2NLAYsEo2xg6P//TgCgvbLab250OqmqFGUYhWQfeY8sLGRXgo3xvw=';

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
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

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
}else{
		$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
	
			$messages = [
							 "type"=> "flex",
			      "altText"=> "This is a Flex Message",
			      "contents",
				"type"=> "bubble",
				"body",
				  "type"=> "box",
				  "layout"=> "horizontal",
				  "contents",

				      "type"=> "text",
				      "text"=> "Hello,"
				    ,

				      "type"=> "text",
				      "text"=> "World!"

			];

				$url = 'https://api.line.me/v2/bot/message/push';
							$data = [
								'to' => "U052004ee1910a75874bcca55828e981f",
								'messages' => [$messages],
							];
		
			
			
			
			$post = json_encode($data);
			echo $post;

}
echo "OK";
