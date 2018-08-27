# FNotifyPhp
Php API that facilitates server-side <a href="https://firebase.google.com/docs/cloud-messaging/">Firebase Cloud Messaging</a> notification
For most details on firebase 

This API provides Server side by using HTTP Protocol gives by Firebase (more details <a href="https://firebase.google.com/docs/cloud-messaging/http-server-ref">here</a>)
<h1>How To Use</h1>

1. Edit your firebase acces api in config file
2. Replace API_ACCESS_KEY value with your API Key that given by Firebase
3. Enjoy using class

<h1>Example</h1>
```php
  <?php
    include_once '../lib/FNotifyPhp.php'; //path to FNotifyPhp class
    //initialize config file
    $configs = include('../lib/config/conf.php'); //path to conf file
    $registrationIds = 'Registration ID';
    $title = 'My title';
    $message = 'The Message';
    $fNotifyPhp = new FNotifyPhp($configs);
    $fNotifyPhp->setBody($message);
    $fNotifyPhp->setTo($registrationIds);
    $fNotifyPhp->setTitle($title);
    $result = $fNotifyPhp->notifyRecipient();
    echo $result;
  ```
