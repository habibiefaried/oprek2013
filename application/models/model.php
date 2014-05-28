<?php
class Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function InsertPendaftar($FilePath)
	{
		// I.S Database boleh kosong/isi, FilePath merupakan Path File yang pasti terdefinisi
		// F.S Database bertambah 1 data dibawah ini
		
		$this->Nama_Lengkap = $this->input->post('NamaLengkap');
		$this->Email = $this->input->post('email');
		$this->NIM = $this->input->post('NIM');
		$this->Jurusan = $this->input->post('Jurusan');
		$this->Password = md5($this->input->post('Password'));
		$this->Alamat = $this->input->post('alamat');
		$this->Peran = $this->input->post('Peran');
		$this->Hape = $this->input->post('hape');
		
		$this->Foto = $FilePath;
		$this->db->insert('member',$this);
		
		$data->NIM = $this->input->post('NIM');
		
		$this->db->insert('kehadiran',$data);
		$this->db->insert('tugas',$data);
		$this->db->insert('skorparsial',$data);
		
		redirect(''); // Ke halaman index arc
	}
	
	function IsMemberValid()
	{
		//I.S Username/NIM dan Password sembarang
		//F.S Mengembalikan nilai true apabila NIM dan Password sesuai
		$this->db->where('NIM',$this->input->post('NIM'));
		$this->db->where('Password',md5($this->input->post('password')));
		$this->db->where('Status',1);
		$ambil = $this->db->get('member');
		
		if ($ambil->num_rows == 1) return true;
		else return false;
	}
	
	function MakeSession()
	{
		//I.S Session Sembarang, NIM pasti terdefinisi dan sudah login
		//F.S Terbentuk Session yang baru
		$query = $this->db->get_where('member',array('NIM'=>$this->input->post('NIM')));
		foreach ($query->result() as $row)
		{
			$newsession = array (
								'id'		=> $row->id,
								'Nama_Lengkap' => $row->Nama_Lengkap,
								'Email' => $row->Email,
								'NIM' 	=> $row->NIM,
								'Jurusan' => $row->Jurusan,
								'Peran' => $row->Peran,
								'Foto' => $row->Foto,
								'Skor' => $row->Skor,
								'Status' => $row->Status,
								'Hape' => $row->Hape,
								'mentor'=> $row->mentor,
								'Alamat'=> $row->Alamat,
								'Divisi'=>$row->divisi,
								'is_logged_in' => TRUE
							);
			
			$this->session->set_userdata($newsession);
		}
	}
}
?>