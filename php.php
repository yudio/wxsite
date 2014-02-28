<?php

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,"http://www.baidu.com");

curl_setopt($ch,CURLOPT_HEADER,1);

curl_exec($ch);

curl_close($ch);

?>