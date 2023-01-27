@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：新規登録画面')

@section('UnNumber.content')
<div class="container">
<h1>ログイン画面</h1>

    @if(session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('UnNumber.system_create') }}">
                @csrf

                <div class="d-flex align-items-center">
                    <label for="SignIn" class="form-label">ユーザー登録</label>
                    <input type="text" name="SignIn" class="form-control" id="SignIn" value="{{ old('SignIn') }}">
                </div>
                <input type="hidden" name="number_id" class="form-control" id="number_id" value="1">
                <div class="mt-5 d-inline-block">
                    <button type="submit" class="btn btn-primary ms-4">
                        予約No
                    </button>
                </div>
            </form>
        
        </div>
    </div>
</div>

@endsection

