@extends('UnNumber.UnNumber_layouts.UnNumber_layout')
@section('UnNumber.UnNumber_layouts.UnNumber_layout.title', '採番マスタ：一覧表示画面')

@section('UnNumber.content')
<div class="container">
  <h2>一覧表示画面</h2>
  @if(session('err_msg'))
    <p class="text-danger">
        {{ session('err_msg') }}
    </p>
  @endif

  @if ($errors->has('searchId')) 
    <div class="text-danger err_m">{{ $errors->first('searchId') }}</div>
  @endif
  <div class="row justify-content-center">

    <!--検索フォーム-->
    <form method="GET" action="{{ route('UnNumber.index')}}">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">テナントコード： </label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="searchId" value="{{ $searchId }}">
        </div>
        <div class="col-sm-auto">
          <button type="submit" class="btn btn-primary ">検索</button>
        </div>
      </div>     
    </form>
    
    <!--検索結果テーブル 検索されたテナントコードがあった時のみ表示する-->
    @if (!empty($tenantName))
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
          <td>{{ $UnNumber->div_edit_id }}</td>
        
       
          <td>{{ $UnNumber->DateDiv }}</td>
    
          <td>{{ $UnNumber->NumberClearDiv }}</td>
          <td><a href="#" class="btn btn-primary btn-sm">編集・削除</a></td>
        </tr>
        @endforeach

      

      </table>
      
     
    </div><!--テーブルここまで-->
    
    <!--ページネーション-->
    <div class="d-flex justify-content-center">
      {{-- appendsでカテゴリを選択したまま遷移 --}}
      {{ $UnNumbers->appends(request()->input())->links() }}
    </div><!--ページネーションここまで-->
    @endif

    @if (!empty($UnNumbers))
      @if (empty($UnNumbers->count()))
        <p class="text-danger ">検索結果はありません。</p>
      @endif
    @endif
    

  
    
   
    

        
  </div>
</div>
@endsection