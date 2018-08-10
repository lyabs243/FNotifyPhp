<?php

	//initialize config file
	$configs = include('config/conf.php');
    $registrationIds = 'dkcfs-AKk_4:APA91bExt06HXkQkjoSvLaIHTX1k9TbZBovd1QgjAObT914Udh83I5FTPcjTQjaXl7jSLs-amAfdMfZq6fYtqSKjB1y0Q4I11jxD9jkDN9AxrggHi0xl5j3m0lJjK3kLiJ_KzwLXpvMqS-yAbH5c4oTxK6vHpmBkVw';

#prep the bundle
     $message = array
     (
		'body' 	=> 'Firebase va propulse Notify News',
		'title'	=> 'Salut Lyabs243',
             	/*'icon'	=> 'myicon',Default Icon*/
              	/*'sound' => 'mySound'Default sound*/
     );

	$fields = array
	(
		'to'		=> $registrationIds,
		/*'registration_ids' => array('dkcfs-AKk_4:APA91bExt06HXkQkjoSvLaIHTX1k9TbZBovd1QgjAObT914Udh83I5FTPcjTQjaXl7jSLs-amAfdMfZq6fYtqSKjB1y0Q4I11jxD9jkDN9AxrggHi0xl5j3m0lJjK3kLiJ_KzwLXpvMqS-yAbH5c4oTxK6vHpmBkVw','err'),*/
		'notification'	=> $message
	);
	
	$headers = array
	(
		'Authorization: key=' . $configs['API_ACCESS_KEY'],
		'Content-Type: application/json'
	);

#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, $configs['FIREBASE_SERVER_URL'] );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );

#Echo Result Of FireBase Server
echo $result;
    class FNotifyPhp
    {
        private $registrationIds;
        private $title;
        private $body;
        private $to;

        public function __construct()
        {
            $this->registrationIds = array();
            $this->body = 'Specify body Message';
            $this->title = 'Specify message title';
            $this->to = 'Specify recipient token';
        }
           
        function getRegistrationIds() {
            return $this->registrationIds;
        }

        function getTitle() {
            return $this->title;
        }

        function getBody() {
            return $this->body;
        }

        function getTo() {
               return $this->to;
        }

        function setRegistrationIds($registrationIds) {
            $this->registrationIds = $registrationIds;
        }

        function setTitle($title) {
            $this->title = $title;
        }

        function setBody($body) {
            $this->body = $body;
        }

        function setTo($to) {
            $this->to = $to;
        }
    }