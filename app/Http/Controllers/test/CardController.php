<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function md5()
    {
       
        $key = "123654";          

        //验签
        $data = $_GET['data'];  //接收到的数据
        $signature = $_GET['signature'];    //发送端的签名

        // 计算签名  
        $s = md5($data.$key);
      
        //与接收到的签名 比对
        if($s == $signature)
        {
            echo "验签通过";
        }else{
            echo "验签失败";
        }


    }
}

