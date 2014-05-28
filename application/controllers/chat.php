<?php
class Chat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->view('chat/index');
	}
	
	function send()
	{
		
		$this->load->helper('send');
		
		$GLOBALS['data'] = new SSEData('mysqli',array('host'=>'localhost','user'=>'root','password'=>'l4uri3r','db'=>'arc'));
		$sse = new SSE();

		$sse->addEventListener('user',new LatestUser());
		$sse->addEventListener('',new LatestMessage());
		$sse->start();
	}
	
	function recv()
	{
		require_once(BASEPATH.'/src/libsse.php');

		$data = new SSEData('mysqli',array('host'=>'localhost','user'=>'root','password'=>'l4uri3r','db'=>'arc'));

		if(isset($_POST['user']) && !isset($_POST['message']))
		{
			$data->set('user',json_encode(array('msg'=>htmlentities($_POST['user']),'time'=>time())));
		}
		else if(isset($_POST['message'],$_POST['user'])){
			$data->set('message',json_encode(array('msg'=>htmlentities($_POST['message']),'time'=>time(),'user'=>$_POST['user'])));
		}
	}
}
?>
