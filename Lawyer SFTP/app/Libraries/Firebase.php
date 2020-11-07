<?php

namespace App\Libraries;

class Firebase
{
	public static function send($fcm, $message, $payload, $type)
	{
		$notif = array(
			'title' => env('APP_NAME'),
			'is_background' => FALSE,
			'message' => $message,
			'image' => '',
			'body' => $message,
			'sound' => 'default',
			'type' => $type,
			'payload' => $payload,
			'timestamp' => date('Y-m-d H:i:s'),
		);

		$data = array(
			'title' => env('APP_NAME'),
			'body' => $message,
			'icon' => '',
			'type' => $type,
			'payload' => $payload,
			'timestamp' => date('Y-m-d H:i:s'),
		);
		
		$fields = array(
			'to' => $fcm,
			'notification' => $notif,
			'data' => $data,
		);


		// Set POST variables
		$url = 'https://fcm.googleapis.com/fcm/send';

		$headers = array(
			'Authorization: key=AAAAi2Vv71o:APA91bEbTnMYCPZWe1HuTSjOQKBHQyuddzrsp8z0VahW3c0Mx4wToyIihe2WtJ1VjgkwpSv_w3hOGQm1R0Fw98WKshcGCHxMmb1VbwdyceUvbhAgErejje5TzSvcj1cKufS7MiZcMOII',
			'Content-Type: application/json'
		);
		// Open connection
		$ch = curl_init();

		// Set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Disabling SSL Certificate support temporarly
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

		// Execute post
		$result = curl_exec($ch);
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}

		// Close connection
		curl_close($ch);

		return $result;
	}
}