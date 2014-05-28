<?php
class Cakru extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('model');
	}

	function IsUserMasukValid()
	{
		//I.S Sembarang
		//F.S mengarahkan user ke halaman utama website apabila belum login atau statusnya cakru
		if (!$this->session->userdata('is_logged_in'))
		{
			return false;
		}
		else if ($this->session->userdata('Peran') != 2) //Jika bukan cakru
		{
			return false;
		}
		else return true;
	}
	
	function index()
	{
		//I.S Sembarang
		//F.S mengarahkan user ke halaman utama website apabila belum login atau statusnya Kru	
		if ($this->IsUserMasukValid())
		{
			$this->load->view('Cakru/index');
		}
		else
		{
			redirect('');
		}
	}
	
	function profil()
	{
		//I.S Sesi telah terdefinisi
		//F.S Menampilkan data pribadi lengkap pada laman
		if ($this->IsUserMasukValid())
		{
			if ($this->input->post('id'))
			{
				$data['Nama_Lengkap'] = $this->input->post('NamaLengkap');
				$data['Jurusan'] = $this->input->post('Jurusan');
				$data['Hape'] = $this->input->post('Hape');
				$data['Alamat'] = $this->input->post('Alamat');
			
				//Konfigurasi untuk Upload
				$config['file_name'] = $this->input->post('NIM'); //nama file disesuaikan dengan NIM pengupload
				$config['upload_path'] = './Foto'; //path file tujuan
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //ekstensi file yang diperbolehkan
				$config['max_size']	= '2048'; //Maksimal berukuran 2MB
				$config['overwrite'] = TRUE; //jika file sudah ada, maka akan di-replace
				
				$this->upload->initialize($config); //Initialize fungsi Internal Upload
				$this->load->library('upload', $config);
				
				
				if (!$this->upload->do_upload()) //Jika tidak berhasil upload
				{
					//Jika tidak berhasil Upload
					//echo "Tidak ada Foto karena : ".$this->upload->display_errors();
					$FilePath = -1;
				}
				else
				{
					//Jika berhasil Upload
					$File = $this->upload->data();				
					$FilePath = base_url().'Foto/'.$File['file_name']; //Penggabungan nama File dengan path 
					//Jika sudah selesai upload file, maka masuk tahap input Data
					$data['Foto'] = $FilePath; //array data diisi
				}
				//End of konfigurasi
				
				if ($this->input->post('password'))
				{
					$data['password'] = md5($this->input->post('password'));
				}

				$this->db->where('id',$this->input->post('id'));
				$this->db->update('member',$data);
			
				$newsession = array
								(
								'Nama_Lengkap' => $this->input->post('NamaLengkap'),
								'Jurusan'	   => $this->input->post('Jurusan'),
								'Hape'		   => $this->input->post('Hape'),
								'Alamat'	   => $this->input->post('Alamat'),
								'Email'		   => $this->input->post('Email')
								);
				
				if ($FilePath != -1)
				{
					$newsession['Foto'] = $FilePath;
				}
				
				$this->session->set_userdata($newsession);
				$this->load->view('Cakru/Profil');
			}
			else
			{
				$this->load->view('Cakru/Profil');
			}
		}
		else
		{
			redirect('');
		}
	}
	
	function TemanSatuMentor()
	{
		//I.S Database Terdefinisi
		//F.S Menampilkan teman se-mentor
		if ($this->IsUserMasukValid())
		{
			$this->db->where('Peran',2); //cari yang cakru
			$this->db->where('mentor',$this->session->userdata('mentor')); //cari yang mentornya sama
			$query = $this->db->get('member'); //pilih dari tabel member
			$data['query'] = $query->result();
			
			//Menampilkan laman dengan parameter "database"
			$this->load->view('Cakru/TemanSatuMentor',$data);
		}
		else
		{
			redirect('');
		}
	}
	
	function KepoTeman()
	{
		//I.S Database Terdefinisi
		//F.S mencari dan menampilkan data pengguna lain jika ada
		if ($this->IsUserMasukValid())
		{	
			$this->load->view('Cakru/KepoTeman');
		}
		else
		{
			redirect('');
		}
	}
	
	function SearchTeman()
	{
		//I.S Database terdefinisi
		//F.S mengembalikan data jika ditemukan, jika tidak akan mengembalikan nilai 0
		if(isset($_GET['q']))
		{			
			$param = mysql_escape_string($_GET['q']); 
				
			$query = mysql_query("SELECT * FROM member WHERE NIM LIKE '$param%'") or die(mysql_error());		
			if(mysql_num_rows($query) > 0){
				$data = array(); # siapkan variable untuk menampung keseluruhan data
				while($row = mysql_fetch_object($query)){
					$data[] = $row; # input data ke variable array satu per satu baris hasil query
				}
					/*
					 * Variable yang mengandung keseluruhan data dari query lalu di konversi
					 * ke JSON dengan fungsi dari PHP5 "json_encode". Hasil keluaran ini akan 
					 * diterima dan di proses oleh Ajax di plugin autocomplete pada file "index.html"
					 * */
					die(json_encode($data)); 
				}
		}
	}
	
	function UploaderTugas()
	{
		//I.S Database Terdefinisi
		//F.S membuat laman untuk mengupload file
		if ($this->IsUserMasukValid())
		{	
			$this->db->where('NIM',$this->session->userdata('NIM'));
			$query = $this->db->get('tugas');
			$data['query'] = $query->result();
			
			$this->db->where('NIM',$this->session->userdata('NIM'));
			$query2 = $this->db->get('kehadiran');
			$data['query2'] = $query2->result();
			
			$this->db->where('NIM',$this->session->userdata('NIM'));
			$query3 = $this->db->get('skorparsial');
			$data['query3'] = $query3->result();	
			
			$this->db->where('id',1);
			$query4 = $this->db->get('master');	
			$data['query4'] = $query4->result();
			
			$this->load->view('Cakru/UploaderTugas',$data);
		}
		else
		{
			redirect('');
		}
	}
	
	function IsNowDeadline($param)
	{
		//I.S Deadline tugas1-5 terdefinisi
		//F.S Mengembalikan nilai true apabila tanggal telah melewati tanggal deadline untuk tugas tersebut
		
		/* Inisialisasi tanggal */
		
		$this->db->where('id',1);
		$query = $this->db->get('master');
	    
		foreach ($query->result() as $row)
		{
			$Deadline1 = $row->Deadline1;
			$Deadline2 = $row->Deadline2;
			$Deadline3 = $row->Deadline3;
			$Deadline4 = $row->Deadline4;
			$Deadline5 = $row->Deadline5;
			$Deadline6 = $row->Deadline6;
			$Deadline7 = $row->Deadline7;
			$Deadline8 = $row->Deadline8;
			$Deadline9 = $row->Deadline9;
			$Deadline10 = $row->Deadline10;
		}
		
		$sekarang = date("Y-m-d");
		
		/* Jika mau upload tugas 1*/
		if ($param == "Tugas1")
		{
			if ($sekarang <= $Deadline1) return false;
			else return true;
		}
		else if ($param == "Tugas2") //dan seterusnya
		{
			if ($sekarang <= $Deadline2) return false;
			else return true;
		}
		else if ($param == "Tugas3")
		{
			if ($sekarang <= $Deadline3) return false;
			else return true;
		}
		else if ($param == "Tugas4")
		{
			if ($sekarang <= $Deadline4) return false;
			else return true;
		}
		else if ($param == "Tugas5")
		{
			if ($sekarang <= $Deadline5) return false;
			else return true;
		}
		
		else if ($param == "Tugas6")
		{
			if ($sekarang <= $Deadline6) return false;
			else return true;
		}
		
		else if ($param == "Tugas6")
		{
			if ($sekarang <= $Deadline6) return false;
			else return true;
		}
		
		else if ($param == "Tugas7")
		{
			if ($sekarang <= $Deadline7) return false;
			else return true;
		}

		else if ($param == "Tugas8")
		{
			if ($sekarang <= $Deadline8) return false;
			else return true;
		}
		
		else if ($param == "Tugas9")
		{
			if ($sekarang <= $Deadline9) return false;
			else return true;
		}
		
		else if ($param == "Tugas10")
		{
			if ($sekarang <= $Deadline10) return false;
			else return true;
		}
	}
	
	
	function Upload()
	{
		//I.S Database terdefinisi
		//F.S File sudah terupload ke folder yang benar dan memasukkan linknya kedalam database
		if ($this->IsUserMasukValid())
		{		
			if (!$this->IsNowDeadline($this->input->post('Tujuan'))) //jika belum melewati deadline
			{
				
				// Initial config untuk upload
				$config['file_name'] = $this->session->userdata('NIM').$this->input->post('Tujuan');
				$config['upload_path'] = './Tug4s4RCB4MB4NGS3K4L1';
				$config['max_size'] = '8192';
				$config['overwrite'] = TRUE;
				$config['allowed_types'] = 'zip';
				
				$this->upload->initialize($config); //Initialize fungsi Internal Upload
				
				$this->load->library('upload', $config);
				

				if (!$this->upload->do_upload()) //Jika tidak berhasil upload
				{
					//Jika tidak berhasil Upload
					echo "Tidak bisa upload karena : ".$this->upload->display_errors();
					?>
					<a href = "<?=base_url();?>index.php/cakru/UploaderTugas"> Klik </a> untuk kembali.</a>
					<?php
				}
				else
				{
					//Jika berhasil Upload
					$File = $this->upload->data();				
					$FilePath = base_url().'Tug4s4RCB4MB4NGS3K4L1/'.$File['file_name']; //Penggabungan nama File dengan path
					
					//Jika sudah berhasil ke upload
					$data[$this->input->post("Tujuan")] = $FilePath;
					$this->db->where('NIM',$this->session->userdata('NIM'));
					$this->db->update('tugas',$data);
					redirect('cakru/UploaderTugas');
				}
			}
			else
			{
				echo "Upload sudah ditutup karena melewati deadline<br>";
				?>
				<a href = "http://oprek.arc.itb.ac.id/index.php/cakru/UploaderTugas"> Klik </a> untuk kembali.</a>
				<?php
			}
		}
		else
		{
			redirect('');
		}
	}
	
	function PilihDivisi()
	{
		//I.S Database terdefinisi
		//F.S Divisi akan ter-update apabila cakru mengganti divisinya
		if ($this->IsUserMasukValid())
		{
			if ($this->input->post('Divisi'))
			{
				$data['divisi'] = $this->input->post('Divisi');
				$data2['Divisi'] = $this->input->post('Divisi');
				$this->db->where('NIM',$this->session->userdata('NIM'));
				
				// Proses update data pada database dan sesi
				$this->db->update('member',$data);
				$this->session->set_userdata($data2);
				
				// Jika proses selesai, maka cakru akan diarahkan ke laman "pilihdivisi"
				redirect('cakru/PilihDivisi');
			}
			else
			{
				$this->load->view('Cakru/PilihDivisi');
			}
		}
		else
		{
			redirect('');
		}
	}
	public function jam()
	{
		//I.S Sembarang
		//F.S Menampilkan jam dari server PHP
		date_default_timezone_set("Asia/Jakarta");
		$jam = date("D F Y H:i:s");
		echo "$jam WIB";
	}
	
	function LihatTugas()
	{
		if ($this->IsUserMasukValid())
		{
			$this->db->where('Nama_Lengkap',$this->session->userdata('mentor'));
			$query = $this->db->get('member');
			$data['query'] = $query->result();		
			$this->load->view('Cakru/LihatTugas',$data);
		}
		else
		{
			redirect('');
		}
	}
	
	function kontak()
	{
		if ($this->IsUserMasukValid())
		{		
			$this->load->view('Cakru/kontak');
		}
	}

	function KontakKru()
	{
		if ($this->IsUserMasukValid())
		{	
			$this->db->where('Peran',1);
			$query = $this->db->get('member');
			$data['query'] = $query->result();
			$this->load->view('Cakru/KontakKru',$data);
		}
		else
		{
			redirect('');
		}
	}	
}
?>