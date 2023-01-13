@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：新規登録画面')

@section('UnNumber.content')
<div class="container">

    @if(session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
         <form method="POST" action="{{ route('UnNumber.confirm') }}" onSubmit="return checkSubmit()">
                @csrf
    
                <!-- <input type="hidden" class="form-control" id="UpdatePerson" value=""> -->
                <div class="d-flex justify-content-xl-between">
                    
                    <div class="col-md-4 d-flex align-items-center">
                        <label for="NumberId" class="form-label align-middle" style="width:200px">テナントコード</label>
                        <input type="text" name="NumberId" class="form-control" id="NumberId" value="{{ old('NumberId') }}">
                    </div>

                    <!-- <div class="">
                        <div class="d-flex align-items-center">
                            <p class="pe-3">テナント会社名</p>
                            <p>テキストテキストテキストテキストテキストテキスト</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="pe-3">テナント施設名</p>
                            <p>テキストテキストテキストテキストテキストテキスト</p>
                        </div>
                    </div> -->
                </div>

                <div class="col-md-6">

                    <div class="d-flex align-items-center mb-2">
                        <label for="NumberDiv" class="form-label" style="width:200px">採番区分</label>
                        <input type="text" name="NumberDiv" class="form-control" id="NumberDiv" value="{{ old('NumberDiv') }}">
                    </div>
    
                    <div class="d-flex align-items-center mb-2">
                        <label for="InitNumber" class="form-label" style="width:200px">初期値</label>
                        <input type="text" name="InitNumber" class="form-control" id="InitNumber" value="{{ old('InitNumber') }}">
                    </div>
    
                    <div class="d-flex align-items-center mb-2">
                        <label for="Symbol" class="form-label" style="width:200px">記号</label>
                        <input type="text" name="Symbol" class="form-control" id="Symbol" value="{{ old('Symbol') }}">
                    </div>
    
                    <div class="d-flex align-items-center mb-2">
                        <label for="Lengs" class="form-label" style="width:200px">有効桁数</label>
                        <input type="text" name="Lengs" class="form-control" id="Lengs" value="{{ old('Lengs') }}">
                    </div>

                    <div class="d-flex align-items-center mb-2">
                        <label for="EditDiv" class="form-label" style="width:200px">編集区分</label>
                        <input type="text" name="EditDiv" class="form-control" id="EditDiv" value="{{ old('EditDiv') }}">
                    </div>

                    <div class="d-flex align-items-center mb-2">
                        <label for="DateDiv" class="form-label" style="width:200px">日付区分</label>
                        <input type="text" name="DateDiv" class="form-control" id="DateDiv" value="{{ old('DateDiv') }}">
                    </div>

                    <div class="d-flex align-items-center mb-2">
                        <label for="NumberClearDiv" class="form-label" style="width:200px">採番クリア区分</label>
                        <input type="text" name="NumberClearDiv" class="form-control" id="NumberClearDiv" value="{{ old('NumberClearDiv') }}">
                    </div>
    
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">確 認</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
