<?php

namespace App\Http\Controllers\port;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\models\belief;
class PortController extends Controller
{
    //项目接口
    public function register()
    {	
    	$jsoncallback = $_GET['callback'];
    	// $data = json_encode(['code'=>1]);

    	// echo $jsoncallback."(".$data.")";die;
    	// header("Access-Control-Allow-Origin: *");// 允许任意域名发起的跨域请求
    	$name=request()->input('name');
    	$email=request()->input('email');
    	$pwd=request()->input('pwd');
    	// echo $jsoncallback.$pwd;die;

    	if (!$pwd) {
    	 	$info=json_encode(['code'=>444,'msg'=>'密码为空']);
    		return $jsoncallback."(".$info.")";die;
    	}

    	$password=password_hash($pwd, PASSWORD_DEFAULT);
    	$tname=belief::where('name',$name)->first();
    	if ($tname) {
    		$info=json_encode(['code'=>444,'msg'=>'名称重复']);
    		return $jsoncallback."(".$info.")";die;
    	}

    	$data=[
    		'name'=>$name,
    		'email'=>$email,
    		'pwd'=>$password
    	];

    	$res=belief::create($data);
    	
    	if ($res) {
    		$info=json_encode(['code'=>1,'msg'=>'注册成功跳转登录']);	
    		return $jsoncallback."(".$info.")";die;
    	}else{
    		$info=json_encode(['code'=>444,'msg'=>'注册失败']);
    		return $jsoncallback."(".$info.")";die;
    	}

 
    }
}
