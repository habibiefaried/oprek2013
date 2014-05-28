<?php
class Main extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database(); //Load database
		$this->load->model('model'); //Load model
	}
	
	function index()
	{
		//Meload file index.php Situs
		$this->load->view('index');
	}
	
	public function InitialCaptcha()
	{
		//I.S Captcha belum digenerate, Database Captcha boleh kosong boleh isi
		//F.S Captcha sudah digenerate, data Database Captcha bertambah 1
			$vals = array(
				'img_path' => './Captcha/',
				'img_url' => base_url().'./Captcha/',
				'word'   => random_string('numeric', 6) //Captcha menampilkan angka 6 digit secara random
				);

			$cap = create_captcha($vals);

			$data = array(
				'captcha_time' => $cap['time'],
				'ip_address' => $this->input->ip_address(),
				'word' => $cap['word']
				);

			$query = $this->db->insert_string('captcha', $data);
			$this->db->query($query);
			
			return $cap;
	}
	
	function daftar()
	{
		//I.S Sembarang
		//F.S Database terisi apabila ada yang mendaftar dan valid

		// First, delete old captchas
		$expiration = time()-7200; // Two hour limit
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		
		/* Setting Rule untuk Form pendaftaran */
		$this->form_validation->set_rules('NamaLengkap', 'Nama Lengkap', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
		$this->form_validation->set_rules('hape', 'Nomor Handphone', 'required|xss_clean');
		$this->form_validation->set_rules('NIM', 'NIM', 'required|is_unique[member.NIM]');
		$this->form_validation->set_rules('Jurusan', 'Jurusan', 'required|xss_clean');
		$this->form_validation->set_rules('Password', 'Password', 'required|xss_clean');
		$this->form_validation->set_rules('userfile', '', '');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|xss_clean');
		$this->form_validation->set_rules('captcha', 'Captcha', 'required|xss_clean');

		/* End of Setting Rule */
		
		// Then see if a captcha exists:
		if ($this->form_validation->run()) //Validasi, semua form harus diisi
		{
			/*
			//Jika captcha sudah dimasukkan, cari tau apakah captcha sesuai
			// count bernilai 0 apabila tidak ditemukan, bernilai selain 0 apabila ditemukan
			$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
			$binds = array($this->input->post('captcha'), $this->input->ip_address(), $expiration);
			$query = $this->db->query($sql, $binds);
			$row = $query->row();
			*/
			$row->count = 1;
		}
		else
		{
			//Jika input kosong, maka count = 0
			$row->count = 0;
		}
		
		if ($row->count != 0)
		{
			//Jika form sudah valid
			//Lakukan Konfigurasi
			$config['file_name'] = $this->input->post('NIM'); //nama file disesuaikan dengan NIM pengupload
			$config['upload_path'] = './Foto'; //path file tujuan
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //ekstensi file yang diperbolehkan
			$config['max_size']	= '2048'; //Maksimal berukuran 2MB
			$config['overwrite'] = TRUE; //jika file sudah ada, maka akan di-replace
			
			$this->upload->initialize($config); //Initialize fungsi Internal Upload
			$this->load->library('upload', $config);
			
			
			if (!$this->upload->do_upload('userfile')) //Jika tidak berhasil upload
			{
				//Jika tidak berhasil Upload
				echo "Tidak bisa upload Foto karena : ".$this->upload->display_errors();
			}
			else
			{
				//Jika berhasil Upload
				$File = $this->upload->data();				
				$FilePath = base_url().'Foto/'.$File['file_name']; //Penggabungan nama File dengan path
				$this->model->InsertPendaftar($FilePath); 
				//Jika sudah selesai upload file, maka masuk tahap input Data
			}
			
			

		}
		else
		{	
			//Jika form tidak valid atau belum diisi
			$captcha = $this->InitialCaptcha();
			$this->load->view('daftar',$captcha);
		}
	}
	
	function login()
	{
		//I.S User sudah login / belum
		//F.S User yang belum login akan diautentikasi. Apabila berhasil, user akan diredirect
		// ke halaman sesuai dengan statusnya
		$data['error'] = "";
		if ($this->session->userdata('is_logged_in')) //apabila sudah login sebelumnya
		{
			if ($this->session->userdata('Peran') == 1) //1 artinya Kru
			{
				redirect('kru');
			}
			else if ($this->session->userdata('Peran') == 2) //2 artinya Cakru
			{
				redirect('cakru');
			}		
		}
		else //apabila sebelumnya belum login
		{
			if (($this->input->post('NIM')) && ($this->input->post('password')))
			{
				//Jika form sudah diisi
				if ($this->model->IsMemberValid()) //Cek apakah username dan password valid
				{
					//Jika valid maka buat sebuah sesi
					$this->model->MakeSession();
					
					//Lalu, diarahkan ke laman yang "seharusnya", jika dia kru maka pergi ke laman kru
					if ($this->session->userdata('Peran') == 1) //1 artinya Kru
					{
						redirect('kru');
					}
					else if ($this->session->userdata('Peran') == 2) //2 artinya Cakru
					{
						redirect('cakru');
					}
				}
				else
				{
					//Menampilkan pesan kesalahan
					$data['error'] = "Username atau password salah atau belum bayar :p";
					$this->load->view('login',$data);
				}
			}
			else
			{
				//jika form belum diisi
				$this->load->view('login',$data);
			}
		}
	}
	
	function logout()
	{
		//I.S Sembarang
		//F.S Sesi telah dihapus
		$this->session->sess_destroy();
		redirect('');
	}
	
	function LihatPendaftar()
	{
		//I.S Sembarang
		//F.S menampilkan list yang sudah terdaftar, termasuk status sudah/belum bayar
		$this->db->where('Peran',2);
		$this->db->order_by("status", "desc"); 
		$query = $this->db->get('member');
		$data['query'] = $query->result();
		$this->load->view('listpendaftar',$data);
	}

	
	function LupaPass()
	{
		if ( ($this->input->post('NIM')) && ($this->input->post('Email')) )
		{
			$this->db->where('NIM',$this->input->post('NIM'));
			$this->db->where('Email',$this->input->post('Email'));
			$jml = $this->db->count_all_results('member');

			if ($jml == 0)
			{
				echo "NIM dan Email tidak cocok atau tidak ada di database";
			}
			else
			{
				$this->db->where('NIM',$this->input->post('NIM'));
				$this->db->where('Email',$this->input->post('Email'));
				$query = $this->db->get('member');
				$query2 = $query->result();

				foreach ($query2 as $row)
				{
					$password = $row->Password;
					$Kata = $row->id.'Salt'.$row->Nama_Lengkap.$row->Hape.$row->Email.$row->NIM.'B4mb4n6'.$row->Jurusan;
				}			

				//Update Salt
				$this->db->where('NIM',$this->input->post('NIM'));
				$data['Salt'] = md5($Kata);
				$this->db->update('member',$data);
				//Update Salt

				$this->load->library('email');
				$this->email->from('admin-noreply@oprek.arc.itb.ac.id','Administrator Oprek');
				$this->email->to($this->input->post('Email')); //Ke email bersangkutan

				$this->email->subject('Password Web Oprek');

				$link = 'http://oprek.arc.itb.ac.id/index.php/main/ResetPassword/'.$this->input->post('NIM').'/'.$data['Salt'];
				$pesan = 'Silahkan buka Link : '.$link.' Untuk mereset Password anda';
				
				$this->email->message($pesan);
				$this->email->send();

				echo "Email berhasil dikirim ke : ".$this->input->post('Email');
			}
		}
		else
		{
			$this->load->view('LupaPass');
		}
	}
	
	function ResetPassword($NIM,$salt)
	{
			$this->db->where('NIM',$NIM);
			$this->db->where('Salt',$salt);
			$jml = $this->db->count_all_results('member');
			if ($jml == 0)
			{
				echo "Salt tidak Ditemukan";
			}
			else
			{
				$passdefault = 'bambang';
				$this->db->where('NIM',$NIM);
				$data['Password'] = md5($passdefault);
				$this->db->update('member',$data);
				echo "Salt ditemukan dan Password telah direset menjadi : <b>bambang.</b><br>";
				echo "Link ini bersifat sangat amat rahasia, karena anda bisa menggunakan link ini sewaktu2 anda lupa password.<br>";
				echo "Jangan save link ini, setelah anda berhasil reset password, langsung segera hapus history anda.<br>";
				echo "Terima Kasih.";
			}
	}
	
}
?>