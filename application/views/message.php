<span style="color: #FF0000;">
						
								<h2>PENGUMUMAN</h2>
<br>
<?php
$query = $this->db->get('master');
foreach ($query->result() as $row)
{
	echo $row->Info;
}
?>
<br>
						</span>