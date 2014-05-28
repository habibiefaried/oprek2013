<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Open Recruitment Cakru ARC ITB 2013</title>
	<link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="<?=base_url();?>js/bootstrap.js"></script>
	<link rel="stylesheet" href="<?=base_url();?>template.css" type="text/css" media="screen" title="Recruitment Cakru ARC 2013">

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
			</ul>

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

<h2 style="color:red">
<?php echo validation_errors(); ?>
</h2>

<?php echo form_open_multipart('main/daftar');?>

  <fieldset>
    <legend>Pendaftaran</legend>
	<blink><label><b>Mohon Isi Form Ini dengan sebenar-benarnya, tidak ada pengeditan terhadap data yang anda telah masukkan.</b> </label></blink><br>
    <p style="color: #FF0000;"><b> Perhatian : Kesalahan dalam pengisian data mungkin dapat menyebabkan ketidaklulusan :v </b></p></br>
	<label>Nama Lengkap</label>
    <input type="text" placeholder="Nama Lengkap Anda" name="NamaLengkap">
    <span class="help-block">Contoh Benar : Adi Bambang<br>
    Contoh Salah : Bambang cemungudh eaaa...</span>
    
    <label>Email</label>
    <input type="text" placeholder="Email Student" name="email">
    <span class="help-block">Harap isi dengan Email anda yang <b>sering dibuka</b></span>
	
	<label>Nomor Handphone</label>
    <input type="text" placeholder="Nomor Handphone" name="hape">
    <span class="help-block">Harap isi dengan nomor handphone anda yang <b> aktif </b>.</span>
    
     <label>NIM</label>
    <input type="text" placeholder="NIM anda yang sekarang" name="NIM">
    <span class="help-block"></span>
    
     <label>Jurusan</label>
    <input type="text" placeholder="Jurusan/Fakultas" name="Jurusan">
    <span class="help-block">Jika ada masih TPB, isi Fakultas anda.</span>
    
     <label>Sandi Lewat</label>
    <input type="password" placeholder="Isi Sandi Lewat" name="Password">
    <span class="help-block">Bebas, tetapi usahakan panjangnya 6-8 karakter</span>
    
    <label>Alamat </label>
    <textarea name="alamat" rows="3" placeholder="Isi dengan Alamat (Singkat Saja)"></textarea>
    <span class="help-block">Bagi yang ngekos, isi dengan Alamat kos</span>
	
     <label>Foto </label>
    <span class="btn btn-file">Upload <input type="file" name="userfile"/></span>
    <span class="help-block">Gunakan Foto yang didalamnya hanya terdapat Anda saja (format gif, jpg, png, jpeg).</span>	
	
	<label> Captcha </label>
	<?=$image;?><br>
	<input type="text" placeholder="Captcha" name="captcha">
	<span class="help-block">Masukkan Tulisan yang anda lihat</span>	
    
	<label> Promosi FanPage (Optional) </label>
	<b>
    Ayo, dukung KRU ARC yang sedang ikut lomba pengembangan software prodi dengan cara Like FanPage Kami.<br>
	Klik di : <a href = "http://www.facebook.com/ArsipBundel" style="color:blue"> Arsip Buncit</a><br>
	Terima Kasih 
	</b>
	<span class="help-block"></span>
	
	<input type="hidden" name="Peran" value="2"/>
	<br>
    <button type="submit" class="btn btn-primary">Submit</button>
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
		<div class="textwidget">
			<a href='<?=base_url();?>index.php/main/LihatPendaftar'>Panduan Pendaftaran Oprek</a><br>
			<a href='<?=base_url();?>index.php/main/LihatPendaftar'>Lihat Pendaftar</a><br>
			<a href='<?=base_url();?>index.php/main/daftar'>Daftar Online </a><br>
			<a href='<?=base_url();?>index.php/main/login'>Login Web Oprek</a><br>
			<a href=''>Peraturan Oprek</a><br>
			<a href="">Download surat Izin Oprek ARC 2012</a><br>
		</div>
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

