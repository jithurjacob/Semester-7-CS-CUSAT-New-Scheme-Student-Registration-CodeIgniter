<?php
$result=array();
if(count($students_data)<=0){

	$result["valid"]="false";
	if(isset($msg))
	$result["msg"]=$msg;
}
else{

	$result["valid"]="true";
	$result["admnno"]=$students_data[0]['admnno'];
    $result["name"]=$students_data[0]['name'];                
}
echo json_encode($result);
?>