<html>
<head>
<title>Email Anonym</title>
</head>
<body>
<h2> Email Anonym </h2><br>
<form action="<?=base_url();?>index.php/email" method="POST">
Email Asal : <input type="text" name="Asal"><br>
Nama Pengirim : <input type="text" name="Pengirim"><br>
Email Tujuan : <input type="text" name="Tujuan"><br>
Judul : <input type="text" name="Judul"><br>
ISI : <textarea name="Pesan"></textarea><br>
<input type="submit" name="submit" value="Kirim">
</form>
</body>
</html>