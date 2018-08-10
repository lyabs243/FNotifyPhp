<?php

#API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AAAAjbap9bU:APA91bHOVqgH3pfu1AnYNIujeuJ9qUxQhB1lxvqTlqXGm_XPDv2XSXcO5wNzUKNFcZlqovFHTE1u_Yr4r5uD4lm2fWg9__cgHBkbjV2fNFSkvt7bg3blcovRe7I0t37_fL1_9xiO3iXt' );
    $registrationIds = 'dkcfs-AKk_4:APA91bExt06HXkQkjoSvLaIHTX1k9TbZBovd1QgjAObT914Udh83I5FTPcjTQjaXl7jSLs-amAfdMfZq6fYtqSKjB1y0Q4I11jxD9jkDN9AxrggHi0xl5j3m0lJjK3kLiJ_KzwLXpvMqS-yAbH5c4oTxK6vHpmBkVw';

#prep the bundle
     $msg = array
          (
		'body' 	=> 'Firebase va propulse Notify News',
		'title'	=> 'Salut Lyabs243',
             	/*'icon'	=> 'myicon',Default Icon*/
              	/*'sound' => 'mySound'Default sound*/
          );

	$fields = array
			(
				'to'		=> $registrationIds,
				'notification'	=> $msg
			);
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);

#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );

#Echo Result Of FireBase Server
echo $result;
