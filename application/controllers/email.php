<?php
class Email extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if ($this->input->post('Asal'))
		{
			$this->load->library('email');

			$this->email->from($this->input->post('Asal'), $this->input->post('Pengirim'));	
			$this->email->to($this->input->post('Tujuan'));
			$this->email->subject($this->input->post('Judul'));
			$this->email->message($this->input->post('Pesan'));

			$this->email->send();

			echo $this->email->print_debugger();
		}
		else
		{
			$this->load->view('email');
		}
	}
}
?>