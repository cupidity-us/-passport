<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\models\belief;

class TransmitController extends Controller
{	

	public function doreg()
	{	
		
		$name=request()->input('name');
		$email=request()->input('email');
		$pwd=request()->input('pwd');
   		

		$nameinfo=belief::where('name',$name)->first();
		if ($nameinfo) {
			return json_encode(['code'=>1,'msg'=>'名称重复']);die;
		}

		$pwd=password_hash($pwd, PASSWORD_DEFAULT);
		//数据入库
		$data=[
			'name'=>$name,
			'email'=>$email,
			'pwd'=>$pwd,
		];
		$res=belief::create($data);
		if ($res) {
			return json_encode(['code'=>1,'msg'=>'注册成功']);
		}else{
			return json_encode(['code'=>444,'msg'=>'注册失败']);
		}
		
	}




    public function dologin()
    {	
    	// return 22222;
    	$name=request()->input('name');
    	$pwd=request()->input('pwd');

    	$res=belief::where('name',$name)->first();
    	if ($res) {
    		$bool=password_verify($pwd,$res->pwd);
    		if ($bool) {
    			$token=md5(rand(1000,9999).uniqid());
    			// var_dump($res->id);die;
    			Redis::set($res->id,$token,7200);	

    			return json_encode(['code'=>1,'msg'=>"登录成功",'token'=>$token]);
    		}else{
    			return json_encode(['code'=>444,'msg'=>'密码错误']);
    		}
    	}else{
    		return json_encode(['code'=>444,'msg'=>'查无此人']);
    	}
    }

    public function getinfo()
    {
    	$name=request()->input('name');
    	$token=request()->input('token');
    	$res=belief::where('name',$name)->first();
    	$rtoken=Redis::get($res->id);

        if ($rtoken) {
            $num=Redis::get($rtoken);
            if ($num<5) {
                $num=$num+1;
                Redis::set($rtoken,$num);
                return json_encode(['code'=>1,'msg'=>'请求成功','info'=>'明天开战']);
            }else{
                return json_encode(['code'=>444,'msg'=>'请求过量重新登录']);
            }
        }else{
            $num=1;
            Redis::set($rtoken,$num);
        }

    	if (empty($rtoken)) {
    		return json_encode(['code'=>444,'msg'=>'竟然没有token?']);die;
    	}

    	if ($token != $rtoken) {
    		return json_encode(['code'=>444,'msg'=>'token不对重新获取']);die;
    	}

    	
    }


}
