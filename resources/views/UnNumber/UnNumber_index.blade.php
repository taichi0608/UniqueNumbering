@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：一覧表示画面')

@section('UnNumber.content')
<div class="container">
    <h2>一覧表示画面</h2>
    <div class="row justify-content-center">

    
      <form method="GET" action="{{ route('UnNumber.show')}}">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">テナントコード： </label>
          <!--入力-->
          <div class="col-sm-5">
            <input type="text" class="form-control" name="searchId" value="{{ $searchId }}">
          </div>
          <div class="col-sm-auto">
            <button type="submit" class="btn btn-primary ">検索</button>
          </div>
        </div>     
      </form>
    
    <!--検索結果テーブル 検索された時のみ表示する-->
    @if (!empty($UnNumbers))
    <div class="productTable">

      <div class="d-flex">
        <div class="">
          <p class="">テナント会社名：{{ $tenantName['TenantCode'] }}</p>
          <p class="">テナント施設名：{{ $tenantName['TenantBranch'] }}</p>
        </div> 
      </div> 

      <p>全{{ $UnNumbers->count() }}件</p>
      <table class="table table-hover">
        <thead style="background-color: #ffd900">
          <tr>
            <th>採番区分</th>
            <th>初期値</th>
            <th>記号</th>
            <th>有効桁数</th>
            <th>編集区分</th>
            <th>日付区分</th>
            <th>採番クリア区分</th>
            <th></th>
          </tr>
        </thead>
        @foreach($UnNumbers as $UnNumber)
        <tr>
          <td>{{ $UnNumber->NumberDiv }}</td>
          <td>{{ $UnNumber->InitNumber }}</td>
          <td>{{ $UnNumber->Symbol }}</td>
          <td>{{ $UnNumber->Lengs }}</td>
          <td>{{ $UnNumber->EditDiv }}</td>
          <td>{{ $UnNumber->DateDiv }}</td>
          <td>{{ $UnNumber->NumberClearDiv }}</td>
          <td><a href="#" class="btn btn-primary btn-sm">編集・削除</a></td>
        </tr>
        @endforeach   
      </table>
    </div>
    <!--テーブルここまで-->
    <!--ページネーション-->
    <div class="d-flex justify-content-center">
      {{-- appendsでカテゴリを選択したまま遷移 --}}
      {{ $UnNumbers->appends(request()->input())->links() }}
    </div>
    <!--ページネーションここまで-->
    @endif
        





    </div>
</div>
@endsection