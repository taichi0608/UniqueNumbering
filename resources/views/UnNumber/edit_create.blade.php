@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：新規登録画面')

@section('UnNumber.content')
<div class="container">
<h1>テスト登録画面</h1>

    @if(session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('UnNumber.edit_confirm') }}">
                @csrf

                <div class="d-flex align-items-center">
                    <label for="InitNumber" class="form-label">登録名称</label>
                    <input type="text" name="NumberDiv" class="form-control" id="NumberDiv" value="{{ old('NumberDiv') }}">
                </div>

                <div class="d-flex align-items-center">
                    <label for="Symbol" class="form-label">記号</label>
                    <input type="text" name="Symbol" class="form-control" id="Symbol" value="{{ old('Symbol') }}">
                </div>

                <div class="d-flex align-items-center">
                    <label for="edit_id" class="form-label">編集区分</label>
                    <select class="form-select" id="edit_id" name="edit_id">
                        @foreach ($s_edits as $s_edit)
                            <option value="{{ $s_edit->edit_id }}" 
                            @if(old('edit_id') == $s_edit->edit_name)
                                selected
                            @endif
                            >{{ $s_edit->edit_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('edit_id')) 
                        <div class="text-danger err_m">{{ $errors->first('edit_id') }}</div>
                    @endif
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

