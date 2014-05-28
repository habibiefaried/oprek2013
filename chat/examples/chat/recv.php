<?php
require_once('../../src/libsse.php');

$data = new SSEData('mysqli',array('host'=>'localhost','user'=>'root','password'=>'l4uri3r','db'=>'arc'));

if(isset($_POST['user']) && !isset($_POST['message']))
{
	$data->set('user',json_encode(array('msg'=>htmlentities($_POST['user']),'time'=>time())));
}
else if(isset($_POST['message'],$_POST['user'])){
	$data->set('message',json_encode(array('msg'=>htmlentities($_POST['message']),'time'=>time(),'user'=>$_POST['user'])));
}