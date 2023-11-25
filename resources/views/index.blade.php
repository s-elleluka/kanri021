@extends('layouts.app')

@section('content')
  <!-- 検索窓 -->
  <div class="container text-center">
    <div class="row align-items-start">
      <div class="col">
        <div class="input-group mb-3">
          <input type="search" class="form-control form-control-lg" name=""value="" placeholder="〇〇で探す">
          <button type="button" class="btn btn-primary">検索</button>
        </div>
      </div>
    </div>
  </div>
    <div class="wrap"></div>

    <!-- カテゴリタグ -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('items.index') }}">ALL</a>
      </li>
      @foreach ($categories as $category)
        <li class="nav-item" style="background-color: #{{ $category->color_code }};">
          <a class="nav-link" href="{{ route('items.index') }}?category={{ $category->id }}">{{ $category->title }}</a>
        </li>
      @endforeach
    </ul>

  <!-- ? -->
  <div class="container h-100" @if ($selected) style="background-color: #{{ $selected->color_code }};"@endif>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- アイテムの追加用モーダル -->
    @include('modals.add_item')  

      <div class="d-flex mb-3">
        <a href="#" class="link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addItemModal">
          <div class="d-flex align-items-center">
            <span class="fs-5 fw-bold">＋</span>&nbsp;アイテムの追加
          </div>
        </a>          
      </div>

      <!-- カテゴリーの追加 -->
      <div class="d-flex mb-3">
        <a href="{{ route('category.index') }}" class="link-dark text-decoration-none">
          <div class="d-flex align-items-center">
            <span class="fs-5 fw-bold">＋</span>&nbsp;カテゴリーの追加
          </div>
        </a>          
      </div>                                      

    <div class="row row-cols-1 g-4">                         
      @foreach ($items as $item)
        
        <!-- アイテムの編集用モーダル -->
        @include('modals.edit_item') 

        <!-- アイテムの削除用モーダル -->
        @include('modals.delete_item')  

        <div class="card">
          <div class="row">

            <div class="col-4">
              <image></image>
            </div>
            <div class="col-8">
              <div class="row"><h3>{{ $item->title }}</h3></div>
              <div class="row">{{ $item->quantity }}</div>
              <div class="row">{{ $item->memo }}</div>
              <div class="row text-right">
                  <div class="dropdown">
                    <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon" id="dropdownGoalMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a>
                    <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownGoalMenuLink">
                      <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editItemModal{{ $item->id }}">編集</a></li>                                   
                      <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteItemModal{{ $item->id }}">削除</a></li>                                                                                                          
                    </ul>
                    <div class="dropdown-divider"></div>
                  </div>

              </div>
            </div>

          </div>

        </div>

        <!--

        <div class="col">
          <div class="card bg-light">
            <div class="card-body d-flex justify-content-between align-items-center">
              <h4 class="card-title ms-1 mb-0">{{ $item->title }}</h4>
              <h5 class="card-text ms-1 mb-0">{{ $item->quantity }}</h5>
              <h5 class="card-text ms-1 mb-0">{{ $item->memo }}</h5>
              <div class="d-flex align-items-center">                                 
                <div class="dropdown">
                  <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon" id="dropdownGoalMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a>
                  <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownGoalMenuLink">
                    <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editItemModal{{ $item->id }}">編集</a></li>                                   
                    <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteItemModal{{ $item->id }}">削除</a></li>                                                                                                          
                  </ul>
                  <div class="dropdown-divider"></div>
                </div>
              </div>
            </div>
          </div>                           
        </div>

        -->

        @endforeach    
    </div>                
  </div>
@endsection