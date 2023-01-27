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

                <input type="hidden" name="tenant_id" class="form-control" id="tenant_id" value="11111111">
                <input type="hidden" name="tenant_name" class="form-control" id="tenant_name" value="JTB">
                <input type="hidden" name="tenantBranch_name" class="form-control" id="tenantBranch_name" value="東京本社">

                <input type="hidden" name="date_id" class="form-control" id="date_id" value="1">
               
                <div class="d-flex align-items-center">
                    <label for="number_name" class="form-label">登録名称</label>
                    <input type="hidden" name="number_id" class="form-control" id="number_id" value="1">
                    <input type="hidden" name="number_name" class="form-control" id="number_name" value="{{ $inputs['number_name'] }}">
                    <p class="form-control">{{ $inputs['number_name'] }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="symbol" class="form-label">記号</label>
                    <input type="hidden" name="symbol" class="form-control" id="symbol" value="{{ $inputs['symbol'] }}">
                    <p class="form-control">{{ $inputs['symbol'] }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="edit_id" class="form-label">編集区分</label>
                    <input type="hidden" name="edit_id" class="form-control" id="edit_id" value="{{ $inputs['edit_id'] }}">
                    <input type="hidden" name="edit_name" class="form-control" id="edit_name" value="{{ $t_edit->edit_name }}">
                    <p class="form-control">{{ $t_edit->edit_name }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="edit_length" class="form-label">有効桁数</label>
                    <input type="hidden" name="edit_length" class="form-control" id="edit_length" value="{{ $t_edit->edit_length }}">
                    <p class="form-control">{{ $t_edit->edit_length }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <label for="count_id" class="form-label">初期値イメージ</label>
                    <input type="hidden" name="count_id" class="form-control" id="count_id" value="1">
                    <p class="form-control">{{ $t_edit->memo }}</p>
                </div>
                
                <div class="d-flex align-items-center">
                    <label for="date_id" class="form-label">日付区分</label>
                    <input type="hidden" name="date_id" class="form-control" id="date_id" value="{{ $inputs['date_id'] }}">
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

