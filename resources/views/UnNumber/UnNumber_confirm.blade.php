@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：登録確認画面')

@section('UnNumber.content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
         <form method="POST" action="{{ route('UnNumber.store') }}" onSubmit="return inputSubmit()">
                @csrf
    
                <input type="hidden" name="TenantCode" class="form-control" id="TenantCode" value="会社名A">
                <input type="hidden" name="TenantBranch" class="form-control" id="TenantBranch" value="施設名A">

                <div class="d-flex justify-content-xl-between">
                    <div class="d-flex align-items-center">
                        <label for="NumberId" class="form-label align-middle">テナントコード</label>
                        <input type="hidden" name="NumberId" class="form-control" id="NumberId" value="{{ $inputs['NumberId'] }}">
                        <p class="form-control">{{ $inputs['NumberId'] }}</p>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <label for="NumberDiv" class="form-label">採番区分</label>
                    <input type="hidden" name="NumberDiv" class="form-control" id="NumberDiv" value="{{ $inputs['NumberDiv'] }}">
                    <p class="form-control">{{ $inputs['NumberDiv'] }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="InitNumber" class="form-label">初期値</label>
                    <input type="hidden" name="InitNumber" class="form-control" id="InitNumber" value="{{ $inputs['InitNumber'] }}">
                    <p class="form-control">{{ $inputs['InitNumber'] }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="Symbol" class="form-label">記号</label>
                    <input type="hidden" name="Symbol" class="form-control" id="Symbol" value="{{ $inputs['Symbol'] }}">
                    <p class="form-control">{{ $inputs['Symbol'] }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="Lengs" class="form-label">有効桁数</label>
                    <input type="hidden" name="Lengs" class="form-control" id="Lengs" value="{{ $inputs['Lengs'] }}">
                    <p class="form-control">{{ $inputs['Lengs'] }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="edit_id" class="form-label">編集区分 : ID</label>
                    <input type="hidden" name="edit_id" class="form-control" id="edit_id" value="{{ $inputs['div_edit_id'] }}">
                    <p class="form-control">{{ $t_edit }} : {{ $inputs['div_edit_id'] }}</p>

                    <input type="hidden" name="edit_name" class="form-control" id="edit_name" value="{{ $t_edit }}">
                </div>

                <div class="d-flex align-items-center mb-2">
                    <label for="DateDiv" class="form-label">日付区分 : ID</label>
                    <input type="hidden" name="DateDiv" class="form-control" id="DateDiv" value="{{ $inputs['DateDiv'] }}">
                    <input type="hidden" name="date_name" class="form-control" id="date_name" value="{{ $t_date }}">  
                    <p class="form-control">{{ $t_date }} : {{ $inputs['DateDiv'] }}</p>
                </div>

                

               

                <div class="mt-5 d-inline-block">
                    <button class="btn btn-secondary" onClick="history.back();">
                        キャンセル
                    </button>
                    <button type="submit" class="btn btn-primary ms-4">
                        確 定
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
