@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：新規登録画面')

@section('UnNumber.content')
<div class="container">
<h1>採番登録：確認画面</h1>

    @if(session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('UnNumber.unique_store') }}">
                @csrf

                <div class="wrap d-flex align-items-center">

                    <div class="main">
                        <div class="d-flex align-items-center">
                            <label for="NumberDiv" class="form-label">予約項目</label>
                            <input type="text" name="NumberDiv" class="form-control" id="NumberDiv" value="{{ $inputs['NumberDiv'] }}">
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="reserve_id" class="form-label">採番後の番号</label>
                            <input type="text" name="reserve_id" class="form-control" id="reserve_id" value="{{ $reserve_id }}">
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="InitNumber" class="form-label">予約名称ごとのID(採番パターンB)</label>
                            <input type="text" name="InitNumber" class="form-control" id="InitNumber" value="{{ $change_number }}">
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="client_id" class="form-label">ユーザーID: 採番前の番号</label>
                            <input type="text" name="client_id" class="form-control" id="client_id" value="{{ $inputs['client_id'] }}">
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="client_name" class="form-label">ユーザーの名前</label>
                            <input type="text" name="client_name" class="form-control" id="client_name" value="{{ $inputs['client_name'] }}">
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="TenantCode" class="form-label">会社＋施設コード</label>
                            <input type="text" name="TenantCode" class="form-control" id="TenantCode" value="{{ $inputs['tenant_code'] }}">
                        </div>
                    </div>
    
                    <div class="sub">
                        <div class="d-flex align-items-center">
                            <label for="edit_id" class="form-label" style="padding-left:120px">編集区分番号</label>
                            <input type="text" name="edit_id" class="form-control" id="edit_id" value="{{ $edit->edit_id }}">
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="edit_name" class="form-label" style="padding-left:120px">編集区分名称</label>
                            <input type="text" name="edit_name" class="form-control" id="edit_name" value="{{ $edit->edit_name }}">
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="Symbol" class="form-label" style="padding-left:120px">記号</label>
                            <input type="text" name="Symbol" class="form-control" id="Symbol" value="{{ $edit->Symbol }}">
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="Lengs" class="form-label" style="padding-left:120px">有効桁数</label>
                            <input type="text" name="Lengs" class="form-control" id="Lengs" value="{{ $edit->Lengs }}">
                        </div>

                        <br>

                        <div class="d-flex align-items-center">
                            <label for="DateDiv" class="form-label" style="padding-left:120px">日付区分番号</label>
                            <input type="text" name="DateDiv" class="form-control" id="DateDiv" value="{{ $edit->DateDiv }}">
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="date_name" class="form-label" style="padding-left:120px">日付区分名称</label>
                            <input type="text" name="date_name" class="form-control" id="date_name" value="{{ $edit->date_name }}">
                        </div>

                    </div>
                </div>
                
                <div class="mt-5 d-inline-block">
                    <button type="submit" class="btn btn-primary ms-4">
                        登 録
                    </button>
                </div>
            </form>
        
        </div>
    </div>
</div>

@endsection

