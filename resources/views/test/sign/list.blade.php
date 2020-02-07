@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>在线验签</title>
</head>
<body>
	<div align="center">
		<div>
			字段一<input type="" name="">
			字段值<input type="" name="">
		</div>
		<div>
			字段二<input type="" name="">
			字段值<input type="" name="">
		</div>
		<div>
			字段三<input type="" name="">
			字段值<input type="" name="">
		</div>
		<div>
			字段四<input type="" name="">
			字段值<input type="" name="">
		</div><br>

		<p>您的base64encode签名</p>
		<textarea  id="text" name="pub" rows="9" cols="55">
			
		</textarea>
		<br>
		<br>
		<button>验证</button>
	</div>	
</body>
</html>

@endsection