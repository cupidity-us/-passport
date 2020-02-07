@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
	<script src="/js/jquery.js"></script>
	<meta charset="utf-8">
	<title>解密数据</title>
</head>
<body>
	<div align="center">
		<p>请输加密后的数据</p>
		<textarea  id="text" name="info" rows="6" cols="60">
			
		</textarea>
		<p>您的公钥为</p>
		<textarea  id="pub" rows="3" cols="60">
			
		</textarea><br>
		<div><button id="btn">解密</button></div>
		<div><b>↓</b></div>
		<textarea  id="eninfo" rows="6" cols="60">
			
		</textarea>
		<input type="hidden" id="hid" value="{{Auth::user()->name}}">
	</div>
	

</body>
</html>
<script type="text/javascript">
</script>
<script type="text/javascript">

	$(document).ready(function(){ 
   		var name=$('#hid').val();
		
		$.ajax({
		url: '{{url("test/user/getpub")}}',
		data:{name:name} ,
		type: 'post',
		dataType:'json' ,
		success:function(msg){
			if (msg.code==1) {
				$('#pub').val(msg.info);
			}
		}
		});
	}); 

	$('#btn').click(function(){
		//获取密文
		var info = $('#text').val();
		var name=$('#hid').val();
		$.ajax({
			url:"{{url('test/user/endata')}}",
			data:{info:info,name:name},
			type:'post',
			dataType:'json',
			success:function(msg){
				if (msg.code==1) {
					$('#eninfo').val(msg.info);
				}
			}


		});	

		


	});
		
</script>
@endsection