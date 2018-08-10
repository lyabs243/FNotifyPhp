<?php
include_once '../lib/FNotifyPhp.php';
//initialize config file
$configs = include('../lib/config/conf.php');
$registrationIds = 'Registration ID';
$title = 'My title';
$message = 'The Message';

$fNotifyPhp = new FNotifyPhp($configs);
$fNotifyPhp->setBody($message);
$fNotifyPhp->setTo($registrationIds);
$fNotifyPhp->setTitle($title);
$result = $fNotifyPhp->notifyRecipient();
echo $result;
