<?php
$strAccessToken = "A3sF9YH62TBgL/daHT2bWogclliPZzhJjuqhsvIpD1oARloeM7T5Xzw074iSTHRYGCUdtOS68uqhvLE82m6ds7VjXpepgRnWaqHoO+tW+vspsbX2OdbTS36euQI6CtSsK+ZyzFGPnBrNYUidt1KdTgdB04t89/1O/w1cDnyilFU=";

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);

$strUrl = "https://api.line.me/v2/bot/message/reply";

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$msg = $arrJson['events'][0]['message']['text'];
$userID = $arrJson["events"][0]["source"]["userId"];
$timestamp = $arrJson["events"][0]["timestamp"];

$data = json_decode($json);

$userMessage = $arrJson['events'][0]['message']['text'];

if($userMessage == "stock"){
	$arrPostData = array();
	$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
	$arrPostData['messages'][0]['type'] = "text";
	$arrPostData['messages'][0]['text'] = "Query Stock";
}
else if($userMessage == "invoice"){
	$arrPostData = array();
	$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
	$arrPostData['messages'][0]['type'] = "text";
	$arrPostData['messages'][0]['text'] = "Query Invoice";
}
else if($userMessage == "quotation"){
	$arrPostData = array();
	$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
	$arrPostData['messages'][0]['type'] = "text";
	$arrPostData['messages'][0]['text'] = "Query Quotation";
}
else{
	$arrPostData = array();
	$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
	$arrPostData['messages'][0]['type'] = "text";
	$arrPostData['messages'][0]['text'] = "เลือกเมนูได้เลยครับ";
}


$channel = curl_init();
curl_setopt($channel, CURLOPT_URL,$strUrl);
curl_setopt($channel, CURLOPT_HEADER, false);
curl_setopt($channel, CURLOPT_POST, true);
curl_setopt($channel, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($channel, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($channel, CURLOPT_RETURNTRANSFER,true);
curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($channel);
curl_close ($channel);
?>