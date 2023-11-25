<div class="modal fade" id="editItemModal{{ $item->id }}" tabindex="-1" aria-labelledby="editItemModalLabel{{ $item->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editItemModalLabel{{ $item->id }}">目標の編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
        <form action="{{ route('items.update', $item) }}" method="post">
        @csrf
        @method('patch')                                                                    
        <div class="modal-body">
          <label>アイテム名</label>
            <input type="text" class="form-control" name="title" value="{{ $item->title }}">
          <label>カテゴリー</label>
            <select class="form-select" name="category">
              <option></option>
              @foreach ($categories as $category)
                @if ($item->category_id == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                  @else
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endif
              @endforeach
            </select>
            <br>
          <label>個数</label>
            <input type="number" class="form-control" name="quantity" value="{{ $item->quantity }}">
          <label>メモ</label>
            <textarea class="form-control" name="memo">{{ $item->memo }}</textarea>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">更新</button>
          </div>   
        </form>             
    </div>
  </div>
</div>