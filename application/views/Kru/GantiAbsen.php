<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Open Recruitment Cakru ARC ITB 2013</title>
	<link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
	
	<script src="<?=base_url();?>js/bootstrap.js"></script>
	<link rel="stylesheet" href="<?=base_url();?>template.css" type="text/css" media="screen" title="Recruitment Cakru ARC 2013">
	<link href="<?=base_url();?>css/jquery.ui.all.css" rel="stylesheet" media="screen">
	<link rel="alternate" type="application/rss+xml" title="Amateur Radio Club ITB RSS Feed" href="http://arc.itb.ac.id/feed/">
	<link rel="pingback" href="http://arc.itb.ac.id/xmlrpc.php">
	
	<link rel="shortcut icon" href="http://oprek.arc.itb.ac.id/icon/favicon.ico" type="image/x-icon">
</head>

<body id="home">

<!-- TOP START -->

<div class="wrap" id="wrap-top">
<div class="spacer">
<div id="top">

	<div id="topleft" class="floatleft">
		<div id="myslidemenu" class="mn5">
			<ul>
				<li><a href="http://arc.itb.ac.id/">Home</a></li>
				<li><a href="http://arc.itb.ac.id/">Web ARC</a></li>
				<li>
					<a href="http://arc.itb.ac.id/tentang-arc/">Tentang ARC</a>
					<ul>
						<li><a href="http://arc.itb.ac.id/tentang-arc/struktur-organisasi/">Struktur Organisasi</a></li>

						<li><a href="http://arc.itb.ac.id/tentang-arc/sejarah-internet-indonesia/">Sejarah Internet Indonesia</a></li>
						<li><a href="http://arc.itb.ac.id/tentang-arc/kegiatan/">Kegiatan</a></li>
					</ul>
				</li>
				<li>
					<a href="http://arc.itb.ac.id/fasilitas-layanan/">Fasilitas/Layanan</a>
					<ul>

						<li><a>ARC Network</a></li>
						<li><a href="http://mail.arc.itb.ac.id/">E-Mail</a></li>
						<li><a href="http://arc.itb.ac.id/fasilitas-layanan/ftp-server-publik/">FTP Server Publik</a></li>
						<li><a href="http://arc.itb.ac.id/fasilitas-layanan/ntp-server/">NTP Server</a></li>
						<li><a href="http://speedtest.arc.itb.ac.id/">Speedtest</a></li>
						<li><a href="http://arc.itb.ac.id/fasilitas-layanan/sunken-court-network/">Sunken Court Network</a></li>

						<li><a>Web Hosting</a></li>
					</ul>
				</li>
				<li>
					<a href="http://arc.itb.ac.id/anggota-arc/">Anggota ARC</a>
					<ul>
                                                <li><a href="http://arc.itb.ac.id/anggota-arc/prestasi/">Prestasi</a></li>

                                                <li><a href="http://arc.itb.ac.id/anggota-arc/alumni/">Alumni</a></li>
                                        </ul>
				</li>
			</ul>
		</div>
	</div>
	<div id="topright" class="floatright">
		<a href="http://arc.itb.ac.id/kontak/">Kontak</a>

	</div>
	
	<div class="clearboth"></div>
</div>
</div>
</div>

<!-- TOP STOP -->

<hr>
<!-- HEADER START -->

<div class="wrap" id="wrap-header">
<div class="spacer">

<div id="header">
	<div id="headerimg" class="floatleft"></div>
	<div id="headertop" class="floatleft">
		<h1><a href="<?=base_url();?>">OPREK CAKRU ARC 2013</a></h1>
	</div>
	
	<div class="clearboth"></div>
</div>
</div>

</div>

<!-- HEADER STOP -->

<hr>


<!-- MAIN START -->

<div class="wrap" id="wrap-main">

<div class="spacer">

<div class="main">

  <div class="floatright contentsidebarright">

<!-- CONTENT COLUMN START -->

	<div class="content floatleft">
			   		<!-- SPLASH START -->

<div id="wrap-splash">
<div id="splashbg">
</div>
</div>
 <div id="spotlight" class="block">
<ul>
			<div class="widgetright">			
			<div class="textwidget">
				<h1 style="text-align: center;">
					<span style="color: #000000;">
						Open Recruitment Kru ARC 2013
					</span>
				</h1>
				<h1 style="text-align: center;">			
					<blink>
						<?=$this->load->view('message');?>
					</blink>
				</h1>
			</div>
		</div></ul>

</div>
<div class="node">
	
<div class="clearboth"></div>

<div class="contentwidget">
<ul>
			
			<li class="widget"></li>

			</ul>
</div>
<!-- Tempat Isi Konten -->
<div id="contentarea">

<form action="<?=base_url();?>index.php/kru/GantiAbsen/" method="POST">

  <fieldset>
   <legend> Edit Absen Aktif</legend>

	<input type="hidden" name="SubmitDeadline" value="TRUE">
	<?php
	foreach ($query as $row)
	{
	?>
	<label style="color:green">Absen yang Aktif : <?=$row->Absen;?></label>
	<?php
	}
	?>
	<label> Pilih Absen </label>
    <select name="absen">
	<option value="hadir1in">Absen Masuk Day-1</option>
	<option value="hadir1out">Absen Keluar Day-1</option>
	<option value="hadir2in">Absen Masuk Day-2</option>
	<option value="hadir2out">Absen Keluar Day-2</option>
	<option value="hadir3in">Absen Masuk Day-3</option>
    <option value="hadir3out">Absen Keluar Day-3</option>
	<option value="hadir4in">Absen Masuk Day-4</option>
	<option value="hadir4out">Absen Keluar Day-4</option>
	<option value="hadir5in">Absen Masuk Day-5</option>
	<option value="hadir5out">Absen Keluar Day-5 </option>
	</select>

    <span class="help-block">Ganti absen yang aktif, jika ingin absen masuk day-1, maka gantilah ke sana</span>
    <button type="Edit" class="btn btn-primary" id="submit">Submit</button>
	
  </fieldset>
</form>

</div>

<!-- Tempat Isi Kontent Stop -->

</div>
	</div>

<!-- CONTENT COLUMN STOP -->

	<hr>

<!-- SIDEBARRIGHT STOP -->

<div class="clearboth"></div>

</div>

<!-- Login Cakru -->

	<div class="sidebarleft floatleft">
		
		<ul><li><div>&nbsp;</div></li>
		<li><h2>Menu</h2></li>
		<li>
		<?=$this->load->view('Kru/link');?>
		</li>
		</ul>
		
</div>
		
<!-- Akhir Login Cakru -->


<div class="clearboth"></div>


</div>
</div>
</div>

<!-- MAIN STOP -->
<hr>

<!-- FOOTER START -->

<div class="wrap" id="wrap-footer">
<div class="spacer">
<!-- #BeginLibraryItem "/Library/footer.lbi" -->
<div id="footer">
<div id="footertop" class="clearboth">
	<div id="footertopcenterleft" class="footercenterleft floatleft">
	    <p id="footertopleft" class="floatleft">

		Copyright © 2012 <a href="http://arc.itb.ac.id/" title="Institut Teknologi Bambang">Amateur Radio Club</a></p>		
	    <div class="clearboth"></div>

	</div>
	<p id="footertopright" class="footerright floatright">
	</p><div class="clearboth"></div>
</div>
<div id="footerbottom" class="clearboth">
	<div class="clearboth"></div>
</div>
<div class="clearboth"></div>
</div><!-- #EndLibraryItem --></div>
</div>

<!-- FOOTER STOP -->

</body></html>

