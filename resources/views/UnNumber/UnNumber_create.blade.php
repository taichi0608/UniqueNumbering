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

            

                    <div class="d-flex align-items-center">
                        <label for="NumberDiv" class="form-label">採番区分</label>
                        <input type="text" name="NumberDiv" class="form-control" id="NumberDiv" value="{{ old('NumberDiv') }}">
                        @if ($errors->has('NumberDiv')) 
                        <div class="text-danger err_m">{{ $errors->first('NumberDiv') }}</div>
                        @endif
                    </div>
                   
    
                    <div class="d-flex align-items-center">
                        <label for="InitNumber" class="form-label">初期値</label>
                        <input type="text" name="InitNumber" class="form-control" id="InitNumber" value="{{ old('InitNumber') }}">
                        @if ($errors->has('InitNumber')) 
                            <div class="text-danger err_m">{{ $errors->first('InitNumber') }}</div>
                        @endif
                    </div>
    
                    <div class="d-flex align-items-center">
                        <label for="Symbol" class="form-label">記号</label>
                        <input type="text" name="Symbol" class="form-control" id="Symbol" value="{{ old('Symbol') }}">
                        @if ($errors->has('Symbol')) 
                            <div class="text-danger err_m">{{ $errors->first('Symbol') }}</div>
                        @endif
                    </div>
    
                    <div class="d-flex align-items-center">
                        <label for="Lengs" class="form-label">有効桁数</label>
                        <input type="text" name="Lengs" class="form-control" id="Lengs" value="{{ old('Lengs') }}">
                        @if ($errors->has('Lengs')) 
                            <div class="text-danger err_m">{{ $errors->first('Lengs') }}</div>
                        @endif
                    </div>

                    <div class="d-flex align-items-center">
                        <label for="div_edit_id" class="form-label">編集区分</label>
                        <input type="text" name="div_edit_id" class="form-control" id="div_edit_id" value="{{ old('div_edit_id') }}">
                        @if ($errors->has('div_edit_id')) 
                            <div class="text-danger err_m">{{ $errors->first('div_edit_id') }}</div>
                        @endif
                    </div>
                    

                    <div class="d-flex align-items-center">
                        <label for="DateDiv" class="form-label">日付区分</label>
                        <input type="text" name="DateDiv" class="form-control" id="DateDiv" value="{{ old('DateDiv') }}">
                        @if ($errors->has('DateDiv')) 
                            <div class="text-danger err_m">{{ $errors->first('DateDiv') }}</div>
                        @endif
                    </div>
                    

                    <div class="d-flex align-items-center">
                        <label for="NumberClearDiv" class="form-label">採番クリア区分</label>
                        <input type="text" name="NumberClearDiv" class="form-control" id="NumberClearDiv" value="{{ old('NumberClearDiv') }}">
                        @if ($errors->has('NumberClearDiv')) 
                            <div class="text-danger err_m">{{ $errors->first('NumberClearDiv') }}</div>
                        @endif
                    </div>
                    
       

                <div class="col-12 pb-12">
                    <button type="submit" class="btn btn-primary">確 認</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

