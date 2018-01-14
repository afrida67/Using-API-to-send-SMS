<?php

//$url ='http://172.16.1.223/task/command.php'; //'http://localhost/final/caa.php';//
 $url ='http://172.16.0.148//aa/command.php';

$fields = array(
    'num'=>$_POST["num"],
    'msg'=>$_POST["msg"]
 
);

$field = http_build_query($fields);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);


curl_setopt($ch,CURLOPT_POST,count($field));

curl_setopt($ch,CURLOPT_POSTFIELDS,$field);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);

$re = curl_exec($ch);
//echo $re;
	   
		
?>

