<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addItemModalLabel">アイテムの追加</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>

      <form action="{{ route('items.store') }}" method="post">
        @csrf
        <div class="modal-body">
          <label>アイテム名</label>
            <input type="text" class="form-control" name="title">
          <label>カテゴリー</label>
            <select class="form-select" name="category">
              <option></option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endforeach
            </select>
            <br>
          <label>個数</label>
            <input type="number" class="form-control" name="quantity">
          <label>メモ</label>
            <textarea class="form-control" name="memo"></textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">登録</button>
        </div>
      </form>
    </div>
  </div>
</div>