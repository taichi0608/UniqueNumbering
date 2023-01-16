@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：新規登録画面')

@section('UnNumber.content')
<div class="container">
<h1>登録画面</h1>

    @if(session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
         <form method="POST" action="{{ route('UnNumber.confirm') }}" onSubmit="return checkSubmit()">
                @csrf
                <input type="hidden" name="TenantCode" class="form-control" id="TenantCode" value="会社名A">
                <input type="hidden" name="TenantBranch" class="form-control" id="TenantBranch" value="施設名A">
                <input type="hidden" name="UpdatePerson" class="form-control" id="UpdatePerson" value="後でauthに変更">
                <div class="d-flex justify-content-xl-between">
                
                    <div class="d-flex align-items-center">
                        <label for="NumberId" class="form-label align-middle">テナントコード</label>
                        <input type="text" name="NumberId" class="form-control" id="NumberId" value="11112222">
                    </div>

                </div>

                <div class="col-md-12">

                    <div class="d-flex align-items-center">
                        <label for="NumberDiv" class="form-label">採番区分</label>
                        <input type="text" name="NumberDiv" class="form-control" id="NumberDiv" value="{{ old('NumberDiv') }}">
                        @if (session('t_numberDiv') !== null)
                            <p>{{ session('t_numberDiv') }}</p>
                        @endif
                    </div>
    
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
                        <label for="EditDiv" class="form-label">編集区分</label>
                        <input type="text" name="EditDiv" class="form-control" id="EditDiv" value="{{ old('EditDiv') }}">
                        @if (session('t_edit') !== null)
                            <p>{{ session('t_edit') }}</p>
                        @endif
                   
                    </div>

                    <div class="d-flex align-items-center">
                        <label for="DateDiv" class="form-label">日付区分</label>
                        <input type="text" name="DateDiv" class="form-control" id="DateDiv" value="{{ old('DateDiv') }}">
                        @if (session('t_date') !== null)
                            <p>{{ session('t_date') }}</p>
                        @endif
                    </div>

                    <div class="d-flex align-items-center">
                        <label for="NumberClearDiv" class="form-label">採番クリア区分</label>
                        <input type="text" name="NumberClearDiv" class="form-control" id="NumberClearDiv" value="{{ old('NumberClearDiv') }}">
                        @if (session('t_clear') !== null)
                            <p>{{ session('t_clear') }}</p>
                        @endif
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

