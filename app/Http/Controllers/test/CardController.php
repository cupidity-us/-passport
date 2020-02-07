<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function check()
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

    public function checktwo()
    {   

        $key = "123654";     
        //接收数据 和 签名
        $json_data = $_POST['data'];
        $sign = $_POST['sign'];

        //计算签名
        $sign2 = md5($json_data.$key);
       
        // 比较接收到的签名
        if($sign2==$sign){
            echo "验签成功";
        }else{
            echo "验签失败";
        }
    }


}

