@extends('layouts.app')
@section('content')

  <div>
    <!-- カテゴリー削除のモーダル -->
    @foreach ($categories as $category)
      <div value="{{ $category->title }}">
          {{ $category->title }}
        <button type="button" class="btn-close" aria-label="Close" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal{{ $category->id }}"></button>
      </div>
      <div class="modal fade" id="deleteCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteCategoryModalLabel{{ $category->id }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteCategoryModalLabel{{ $category->id }}">「{{ $category->title }}」を削除してもよろしいですか？</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <div class="modal-footer">
              <form action="{{ route('category.destroy', $category) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">削除</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    @endforeach
  </div>
  <br>
  <!-- カテゴリー追加 -->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addItemModalLabel">カテゴリーの追加</h5>
      </div>

      <form action="{{ route('category.store') }}" method="post">
        @csrf
        <br>
        <div class="modal-body">
          <label>カテゴリー名</label>
          <input type="text" class="form-control" name="title">
          <label>カラー</label>
            <select class="form-select" name="color_code">
              <option value="ff8484">レッド</option>
              <option value="ff84c1">スモーキーピンク</option>
              <option value="ff84ff">ピンク</option>
              <option value="c184ff">パープル</option>
              <option value="8484ff">バイオレット</option>
              <option value="84c1ff">ブルー</option>
              <option value="84ffff">ライトブルー</option>
              <option value="84ffc1">ミントグリーン</option>
              <option value="84ff84">グリーン</option>
              <option value="c4ff84">ライトグリーン</option>
              <option value="ffff84">イエロー</option>
              <option value="ffc184">オレンジ</option>              
            </select>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">登録</button>
        </div>

      </form>
    </div>
  </div>
@endsection