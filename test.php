<?php
$arr = array();
$arr['act_url'] = "HTTP";
$arr['act_date'] =  time();
$arr['act_data'] = "DATATATATATATATATD";
$arr['act_reply'] = "REPLY";
echo $arr."[URL:".$_SERVER[QUERY_STRING]."]";

?>