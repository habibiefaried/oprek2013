<?php
require_once(BASEPATH.'/src/libsse.php');
		class LatestUser extends SSEEvent {
			private $cache = 0;
			private $data;
			public function update(){
				return $this->data->msg;
			}
			public function check(){
				$this->data = json_decode($GLOBALS['data']->get('user'));
				if($this->data->time !== $this->cache){
					$this->cache = $this->data->time;
					return true;
				}
				return false;
			}
		};

		class LatestMessage extends SSEEvent {
			private $cache = 0;
			private $data;
			public function update(){
				return json_encode($this->data);
			}
			public function check(){
				$this->data = json_decode($GLOBALS['data']->get('message'));
				if($this->data->time !== $this->cache){
					$this->cache = $this->data->time;
					return true;
				}
				return false;
			}
		};
?>