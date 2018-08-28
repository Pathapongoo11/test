<?php



require "vendor/autoload.php";

$access_token = 'AD4BSrRam1iTdcQY5POWHmsaAY3sdRr4IbZ8BNkE9y9gCc9S04QJLha3iV/OYKO/EGTznnIj6498MIj7TiZzC2yPEW/Rg4D03t//SWkjVr6MFjk2Bu2yXId9zmRE5SdQKvqtgAFPK6YXfVUEiLVPygdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'b3bf04eea8d9a4a0c7dc7404aa82e7ff';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







