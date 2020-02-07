@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br>

                   
                </div>
                <hr style="height:1px;border:none;border-top:1px solid #555555;" />

                <div class="card-body">
                    <a href="{{url('test/user/addkey')}}">添加公钥</a>&nbsp;<a href="{{url('test/user/eninfo')}}">解密数据</a>
                </div>
                <hr style="height:1px;border:none;border-top:1px solid #555555;" />
                <div class="card-body">
                    <a href="{{url('test/sign/list')}}">在线验签</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
