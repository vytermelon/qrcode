<?php

$queue_array=array();
array_push($queue_array, array("vybhav","URL1"));
array_push($queue_array, array("shetty","URL2"));
$data['result'] = $queue_array;
echo json_encode($data);
exit;

?>