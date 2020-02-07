@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
	<script src="/js/jquery.js"></script>
	<meta charset="utf-8">
	<title>添加公钥</title>
</head>
<body>

	<div align="center">
		<p>请添加用户公钥</p>
		<textarea  id="text" name="pub" rows="20" cols="70">
			
		</textarea>
		<div><button id="btn">提交</button></div>
		<input type="hidden" id="hid" value="{{ Auth::user()->name }}">
	</div>

</body>
</html>
<script type="text/javascript">
	$('#btn').click(function(){
		var pub = $('#text').val();
		//获取姓名
		var name=$('#hid').val();
		$.ajax({
			url:"{{url('test/user/dokey')}}",
			data:{pub:pub,name:name},
			type:'post',
			dataType:'json',
			success:function(msg){
				if (msg.code==444) {
					alert(msg.res);
				}

				if (msg.code==1) {
					alert(msg.res);
					location.href="{{url('')}}";
				}
			}



		});

	});


</script>
@endsection