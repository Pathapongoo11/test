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
		}else{
		$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
	
			$messages1 = array (
					  'to' => $text,
					  'messages' => 
					  array (
					    0 => 
					    array (
					      'type' => 'flex',
					      'altText' => 'This is a Flex Message',
					      'contents' => 
					      array (
						'type' => 'bubble',
						'body' => 
						array (
						  'type' => 'box',
						  'layout' => 'horizontal',
						  'contents' => 
						  array (
						    0 => 
						    array (
						      'type' => 'text',
						      'text' => 'Hello,',
						    ),
						    1 => 
						    array (
						      'type' => 'text',
						      'text' => 'World!',
						    ),
						  ),
						),
					      ),
					    ),
					  ),
					);
  
		
				$url1 = 'https://api.line.me/v2/bot/message/push';
							$data1 = $messages1;
		
			
			
			
			echo $post1 = json_encode($data1);
			$headers1 = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch1 = curl_init($url1);
			curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch1, CURLOPT_POSTFIELDS, $post1);
			curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers1);
			curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
			$result1 = curl_exec($ch1);
			curl_close($ch1);
			echo $result1 . "\r\n";
			
                }
	}
}
echo "OK";
echo $post1 = json_encode($data1);
