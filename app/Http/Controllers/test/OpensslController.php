<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OpensslController extends Controller
{
    public function decrypt()
    {
    	//接收数据 
    	//私钥加密后的数据
    	$code=$_GET['code'];
    	//验证规则
    	$data=$_GET['data'];	
    	// dd($data);
    	$en_data=base64_decode($code);
    	// dd($en_data);
    	//引用公钥
    	$path=storage_path('key/pubkey.key');
        $pubkey = openssl_pkey_get_public("file://".$path);
        // dd($pubkey);
    	//公钥解密
    	openssl_public_decrypt($en_data,$de_data,$pubkey);	
    	
    	//判断传递过来的 data 是否与解密后md5的一样
    	$info=json_decode($de_data);

    	// dd($info);
    	$md=md5($info);
    	
    	// dd($info);
    	if ($data == $md) {
    		echo "验证成功";die;
    	}else{
    		echo "验证失败";die;
    	}
    }
}
