@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：新規登録画面')

@section('UnNumber.content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <form class="row g-3">
                @csrf
                あ
                <input type="hidden" class="form-control" id="UpdatePerson" value="">
                <div class="d-flex justify-content-xl-between">
                    
                    <div class="col-md-4 d-flex align-items-center">
                        <label for="inputEmail4" class="form-label align-middle" style="width:200px">テナントコード</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>

                    <div class="">
                        <div class="d-flex align-items-center">
                            <p class="pe-3">テナント会社名</p>
                            <p>テキストテキストテキストテキストテキストテキスト</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="pe-3">テナント施設名</p>
                            <p>テキストテキストテキストテキストテキストテキスト</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="d-flex align-items-center mb-2">
                        <label for="NumberDiv" class="form-label" style="width:200px">採番区分</label>
                        <input type="text" class="form-control" id="NumberDiv">
                    </div>
    
                    <div class="d-flex align-items-center mb-2">
                        <label for="InitNumber" class="form-label" style="width:200px">初期値</label>
                        <input type="text" class="form-control" id="InitNumber">
                    </div>
    
                    <div class="d-flex align-items-center mb-2">
                        <label for="Symbol" class="form-label" style="width:200px">記号</label>
                        <input type="text" class="form-control" id="Symbol">
                    </div>
    
                    <div class="d-flex align-items-center mb-2">
                        <label for="Lengs" class="form-label" style="width:200px">有効桁数</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>

                    <div class="d-flex align-items-center mb-2">
                        <label for="inputCity" class="form-label" style="width:200px">編集区分</label>
                        <input type="text" class="form-control" id="Lengs">
                    </div>

                    <div class="d-flex align-items-center mb-2">
                        <label for="DateDiv" class="form-label" style="width:200px">日付区分</label>
                        <input type="text" class="form-control" id="DateDiv">
                    </div>

                    <div class="d-flex align-items-center mb-2">
                        <label for="NumberClearDiv" class="form-label" style="width:200px">採番クリア区分</label>
                        <input type="text" class="form-control" id="NumberClearDiv">
                    </div>
    
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">確 定</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
