<?php

require "vb.php";

if ($_SERVER['REQUEST_METHOD']!='POST') 
{
  echo 'This script is not supposed to be viewed in a browser!';
}


$num=$_POST["num"];

$txt=$_POST["msg"];

$error = 1;
foreach($num as $num){
 //if(array_key_exists('num', $_POST)){
    if(preg_match("/^[8801]{4}[5-9]{1}[0-9]{8}$/",$num))
    {
      $error = 0;
    }


	if($error==0){

 
$c="'AT+cmgs=";

$c.="\"";
$c.="+";
$c .= $num;
$c.="\"";
$c .= "'";

$serial = new phpSerial;
$serial->deviceSet("COM9");
$serial->confBaudRate(9600);

$serial->deviceOpen();
$serial->sendMessage("AT+CMGF=1"); 
$serial->sendMessage(chr(13));
$serial->sendMessage($c);
$serial->sendMessage(chr(13));

$serial->sendMessage($txt);
$serial->sendMessage(chr(26));
sleep(6);
$read=$serial->readPort();


$serial->deviceClose();
echo nl2br ("Message is delivered\n");


  }
  
   elseif($error = 1){
	 echo nl2br ("Message is not delivered\n");
	 
 }
}
?>

