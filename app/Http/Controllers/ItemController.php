<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    /** ログインしたらitemになる
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $selected = null; 
        if($request->input('category')) {
            $items = Auth::user()->items->where('category_id', $request->input('category'));
            $selected = category::find($request->input('category'));
        }
        else{
            $items = Auth::user()->items;
        }
        $categories = Auth::user()->categories;
        return view('index', compact('items', 'categories', 'selected'));


    }

    /**アイテムの追加
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $item = new Item();
        $item->title = $request->input('title');
        $item->user_id = Auth::id();
        $item->category_id = $request->input('category');
        $item->quantity = $request->input('quantity') ?? 0;
        $item->memo = $request->input('memo');
        $item->image = 0;
        $item->save();

        return redirect()->route('items.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $item->title = $request->input('title');
        $item->user_id = Auth::id();
        $item->category_id = $request->input('category');
        $item->quantity = $request->input('quantity');
        $item->memo = $request->input('memo');
        $item->image = 0;
        $item->save();

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');
    }
}
