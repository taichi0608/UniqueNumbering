@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：新規登録画面')

@section('UnNumber.content')
<div class="container">
<h1>テスト確認画面</h1>

    @if(session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('UnNumber.edit_store') }}">
                @csrf

                <input type="text" name="NumberId" class="form-control" id="NumberId" value="11111111">
                <input type="text" name="TenantCode" class="form-control" id="TenantCode" value="JTB">
                <input type="text" name="TenantBranch" class="form-control" id="TenantBranch" value="東京本社">
                <input type="text" name="DateDiv" class="form-control" id="DateDiv" value="1">
               
                <div class="d-flex align-items-center">
                    <label for="InitNumber" class="form-label">登録名称</label>
                    <input type="text" name="NumberDiv" class="form-control" id="NumberDiv" value="{{ $inputs['NumberDiv'] }}">
                </div>

                <div class="d-flex align-items-center">
                    <label for="Symbol" class="form-label">記号</label>
                    <input type="text" name="Symbol" class="form-control" id="Symbol" value="{{ $inputs['Symbol'] }}">
                </div>

                <div class="d-flex align-items-center">
                    <label for="edit_id" class="form-label">編集区分</label>
                    <p>{{ $t_edit->edit_name }}</p>
                    <input type="text" name="edit_id" class="form-control" id="edit_id" value="{{ $inputs['edit_id'] }}">
                    <input type="text" name="edit_name" class="form-control" id="edit_name" value="{{ $t_edit->edit_name }}">
                </div>

                <div class="d-flex align-items-center">
                    <label for="Lengs" class="form-label">有効桁数</label>
                    <p>{{ $t_edit->edit_length }}</p>
                    <input type="hidden" name="Lengs" class="form-control" id="Lengs" value="{{ $t_edit->edit_length }}">
                </div>

                <div class="d-flex align-items-center">
                    <label for="InitNumber" class="form-label">初期値イメージ</label>
                    <p>{{ $t_edit->memo}}</p>
                    <input type="hidden" name="InitNumber" class="form-control" id="InitNumber" value="1">
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

