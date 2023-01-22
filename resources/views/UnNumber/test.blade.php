@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：新規登録画面')

@section('UnNumber.content')
<div class="container">
<h1>テスト画面</h1>

    @if(session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('UnNumber.input') }}">
                @csrf

                <div class="d-flex align-items-center">
                    <label for="InitNumber" class="form-label">初期値</label>
                    <input type="text" name="InitNumber" class="form-control" id="InitNumber" value="{{ old('InitNumber') }}">
                </div>

                <div class="d-flex align-items-center">
                    <label for="Symbol" class="form-label">記号</label>
                    <input type="text" name="Symbol" class="form-control" id="Symbol" value="{{ old('Symbol') }}">
                </div>

                <div class="d-flex align-items-center">
                    <label for="Lengs" class="form-label">有効桁数</label>
                    <input type="text" name="Lengs" class="form-control" id="Lengs" value="{{ old('Lengs') }}">
                </div>

                <div class="d-flex align-items-center">
                    <label for="NumberClearDiv" class="form-label">編集区分</label>
                    <input type="text" name="NumberClearDiv" class="form-control" id="NumberClearDiv" value="{{ old('NumberClearDiv') }}">
                </div>

                <div class="mt-5 d-inline-block">
                
                    <button type="submit" class="btn btn-primary ms-4">
                        確 認
                    </button>
                </div>
            </form>
        
        </div>
    </div>
</div>

@endsection

