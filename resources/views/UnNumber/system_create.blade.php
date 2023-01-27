@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：新規登録画面')

@section('UnNumber.content')
<div class="container">
<h2>採番後の番号</h2><br/>

    @if(session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">

                <div class="d-flex align-items-center">
                    <p class="form-control">{{ $reserve_id }}</p>
                </div>
        
        </div>
    </div>
</div>

@endsection

