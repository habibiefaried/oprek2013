<?php
class Kru extends CI_Controller
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
		else if ($this->session->userdata('Peran') != 1)
		{
			return false;
		}
		else return true;
	}
	
	function index()
	{
		//Membuka halaman Index Kru
		if ($this->IsUserMasukValid())
		{
			$this->load->view('Kru/index');
		}
		else
		{
			redirect('');
		}
	}

	/* Kepo Start */
	function KepoTeman()
	{
		//I.S Database Terdefinisi
		//F.S mencari dan menampilkan data pengguna lain jika ada
		if ($this->IsUserMasukValid())
		{	
			$this->load->view('Kru/KepoTeman');
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
	/* End of Kepo*/	
	
	function CakruMentor()
	{
		//I.S Database sembarang
		//F.S Menampilkan list cakru dari mentor tersebut
		if ($this->IsUserMasukValid())
		{
			$this->db->where('Peran',2);
			$this->db->where('mentor',$this->session->userdata('Nama_Lengkap')); //Sesi kru arc
			$this->db->order_by('Skor','desc');
			
			$query = $this->db->get('member');
			$data['query'] = $query->result();			
			
			$this->load->view('Kru/CakruAnda',$data);
		}
		else
		{
			redirect('');
		}
	}
	
	function ListTugas()
	{
		//I.S Database Terdefinisi
		//F.S Menampilkan Link download Tugas Cakru sesuai dengan mentornya
		if ($this->IsUserMasukValid())
		{
			//Selektor Data-data dari database
			$this->db->where('mentor',$this->session->userdata('Nama_Lengkap'));
			$query = $this->db->get('tugas');
			$data['query'] = $query->result();
			
			//Data tersebut menjadi "parameter" dalam pemanggilan laman ListTugas
			$this->load->view('Kru/ListTugas',$data);
		}
		else
		{
			redirect('');
		}
	}
	

	function _Regrade($NIM)
	{
			$this->db->where('NIM',$NIM);
			$query = $this->db->get('kehadiran');
			$query = $query->result();
			$Skor = 0;
			foreach ($query as $row)
			{
				$Skor = $Skor + ($row->hadir1in * 5) + ($row->hadir2in * 5) + ($row->hadir3in * 5) + ($row->hadir4in * 5) + ($row->hadir5in * 5);
				$Skor = $Skor + ($row->hadir1out * 5) + ($row->hadir2out * 5) + ($row->hadir3out * 5) + ($row->hadir4out * 5) + ($row->hadir5out * 5);
			}
			
			$this->db->where('NIM',$NIM);
			$query2 = $this->db->get('skorparsial');
			$query2 = $query2->result();
			foreach ($query2 as $row)
			{
				$Skor = $Skor + ($row->skor1) + ($row->skor2) + ($row->skor3) + ($row->skor4) + ($row->skor5);
				$Skor = $Skor + ($row->skor6) + ($row->skor7) + ($row->skor8) + ($row->skor9) + ($row->skor10);
			}
			
			$this->db->where('NIM',$NIM);
			$this->session->set_userdata('Skor',$Skor);
			$data['Skor'] = $Skor;
			$this->db->update('member',$data);
	}

	function PenilaianTugas()
	{
		//I.S Database Terdefinisi
		//F.S Memasukkan nilai tugas cakru kedalam database
		if ($this->IsUSerMasukValid())
		{
			if ($this->input->post('NIM'))
			{	
				if ($this->input->post('Skor1'))
					$data['Skor1'] = $this->input->post('Skor1');
				
				if ($this->input->post('Skor2'))
					$data['Skor2'] = $this->input->post('Skor2');
				
				if ($this->input->post('Skor3'))
					$data['Skor3'] = $this->input->post('Skor3');
				
				if ($this->input->post('Skor4'))
					$data['Skor4'] = $this->input->post('Skor4');
				
				if ($this->input->post('Skor5'))
					$data['Skor5'] = $this->input->post('Skor5');
				
				if ($this->input->post('Skor6'))
					$data['Skor6'] = $this->input->post('Skor6');
					
				if ($this->input->post('Skor7'))
					$data['Skor7'] = $this->input->post('Skor7');
				
				if ($this->input->post('Skor8'))
					$data['Skor8'] = $this->input->post('Skor8');
					
				if ($this->input->post('Skor9'))
					$data['Skor9'] = $this->input->post('Skor9');
					
				if ($this->input->post('Skor10'))
					$data['Skor10'] = $this->input->post('Skor10');
				
				$this->db->where('NIM',$this->input->post('NIM')); //Selektor NIM
				$this->db->update('skorparsial',$data); //Update database
				
				$this->_Regrade($this->input->post('NIM'));
				
				redirect('kru/PenilaianTugas');
			
			}
			else
			{
				//Selektor Data
				
				$this->db->where('mentor',$this->session->userdata('Nama_Lengkap'));
				$query = $this->db->get('skorparsial'); //dari tabel skorparsial
				$data['query'] = $query->result();
				
				//Memanggil laman dengan parameter data yang sudah diseleksi diatas
				$this->load->view('Kru/PenilaianTugas',$data);
			}
		}
		else
		{
			redirect('');
		}
	}
	
	function profil()
	{
		if ($this->IsUserMasukValid())
		{
			if ($this->input->post('id'))
			{
				
				$data['Nama_Lengkap'] = $this->input->post('NamaLengkap');
				$data['Jurusan'] = $this->input->post('Jurusan');
				$data['Hape'] = $this->input->post('Hape');
				$data['Alamat'] = $this->input->post('Alamat');
				$data['Email'] = $this->input->post('Email');

				if ($this->input->post('password')) //Jika user mengganti passwordnya
				{
					$data['Password'] = md5($this->input->post('password'));
				}
				
				$this->db->where('id',$this->input->post('id'));
				$this->db->update('member',$data);
				
				$newsession = array
								(
								'Nama_Lengkap' => $this->input->post('NamaLengkap'),
								'Jurusan'	   => $this->input->post('Jurusan'),
								'Hape'		   => $this->input->post('Hape'),
								'Alamat'	   => $this->input->post('Alamat'),
								'Email'	   => $this->input->post('Email')
								);

				$this->session->set_userdata($newsession);
				$this->load->view('Kru/Profil');
			}
			else
			{
				$this->load->view('Kru/Profil');
			}
		}
		else
		{
			redirect('');
		}
	}
	
	function ListAbsen()
	{
		if ($this->IsUserMasukValid())
		{
			$this->db->where('mentor',$this->session->userdata('Nama_Lengkap'));
			$query = $this->db->get('kehadiran');
			$data['query'] = $query->result();
			$this->load->view('Kru/ListAbsen',$data);
		}
		else
		{
			redirect('');
		}
	}
	
	/*
	========================================================================================================
	Mulai dari kesini sampai selesai adalah untuk admin
	========================================================================================================
	*/
	
	function BuatTugas()
	{
		if ($this->_IsAdminLogin())
		{
			if ($this->input->post('Soal'))
			{
				$data['Soal'] = "<legend>".$this->input->post('tugaske')."</legend>".$this->input->post('Soal');
				$data['SoalPasswd'] = $this->input->post('SoalPasswd');
				$this->db->update('member',$data);
				redirect('kru/AdminHome');
			}
			else
			{
				$this->db->where('NIM',$this->session->userdata('NIM'));
				$query = $this->db->get('member');
				$data['query'] = $query->result();
				$this->load->view('Admin/BuatTugas',$data);
			}
		}
		else
		{
			redirect('');
		}
	}
	
	function AdminLogin()
	{
		if ($this->IsUserMasukValid())
		{
			if (($this->input->post('password') == "iseng") && ($this->input->post('username') == "isenk"))
			{
				$newdata['IsAdmin'] = 1;
				$this->session->set_userdata($newdata);
				redirect('kru/AdminHome');
			}
			else
			{
				$this->load->view('Admin/AdminLogin.php');
			}
		}
		else
		{
			redirect('');
		}
	}
	
	function _IsAdminLogin()
	{
		if ($this->session->userdata('IsAdmin') == 1)
			return true;
		else
			return false;
	}
	
	function AdminHome()
	{
		if ($this->_IsAdminLogin())
		{
			$this->load->view('Admin/AdminHome');
		}
		else
		{
			redirect('kru/AdminLogin');
		}
	}
	
		/* Untuk melakukan aktivasi */
	function aktivasi()
	{
		//I.S Sembarang
		//F.S NIM yang bersangkutan sudah aktif dan bisa melakukan login
		if ($this->_IsAdminLogin())
		{
			if ($this->input->post('NIM'))
			{
				$query = $this->db->get_where('kehadiran', array('NIM' => $this->input->post('NIM')));
				if ($query->num_rows == 0) //validasi apabila user "bandel" menggunakan form dari luar
				{
					$data2['pesan'] = "<p style='color:red'>".$this->input->post('NIM')." tidak ada dalam database</p>";
					
					$this->db->where('id',1);
					$query = $this->db->get('master');	
					$data2['query'] = $query->result();
					
					$this->load->view('Admin/Aktivasi',$data2);
				}
				else
				{
					//Proses update data
					$data[$this->input->post('Tujuan')] = 1;
					$this->db->where('NIM',$this->input->post('NIM'));
					$this->db->update('kehadiran',$data);
					
					$this->db->where('id',1);
					$query = $this->db->get('master');	
					$data2['query'] = $query->result();					
					
					$data2['pesan'] = "<p style='color:green'>".$this->input->post('NIM')." sudah absen</p>";
					$this->load->view('Admin/Aktivasi',$data2);
				}
			}
			else
			{
				$this->db->where('id',1);
				$query = $this->db->get('master');	
				$data2['query'] = $query->result();			
				
				$data2['pesan'] = "";
				$this->load->view('Admin/Aktivasi',$data2);
			}
		}
		else
		{
			redirect('kru/AdminLogin');
		}
	}
	
	function SearchCakru()
	{
		if(isset($_GET['q']))
		{
			$param = mysql_escape_string($_GET['q']); 
			
			
			# lakukan pencarian, tampilkan nama pegawai yang berawalan nilai parameter "q"
			$query = mysql_query("SELECT * FROM member WHERE NIM LIKE '%$param%' AND Peran = '2'");		
			
			if(mysql_num_rows($query) > 0)
			{
				$data = array(); # siapkan variable untuk menampung keseluruhan data
				while($row = mysql_fetch_object($query))
				{
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

	function GantiAbsen()
	{
		if ($this->_IsAdminLogin())
		{
			if ($this->input->post('absen'))
			{
				$data['Absen'] = $this->input->post('absen');
				$this->db->where('id',1); //Selektor NIM
				$this->db->update('master',$data); //Update database
				
				$this->db->where('id',1);
				$query = $this->db->get('master');	
				$data['query'] = $query->result();
				
				$this->load->view('Admin/GantiAbsen',$data);
			}
			else
			{
				$this->db->where('id',1);
				$query = $this->db->get('master');	
				$data['query'] = $query->result();
				
				$this->load->view('Admin/GantiAbsen',$data);
			}
		}
		else
		{
			redirect('kru/AdminLogin');
		}
	
	}
	
	function EditDeadline()
	{
		if ($this->_IsAdminLogin())
		{	
			if ($this->input->post('SubmitDeadline'))
			{
				$data[$this->input->post('Tugas')] = $this->input->post('Tanggal');
				$this->db->where('id',1); //Selektor NIM
				$this->db->update('master',$data); //Update database
				
				$this->db->where('id',1);
				$query = $this->db->get('master');	
				$data['query'] = $query->result();
				$data['pesan'] = "<p style='color:green'>Deadline Tugas berhasil diganti</p>";
				$this->load->view('Admin/EditDeadlineTugas',$data);
			}
			else
			{
				$this->db->where('id',1);
				$query = $this->db->get('master');	
				$data['query'] = $query->result();
				$data['pesan'] = "<p>Silahkan edit deadline tugas, jangan dicurangin yaa :v</p>";
				$this->load->view('Admin/EditDeadlineTugas',$data);
			}
		}
		else
		{
			redirect('kru/AdminLogin');
		}
	}
	
/* Set Cakru*/
	function SetCakru()
	{
		//I.S Sembarang, user merupakan Kru yang valid
		//F.S menampilkan list of cakru beserta mentornya
		if ($this->_IsAdminLogin())
		{
			$this->db->order_by("status", "desc");
			$this->db->where('Peran',2);
			$query = $this->db->get('member');
			$data['query'] = $query->result();
			$this->load->view('Admin/SetCakru',$data);
		}
		else
		{
			redirect('kru/AdminLogin');
		}
	}
	
	
	function EditMentor($NIM,$Status)
	{
		//I.S Mentor dan status bayar terdefinisi
		//F.S Mentor dan status bayar akan diganti apabila berbeda dengan yang ada di database
		if ($this->_IsAdminLogin())
		{
			if ($this->input->post('IsSubmit')) //Apabila hidden form submit masuk ke fungsi ini
			{
				//Koleksi data
				$data['Status'] = $this->input->post('status');
				$data['mentor'] = $this->input->post('mentor');
				
				$this->db->where('NIM',$NIM);
				$this->db->update('member',$data);
				
				$data2['mentor'] = $this->input->post('mentor');
				
				/* Memasukkan data kedalam 3 database : skorparsial, tugas, kehadiran */
				$this->db->where('NIM',$NIM);
				$this->db->update('skorparsial',$data2);
				
				$this->db->where('NIM',$NIM);
				$this->db->update('tugas',$data2);
				
				$this->db->where('NIM',$NIM);
				$this->db->update('kehadiran',$data2);
				
				//Jika sudah selesai, maka redirect ke laman setcakru
				redirect('kru/SetCakru');
			}
			else
			{
				$this->db->where('Peran',2);
				$this->db->where('NIM',$NIM);
				$query = $this->db->get('member');
				$data['query'] = $query->result();
				$data['Status'] = $Status;
				$this->load->view("Admin/FormEditData",$data);
			}
		}
		else
		{
			redirect('kru/AdminLogin');
		}
	}
	
	function SearchMentor()
	{
		if(isset($_GET['q']))
		{
			$param = mysql_escape_string($_GET['q']); 
			
			
			# lakukan pencarian, tampilkan nama pegawai yang berawalan nilai parameter "q"
			$query = mysql_query("SELECT * FROM member WHERE Nama_Lengkap LIKE '%$param%' AND Peran = '1'");		
			
			if(mysql_num_rows($query) > 0)
			{
				$data = array(); # siapkan variable untuk menampung keseluruhan data
				while($row = mysql_fetch_object($query))
				{
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
	
	/* Fungsi Tambahan untuk Delete Member */
	function DeleteMember()
	{		
		if ($this->_IsAdminLogin())
		{
			$query = $this->db->get('member');
			$data['query'] = $query->result();
			$this->load->view('Admin/DeleteMember',$data);
		}
		else
		{
			redirect('');
		}
	}
	
	function Delete($NIM)
	{
		if ($this->_IsAdminLogin())
		{
			$tables = array('kehadiran', 'member', 'skorparsial','tugas');
			$this->db->where('NIM', $NIM);
			$this->db->delete($tables);
			redirect('kru/DeleteMember');
		}
		else
		{
			redirect('');
		}
	}

	function GradeAll()
	{
		/*
		if ($this->_IsAdminLogin())
		{
			$this->db->where('Peran',2);
			$this->db->where('Status',1);
			$query = $this->db->get('member');
			$query = $query->result();
			foreach ($query as $row)
			{
				$this->_Regrade($row->NIM);
			}
			echo "Semua nilai sudah di regrade";
		}
		else
		{
			echo "Anda tidak punya akses disini";
		}
		*/
		echo "Sedang dibuat :p";
	}
			
	function ListKru()
	{
		if ($this->_IsAdminLogin())
		{		
			$this->db->where('Peran',1);
			$query = $this->db->get('member');
			$data['query'] = $query->result();
			$this->load->view('Admin/ListKru',$data);
		}
		else
		{
			redirect('');
		}
	}

	function EditInfo()
	{
		if ($this->_IsAdminLogin())
		{
			if ($this->input->post('Info'))
			{
				$data['Info'] = $this->input->post('Info');
				$this->db->where('id',1); //Selektor NIM
				$this->db->update('master',$data);
				$this->load->view('Admin/EditInfo');
			}
			else
			{
				$this->load->view('Admin/EditInfo');
			}
		}
		else
		{
			redirect('');
		}
	}
		
	function ScoreBoard()
	{
		if ($this->_IsAdminLogin())
		{
			$this->db->where('Peran',2);
			$this->db->order_by('Skor', 'desc');
			$query = $this->db->get('member');
			
			$data['query'] = $query->result();
			$this->load->view('Admin/Scoreboard',$data);
		}
		else
		{
			redirect('');
		}
	}
	/* End Of Fungsi Tambahan */

	function LogoutAdmin()
	{
		$newdata['IsAdmin'] = 0;
		$this->session->set_userdata($newdata);
		redirect('kru');
	}
	
	/* End of Set Cakru */
	
}
?>