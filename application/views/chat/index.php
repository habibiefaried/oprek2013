<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>ARC Chat System-Beta</title>
	<meta charset="utf-8" />
	<link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="<?=base_url();?>template.css" type="text/css" media="screen" title="Recruitment Cakru ARC 2013">
	<link href="<?=base_url();?>css/bootstrap-responsive.css" type="text/css" rel="stylesheet" media="screen"/>
	<style>
	blockquote {
		margin-bottom: 2px;
	}
	</style>
	<script src="<?=base_url();?>js/jquery-1.8.3.js"></script>
	<script>
	$(function()
	{
		var data = new EventSource('<?=base_url();?>index.php/chat/send');
		$('#start').click(function(){
			$.ajax({
				url:'<?=base_url();?>index.php/chat/recv',
				type:'POST',
				data:{
					user: $('#user').val()
				},
				success:function(){
					$('#welcome').fadeOut(500);
					$('#chat').fadeIn(500);
				}
			});
		});
		$('#msg').keypress(function(e)
		{
			if (e.keyCode == 13 && this.value)
			{
				$.ajax({
					url:'<?=base_url();?>index.php/chat/recv',
					type:'POST',
					data:{
						message: $('#msg').val(),
						user: $('#user').val()
					},
					success:$.noop
				});
				$(this).val('');
			}
			
		});
		data.addEventListener('user',function(e)
		{
			$('#latest').html('User <b>'+e.data+'</b> Joined this room by now');
		},false);
		data.addEventListener('message',function(e)
		{
			var data = $.parseJSON(e.data);
			$('#lines').prepend($('<blockquote>',{text:data.msg}).append($('<small>',{text:'By '+data.user})));
			$('#current').html('Welcome <b>'+data.user+'</b>!');
		},false);
	});
	</script>
</head>
<body>
	<div class="container">
		<div id="welcome">
			<h1>Welcome to the ARC chat system (beta version)</h1>
			<p>Masukkan nama Anda:</p>
			<input type="text" id="user" placeholder=""/>
			<button id="start" class="btn">Proceed</button>
		</div>
		<div id="chat" style="display: none;">
			<h1>Chat Room</h1>	
			<div id="lines" class="well"></div>
			Masukkan pesan anda disini lalu tekan enter :
			<input class="input-block-level" id="msg" type="text">
			Pesan dari Server : 
			<div class="well" id="latest"></div>
			<div class="well" id="current"></div>
		</div>
	</div>
</body>
</html>