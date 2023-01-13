@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：登録確認画面')

@section('UnNumber.content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
         <form method="POST" action="{{ route('UnNumber.store') }}" onSubmit="return checkSubmit()">
                @csrf
    
                <!-- <input type="hidden" class="form-control" id="UpdatePerson" value=""> -->
                <div class="d-flex justify-content-xl-between">
                    
                    <div class="col-md-4 d-flex align-items-center">
                        <label for="NumberId" class="form-label align-middle" style="width:200px">テナントコード</label>
                        <input type="hidden" name="NumberId" class="form-control" id="NumberId" value="{{ $inputs['NumberId'] }}">
                        <p>{{ $inputs['NumberId'] }}</p>
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
                        <input type="hidden" name="NumberDiv" class="form-control" id="NumberDiv" value="{{ $inputs['NumberDiv'] }}">
                        <p>{{ $inputs['NumberDiv'] }}</p>
                    </div>
    
                    <div class="d-flex align-items-center mb-2">
                        <label for="InitNumber" class="form-label" style="width:200px">初期値</label>
                        <input type="hidden" name="InitNumber" class="form-control" id="InitNumber" value="{{ $inputs['InitNumber'] }}">
                        <p>{{ $inputs['InitNumber'] }}</p>
                    </div>
    
                    <div class="d-flex align-items-center mb-2">
                        <label for="Symbol" class="form-label" style="width:200px">記号</label>
                        <input type="hidden" name="Symbol" class="form-control" id="Symbol" value="{{ $inputs['Symbol'] }}">
                        <p>{{ $inputs['Symbol'] }}</p>
                    </div>
    
                    <div class="d-flex align-items-center mb-2">
                        <label for="Lengs" class="form-label" style="width:200px">有効桁数</label>
                        <input type="hidden" name="Lengs" class="form-control" id="Lengs" value="{{ $inputs['Lengs'] }}">
                        <p>{{ $inputs['Lengs'] }}</p>
                    </div>

                    <div class="d-flex align-items-center mb-2">
                        <label for="EditDiv" class="form-label" style="width:200px">編集区分</label>
                        <input type="hidden" name="EditDiv" class="form-control" id="EditDiv" value="{{ $inputs['EditDiv'] }}">
                        <p>{{ $inputs['EditDiv'] }}</p>
                    </div>

                    <div class="d-flex align-items-center mb-2">
                        <label for="DateDiv" class="form-label" style="width:200px">日付区分</label>
                        <input type="hidden" name="DateDiv" class="form-control" id="DateDiv" value="{{ $inputs['DateDiv'] }}">
                        <p>{{ $inputs['DateDiv'] }}</p>
                        <p>{{ $div_dates['name'] }}</p>
                    </div>

                    <div class="d-flex align-items-center mb-2">
                        <label for="NumberClearDiv" class="form-label" style="width:200px">採番クリア区分</label>
                        <input type="hidden" name="NumberClearDiv" class="form-control" id="NumberClearDiv" value="{{ $inputs['NumberClearDiv'] }}">
                        <p>{{ $inputs['NumberClearDiv'] }}</p>
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
