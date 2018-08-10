<?php
    class FNotifyPhp
    {
        private $registrationIds;
        private $title;
        private $body;
        private $to;
        
        private $fields;
        private $message;
        private $headers;
        
        private $configs;

        public function __construct($_configs)
        {
            $this->configs = $_configs;
            
            $this->registrationIds = array();
            $this->body = 'Specify body Message';
            $this->title = 'Specify message title';
            $this->to = 'Specify recipient token';
            
            $this->fields = array();
            $this->message = array();
            $this->headers = array();                    
        }
        
        /**
         * Notify only one recipient
         * must specify "to" propriety
         */
        function notifyRecipient()
        {
            //init notification key's message
            $this->initMessageKeys();
            
            $this->initFieldKeys(true);
            $this->initHeaderKeys();
            return $this->sendMessage();
        }
        
        /**
         * Notify more than one recipient
         * must specify "registrationIds" propriety
         */
        function notifyRecipients()
        {
            //init notification key's message
            $this->initMessageKeys();
            
            $this->initFieldKeys(FALSE);
            $this->initHeaderKeys();
            return $this->sendMessage();
        }
        
        //init notification key's message
        private function initMessageKeys()
        {
            $this->message = array
                            (
                                'body' 	=> $this->body,
                                'title'	=> $this->title,
                            );
        }
        
        //init field keys
        private function initFieldKeys($oneRecipient=true)
        {
            if($oneRecipient)
            {
                $this->fields['to'] = $this->to;
            }
            else 
            {
                $this->fields['registrationIds'] = $this->registrationIds;
            }
            $this->fields['notification'] = $this->message;
        }
        
        //init notification key's message
        private function initHeaderKeys()
        {
            $this->headers = array
                            (
                                'Authorization: key=' . $this->configs['API_ACCESS_KEY'],
                                'Content-Type: '.$this->configs['CONTENT_TYPE']
                            );
        }
        
        /**
         * send message notification
         * @return json message of result
         */
        private function sendMessage()
        {
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, $this->configs['FIREBASE_SERVER_URL'] );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $this->headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $this->fields ) );
            $result = curl_exec($ch );
            curl_close( $ch );
            return $result;
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