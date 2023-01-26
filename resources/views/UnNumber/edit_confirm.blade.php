@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：新規登録画面')

@section('UnNumber.content')
<div class="container">
<h2>テスト確認画面</h2>
<br/>

    @if(session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('UnNumber.edit_store') }}">
                @csrf

                <input type="hidden" name="NumberId" class="form-control" id="NumberId" value="11111111">
                <input type="hidden" name="TenantCode" class="form-control" id="TenantCode" value="JTB">
                <input type="hidden" name="TenantBranch" class="form-control" id="TenantBranch" value="東京本社">
                <input type="hidden" name="DateDiv" class="form-control" id="DateDiv" value="1">
               
                <div class="d-flex align-items-center">
                    <label for="InitNumber" class="form-label">登録名称</label>
                    <input type="hidden" name="NumberDiv" class="form-control" id="NumberDiv" value="{{ $inputs['NumberDiv'] }}">
                    <p class="form-control">{{ $inputs['NumberDiv'] }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="Symbol" class="form-label">記号</label>
                    <input type="hidden" name="Symbol" class="form-control" id="Symbol" value="{{ $inputs['Symbol'] }}">
                    <p class="form-control">{{ $inputs['Symbol'] }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="edit_id" class="form-label">編集区分</label>
                    <input type="hidden" name="edit_id" class="form-control" id="edit_id" value="{{ $inputs['edit_id'] }}">
                    <input type="hidden" name="edit_name" class="form-control" id="edit_name" value="{{ $t_edit->edit_name }}">
                    <p class="form-control">{{ $t_edit->edit_name }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="Lengs" class="form-label">有効桁数</label>
                    <input type="hidden" name="Lengs" class="form-control" id="Lengs" value="{{ $t_edit->edit_length }}">
                    <p class="form-control">{{ $t_edit->edit_length }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="InitNumber" class="form-label">初期値イメージ</label>
                    <input type="hidden" name="InitNumber" class="form-control" id="InitNumber" value="1">
                    <p class="form-control">{{ $t_edit->memo }}</p>
                </div>
                
                <div class="d-flex align-items-center">
                    <label for="InitNumber" class="form-label">日付区分</label>
                    <input type="hidden" name="DateDiv" class="form-control" id="DateDiv" value="{{ $inputs['date_id'] }}">
                    <input type="hidden" name="date_name" class="form-control" id="date_name" value="{{ $t_date->date_name }}">
                    <p class="form-control">{{ $t_date->date_name }}</p>
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

